@extends('layout.master')
@section('title', 'Yuk, Belajar!')

@section('body-style')
  background-image: url({{ url('assets/img/bg-sky.jpg') }});
  background-repeat: no-repeat;
@endsection

@section('css')
  <link rel="stylesheet" href="{{ url('assets/css/belajar.css') }}">
@endsection

@section('content')

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Section 1 -->
  <section id="call-to-action" class="call-to-action">
    <div class="section-header-1">
      <img src="{{ url('assets/img/belajar/title-maribelajar.png') }}">
      <img src="{{ url('assets/img/belajar/title-videopembelajaran.png') }}">
    </div>
    <div class="container text-center" data-aos="zoom-out">
      <a href="https://youtu.be/hEGFgZy5RVY" class="glightbox play-btn"></a>
      <br>
    </div>
  </section>
  <!-- Section 1 -->

  <a href="#our-services" class="scroll-arrow"><i class="bi bi-chevron-double-down"></i></a>

  <section class="main">
    <div class="container services" data-aos="fade-up">
      <div class="section-header">
        <img src="{{ url('assets/img/belajar/title-kliktombol.png') }}">
      </div>
      <div id="our-services" class="our-services">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2" data-aos="fade-up" data-aos-delay="100">

          @forelse ($materies as $materi)
            <div class="col-lg-4 col-md-6">
              <div class="service-item">
                <div class="icon">
                  <i class="bi bi-filter-left"></i>
                </div>
                <h3>{{ $materi->judul }}</h3>
                <p>{{ $materi->deskripsi }}</p>
                <div class="player img-fluid">
                  <div id="player{{ $materi->id }}"></div>
                </div>
                <script>
                  var videoLink = "{{ $materi->link }}";
                  var videoId = videoLink.match(/youtube\.com\/embed\/([^\"]+)/)[1];

                  var player{{ $materi->id }} = null;
                  var duration{{ $materi->id }} = null

                  function onPlayerReady{{ $materi->id }}(event) {
                    duration{{ $materi->id }} = player{{ $materi->id }}.getDuration();
                  }

                  function onPlayerStateChange{{ $materi->id }}(event) {
                    var userRole = '{{ Auth::user()->role ?? 'guest' }}';
                    // Check if the player is playing and get the current time
                    if (event.data == YT.PlayerState.PLAYING || event.data == YT.PlayerState.PAUSED) {
                      var currentTime = player{{ $materi->id }}.getCurrentTime();

                      var duration = player{{ $materi->id }}.getDuration();
                      var percentWatched = Math.round((currentTime / duration) * 100);
                      // check if auth role is siswa
                      if (userRole == 'siswa') {
                        sendWatchTime(currentTime, percentWatched, '{{ $materi->id }}');
                      }
                    } else if (event.data == YT.PlayerState.ENDED) {
                      var duration = player{{ $materi->id }}.getDuration();
                      if (userRole == 'siswa') {
                        sendWatchTime(duration, 100, '{{ $materi->id }}');
                      }
                    }
                  }

                  // ajax
                  function sendWatchTime(currentTime, percentWatched, videoId) {
                    $.ajax({
                      url: '/user_progress',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type: 'POST',
                      data: {
                        'video_id': videoId,
                        'user_id': '{{ Auth::user()->id ?? 0 }}',
                        'watch_time': currentTime,
                        'watch_percent': percentWatched
                      }
                    });
                  }
                </script>
              </div>
            </div>
          @empty
            <p>Materi tidak tersedia.</p>
          @endforelse
          <script>
            function onYouTubeIframeAPIReady() {
              @foreach ($materies as $materi)
                var videoLink = "{{ $materi->link }}";
                var videoId = videoLink.match(/youtube\.com\/embed\/([^\"]+)/)[1];
                player{{ $materi->id }} = new YT.Player('player{{ $materi->id }}', {
                  videoId: videoId,
                  playerVars: {
                    'playsinline': 1
                  },
                  events: {
                    'onReady': function(event) {
                      onPlayerReady{{ $materi->id }}(event);
                      adjustPlayerSize{{ $materi->id }}();
                    },
                    'onStateChange': onPlayerStateChange{{ $materi->id }}
                  }
                });

                function adjustPlayerSize{{ $materi->id }}() {
                  var playerElement = document.getElementById('player{{ $materi->id }}');
                  var containerWidth = playerElement.parentNode.offsetWidth;
                  var aspectRatio = 9 / 16; // Assuming 16:9 aspect ratio for the player

                  var playerHeight = containerWidth * aspectRatio;
                  playerElement.style.width = containerWidth + 'px';
                  playerElement.style.height = playerHeight + 'px';

                  // Resize to 50% on viewport width <= 667px
                  if (window.innerWidth <= 667) {
                    playerElement.style.width = (containerWidth / 1.5) + 'px';
                    playerElement.style.height = (playerHeight / 1.5) + 'px';
                  }
                }

                // Adjust player size on window resize
                window.addEventListener('resize', adjustPlayerSize{{ $materi->id }});
              @endforeach
            }
          </script>


        </div>
      </div>
    </div>
  </section>

@endsection
@section('js')
  <script src="https://www.youtube.com/iframe_api"></script>
  <script>
    $(document).ready(function() {
      $('.scroll-arrow').click(function() {
        $('html, body').animate({
          scrollTop: $('#our-services').offset().top
        }, 1000);
      });
    });
  </script>
@endsection