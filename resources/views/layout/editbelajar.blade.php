<a href="#" class="btn mt-4 center" id="tambahBtn">tambah</a>

<div class="container-fluid" id="formContainer" style="display:none;">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card p-3">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="heading text-center">Tambahkan Konten</h2>
                    </div>
                </div>
                <form method="POST" action="{{ route('addContent') }}" class="form-card">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" name="judul_materi" placeholder="Judul Materi">
                                <label>Judul Materi</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" name="link_youtube" placeholder="Link Youtube">
                                <label>Link Youtube</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <input type="submit" value="Tambahkan" class="btn btn-pay placeicon">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
tes
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($video_id))
<div class="col-lg-4 col-md-6">
    <div class="service-item">
        <div class="icon">
            <i class="bi bi-palette"></i>
        </div>
        <h3>{{ $judul_materi }}</h3>
        <iframe width="350" height="196.875" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
@endif

<script>
    const tambahBtn = document.getElementById('tambahBtn');
    const formContainer = document.getElementById('formContainer');

    tambahBtn.addEventListener('click', function() {
    formContainer.style.display = 'block';
    });
</script>