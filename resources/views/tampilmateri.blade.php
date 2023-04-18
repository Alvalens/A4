@extends('layout.dasbormaster')
@section('datamateri','active')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="orders">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            {{$materi->id}}<hr><strong>{{$materi->judul}}</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Level</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$materi->level}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Link</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <a href="{{$materi->link}}" class="form-control-static">{{$materi->link}}</a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$materi->deskripsi}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Durasi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$materi->durasi}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Video</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">
                                        <iframe id="video-player" src="{{ $materi->link }}" frameborder="0" allowfullscreen></iframe>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button data-bs-toggle="modal" data-bs-target="#fileModal" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Ubah
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#fileModalDelete" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Hapus
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('datamateri') }}" class="badge badge-light" style="float:right;" role="button">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT -->
<div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Ubah Materi</h5>
            </div>
            <form action="{{ route('materials.update', ['materi'=>$materi->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <input type="hidden" value="{{ old('id') ?? $materi->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') ?? $materi->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" value="{{ old('level') ?? $materi->level }}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') ?? $materi->deskripsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="url" class="form-control" id="link" name="link" value="{{ old('link') ?? $materi->link }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal EDIT -->

<!-- Modal DELETE -->
<div class="modal fade" id="fileModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalDeleteLabel">Hapus Item</h5>
                <p>Apa kamu yakin ingin menghapus item ini?</p>
            </div>
            <div class="modal-footer">
            <form method="POST" action="{{ route('materials.destroy', $materi->id) }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal DELETE -->

<script>
    var player = null;
    var startTime = null;
  
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('video-player', {
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    }
  
    function onPlayerReady(event) {
      event.target.playVideo();
      startTime = new Date();
    }
  
    function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PAUSED) {
    var stopTime = new Date();
    var duration = (stopTime.getTime() - startTime.getTime()) / 1000;

    // Send the updated duration to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/datamateri/' + {{ $materi->id }}, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({ durasi: duration }));

    startTime = null;
  } else if (event.data == YT.PlayerState.PLAYING) {
    startTime = new Date();
  }
}
  </script>
  
  <script src="https://www.youtube.com/embed/iframe_api"></script>

@endsection