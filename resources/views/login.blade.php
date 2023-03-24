@extends('layout.master')
@section('title', 'Masuk Dulu Yaa!')
@section('css', 'login')

@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%),
  url(assets/img/bg.jpg);
  font-family: 'Fredoka One', sans-serif;
  letter-spacing: 1px;
  font-weight: 200;
  font-size: 15px;
  line-height: 1.7;
  color: #ffffff;
  overflow: hidden;
  background-size: cover;

@endsection

@section('content')
  <div class="section">
    <img id="ikon-rumah" src="assets/img/ikon-rumah.png" alt="Ikon Rumah">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <input type="checkbox" id="reg-log" class="checkbox">
            <label for="reg-log">
            </label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">

                <!-- Start Masuk -->
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="m-2 pb-3 animated">Masuk</h4>
                      <label for="user-type" class="mt-2">Aku Adalah:</label>
                      <select class="form-style" id="user-type" name="user-type" onchange="toggleForm()">
                        <option class="form-style" value="murid">Murid</option>
                        <option class="form-style" value="guru">Guru</option>
                        <option class="form-style" value="orangtua">Orang Tua</option>
                      </select>
                      <label for="user-type" class="mt-2">Masukkan:</label>
                      <div class="form-group mt-2">
                        <input type="username" name="logusername" class="form-style" placeholder="Nama" id="logpass"
                          autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      {{-- <div class="form-group mt-2">
                        <input type="email" name="logemail" style="display: none;" class="form-style"
                          placeholder="Alamat Email" id="logemail" autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div> --}}
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Kata Sandi" id="logpass"
                          autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="username" name="logukids" style="display: none;" class="form-style"
                          placeholder="Nama Anak" id="logukids" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <a href="#" class="btn mt-4">kirim</a>
                    </div>
                  </div>
                </div>
                <!-- End Masuk -->

                <!-- Start Daftar -->
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="m-2 pb-3 animated">Daftar</h4>
                      <label for="user-type" class="mt-2">Aku Adalah:</label>
                      <select class="form-style" id="user-type-back" name="user-type-back" onchange="toggleFormBack()">
                        <option class="form-style" value="murid2">Murid</option>
                        <option class="form-style" value="guru2">Guru</option>
                        <option class="form-style" value="orangtua2">Orang Tua</option>
                      </select>
                      <label for="user-type" class="mt-2">Masukkan:</label>
                      <div class="form-group mt-2">
                        <input type="username" name="logusername" class="form-style" placeholder="Nama" id="logpass"
                          autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="email" name="logemail" style="display: none;" class="form-style"
                          placeholder="Alamat Email" id="logemail2" autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Kata Sandi"
                          id="logpass" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="username" name="logukids" style="display: none;" class="form-style"
                          placeholder="Nama Anak" id="logukids2" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <a href="#" class="btn mt-4">kirim</a>
                    </div>
                  </div>
                </div>
                <!-- End Daftar -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- jq --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function toggleForm() {
      var x = document.getElementById("user-type").value;
      if (x === "murid") {
        document.getElementById("logemail").style.display = "none";
        document.getElementById("logukids").style.display = "none";
      } else if (x === "orangtua") {
        document.getElementById("logemail").style.display = "block";
        document.getElementById("logukids").style.display = "block";
      } else {
        document.getElementById("logemail").style.display = "block";
        document.getElementById("logukids").style.display = "none";
      }
    }

    function toggleFormBack() {
      var y = document.getElementById("user-type-back").value;
      if (y === "murid2") {
        document.getElementById("logemail2").style.display = "none";
        document.getElementById("logukids2").style.display = "none";
      } else if (y === "orangtua2") {
        document.getElementById("logemail2").style.display = "block";
        document.getElementById("logukids2").style.display = "block";
      } else {
        document.getElementById("logemail2").style.display = "block";
        document.getElementById("logukids2").style.display = "none";
      }
    }
  </script>

@endsection
