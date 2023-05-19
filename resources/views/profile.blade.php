@extends('layout.master')
@section('title', 'Profile Akun!')

<link rel="stylesheet" href="{{ url('assets/css/profile.css') }}">

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

@section('content')
  <style>
    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }

    .avatar-upload .avatar-edit input {
      display: none;
    }

    .avatar-upload .avatar-edit input+label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid transparent;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
      content: "\f040";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 6px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }

    .avatar-upload .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .pic-invalid {
      border: 6px solid red !important;
    }
  </style>
  <section class="d-flex flex-column justify-content-center align-items-center h-100">
    <div class="container mt-2 mt-md-5 p-2">

      @error('avatar')
        {{-- alert --}}
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @elseif (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <div class="row">
        {{-- avatar --}}
        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="avatar-upload">
            <div class="avatar-edit">
              <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar" />
              <label for="imageUpload"></label>
            </div>

            <div class="avatar-preview @error('avatar') pic-invalid @enderror">
              @if (Auth::user()->picture)
                <div id="imagePreview"
                  style="background-image: url({{ url('/storage/avatars/' . Auth::user()->picture) }});"></div>
                <button type="submit" class="btn btn-secondary btn-upload">Upload</button>
              @else
                <div id="imagePreview" style="background-image: url({{ url('/assets/img/dasbor/user.png') }});"></div>
                <div class="text-center btn-upload">
                  <button type="submit" class="btn btn-secondary btn-upload">Upload</button>
                </div>
              @endif
            </div>
          </div>
        </form>
        {{-- delete button --}}
        @if (Auth::user()->picture)
          <form action="{{ route('profile.delete') }}" method="POST">
            @csrf
            <div class="text-center">
              <button type="submit" class="button-333" role="button">Hapus</button>
            </div>
          </form>
        @endif
        <h1 class="text-center">
          {{ Auth::user()->name }}
        </h1>
      </div>

      <div class="row">
        @if (Auth::user()->role == 'siswa')
          {{-- if email is empty --}}
          @if (Auth::user()->email == null)
            <div class="col-md-6 offset-md-3">
              <h5 class="text-center">Sambungkan ke Orang Tua</h5>
              <form action="{{ route('email.send') }}" method="post">
                @csrf
                <div class="d-flex">
                  <div class="flex-grow-1 custom-search">
                    <input type="text" name="email" id="email" class="form-control custom-search-input"
                      placeholder="Email Orang Tua">
                    {{-- error --}}
                    <button class="custom-search-botton button-3333" role="button">Verifikasi</button>
                  </div>
                </div>
              </form>
            </div>
          @else
            <div class="col-md-6 offset-md-3">
              <h4 class="text-center">Email Terhubung</h4>
              <form action="{{ route('email.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <p class="text-center">{{ Auth::user()->email }}</p>
                <div class="text-center">
                  <button type="submit" class="button-333" role="button">Hapus</button>
                </div>
              </form>

            </div>
          @endif
        @else
          <div class="col-md-6 offset-md-3">
            <div class="mail">
            <h3 class="text-center">{{ Auth::user()->email }}</h3>
            <div class="green-circle">
              <i class="fas fa-pencil-alt" style="cursor: pointer;" data-bs-toggle="modal"
                data-bs-target="#editNameModal"></i>
                </div>
            {{-- Add content for displaying other user details --}}
            </div>
            <style>
              .mail {
                display: flex;
                justify-content: center;
                align-items: center;

              }
              .fa-pencil-alt {
                margin-left: 10px;
                font-size: 18px;
              }
              .green-circle {
                background-color: #00b894;
                border-radius: 50%;
                padding: 2px;
                margin-left: 10px;
                height: 30px;
                width: 30px;
              }
            </style>
          </div>
        @endif
      </div>

    </div>
    </div>
  </section>

  <!-- Modal EDIT -->
  <div class="modal" id="editNameModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Profil</h5>
        </div>
        <form action="" method="POST">
          @method('PATCH')
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="">
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto Profil</label>
              <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
      // Hide the upload button initially if there is no image selected
      if (!$('#imageUpload').val()) {
        $('.btn-upload').hide();
      }
    });

    // Show or hide the upload button based on the image upload status
    $('#imageUpload').change(function() {
      if ($(this).val()) {
        $('.btn-upload').show();
      } else {
        $('.btn-upload').hide();
      }
    });

    // Hide the upload button after it is clicked
    $('.btn-upload').click(function() {
      $('.btn-upload').hide();
    });

    // Trigger the image preview when a file is selected
    $("#imageUpload").change(function() {
      readURL(this);
    });
  </script>
@endsection
