@extends('layout.master')
@section('title', 'Yuk, Belajar!')

<link href="{{ url('assets/css/belajar.css') }}" rel="stylesheet">
<script src="https://www.youtube.com/iframe_api"></script>

@section('body-style')
  background-image: url({{ url('assets/img/bg-sky.jpg') }});
  background-repeat: no-repeat;
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
      <a href="https://youtu.be/pUn4kWVm3F0" class="glightbox play-btn"></a>
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
                <div id="player{{ $materi->id }}"></div>
                <script>
                  var videoLink = "{{ $materi->link }}";
                  var videoId = videoLink.match(/youtube\.com\/embed\/([^\"]+)/)[1];
                  console.log("Video ID: " + videoId);

                  var player{{ $materi->id }} = null;
                  var duration{{ $materi->id }} = null

                  function onPlayerReady{{ $materi->id }}(event) {
                    duration{{ $materi->id }} = player{{ $materi->id }}.getDuration();
                    // event.target.playVideo();
                  }

                  function onPlayerStateChange{{ $materi->id }}(event) {
                    // Check if the player is playing and get the current time
                    if (event.data == YT.PlayerState.PLAYING || event.data == YT.PlayerState.PAUSED) {
                      var currentTime = player{{ $materi->id }}.getCurrentTime();
                      console.log('Current time: ' + currentTime);

                      var duration = player{{ $materi->id }}.getDuration();
                      var percentWatched = Math.round((currentTime / duration) * 100);
                      console.log('Percent watched: ' + percentWatched);

                      sendWatchTime(currentTime, percentWatched, '{{ $materi->id }}');
                    } else if (event.data == YT.PlayerState.ENDED) {
                      var duration = player{{ $materi->id }}.getDuration();
                      sendWatchTime(duration, 100, '{{ $materi->id }}');
                      console.log('Video has finished playing');
                    }
                  }

                  // ajax
                  function sendWatchTime(currentTime, percentWatched, videoId) {
                    console.log(videoId)
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
                      },
                      success: function(data) {
                        alert(data);
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                        alert("Error: " + error);
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
                  height: '196.875',
                  width: '350',
                  videoId: videoId,
                  playerVars: {
                    'playsinline': 1
                  },
                  events: {
                    'onReady': onPlayerReady{{ $materi->id }},
                    'onStateChange': onPlayerStateChange{{ $materi->id }}
                  }
                });
              @endforeach
            }
          </script>

        </div>
      </div>
    </div>
  </section>

  <script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  </script>
  
@endsection
