@extends('layout.master')
@section('title', 'reset password')

@section('content')
<style>
  .card-front {
  width: 100%;
  height: 100%;
  background-color: #e9bea3;
  background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
  background-position: bottom center;
  background-repeat: no-repeat;
  background-size: 300%;
  position: absolute;
  border-radius: 6px;
  left: 0;
  top: 0;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
}
.center-wrap{
  position: absolute;
  width: 100%;
  padding: 0 35px;
  top: 50%;
  left: 0;
  transform: translate3d(0, -50%, 35px) perspective(100px);
  z-index: 20;
  display: flex;
  justify-content: center;
  align-items: center;
}
.card-wrap {
  /* set shadow */
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 100%;
  width: 400px;
  height: 530px;
  margin: 0 auto;
  position: relative;
  width: 440px;
  max-width: 100%;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  perspective: 800px;
  margin-top: 60px;
}
.form-group{
  position: relative;
  display: block;
  margin: 0;
  padding: 0;
}

.form-style {
  padding: 13px 20px;
  height: 48px;
  width: 300px;
  font-weight: 500;
  border-radius: 4px;
  font-size: 14px;
  line-height: 22px;
  letter-spacing: 0.5px;
  outline: none;
  color: #e9e9e9;
  background-color: #57534d;
  border: none;
  -webkit-transition: all 200ms linear;
  transition: all 200ms linear;
  box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
}

.form-style:focus,
.form-style:active {
  border: none;
  outline: none;
  box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
}
section{
  /* set bg img */
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg'), linear-gradient(to top, #866653, #71594a);
  /* set it darker */
  background-blend-mode: multiply;
}
.btn{
  border-radius: 4px;
  height: 44px;
  font-size: 13px;
  font-weight: 600;
  text-transform: uppercase;
  -webkit-transition : all 200ms linear;
  transition: all 200ms linear;
  padding: 0 30px;
  letter-spacing: 1px;
  display: -webkit-inline-flex;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  -moz-justify-content: center;
  -ms-justify-content: center;
  justify-content: center;
  -ms-flex-pack: center;
  text-align: center;
  border: none;
  background-color: #ffeba7;
  color: #102770;
  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.142);
}

.btn:active,
.btn:focus{
  background-color: #102770;
  color: #ffeba7;
  box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}

.btn:hover{
  background-color: #102770;
  color: #ffeba7;
  box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
}
    .is-invalid {
      border: 2px solid red !important;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .is-invalid:focus {
      border-color: red !important;
      box-shadow: 0 0 0 0.4rem rgba(220, 53, 70, 0.344) !important;
    }

    .is-valid {
      border: 2px solid green !important;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%2328a745'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M3.5 6l2 2 4.5-4.5'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .is-valid:focus {
      border-color: green !important;
      box-shadow: 0 0 0 0.4rem rgba(40, 167, 69, 0.344) !important;
    }

</style>
<section class="d-flex flex-column justify-content-center align-items-center vh-100 px-3">
{{--  form --}}
{{-- seession msg success --}}
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @elseif(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="card-wrap">
<div class="card-front">
  <div class="center-wrap">
    <div class="section text-center">
      <form action="{{ route('reset.proses', ['token' => $token->token]) }}" method="POST">
        @csrf
        <h4 class="m-2 pb-3 animated">Reset password</h4>
        <div class="form-group mt-2">
          <label for="newpass" class="sr-only">newpass</label>
          <input type="password" name="newpass" class="form-style" placeholder="password baru" id="newpass"
            autocomplete="off">
            <small class="error text-danger" id="passerr">
          @error('newpass')
            {{ $message }}
          @enderror
          </small>
        </div>
        <div class="form-group mt-2">
          <label for="confirmpass" class="sr-only">confirmpass</label>
          <input type="password" name="confirmpass" class="form-style " placeholder="konfirmasi password" id="confirmpass"
            autocomplete="off">
          @error('confirmpass')
          <small class="error text-danger" id="confierr">
            {{ $message }}
          @enderror
          </small>
        </div>
                                  <button type="button" class="btn btn-secondary toggle-password mt-3" id="showpass" onclick="togglepass2()">Lihat
                            Kata Sandi</button> <br>
        {{-- also send the token --}}

        <button type="submit" class="btn mt-5">Ubah</button>
      </form>
    </div>
  </div>
</div>
</div>
</section>
<script>
  function validatePassword() {
  var newpass = document.getElementById("newpass");
  var confirmpass = document.getElementById("confirmpass");
  var newpassValue = newpass.value;
  var confirmpassValue = confirmpass.value;
  var newpassRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

  if (newpassRegex.test(newpassValue)) {
    newpass.classList.remove("is-invalid");
    newpass.classList.add("is-valid");
    document.getElementById("passerr").style.display = "none";
  } else {
    newpass.classList.remove("is-valid");
    newpass.classList.add("is-invalid");
    document.getElementById("passerr").style.display = "block";
    document.getElementById("passerr").innerHTML = "Kata sandi minimal 8 karakter, 1 huruf besar, 1 huruf kecil, 1 angka";
  }

  if (confirmpassValue === newpassValue) {
    confirmpass.classList.remove("is-invalid");
    confirmpass.classList.add("is-valid");
    document.getElementById("confirerr").style.display = "none";
  } else {
    confirmpass.classList.remove("is-valid");
    confirmpass.classList.add("is-invalid");
    document.getElementById("confirerr").style.display = "block";
    document.getElementById("confirerr").innerHTML = "Kata sandi tidak sama";
  }
}

var newpass = document.getElementById("newpass");
newpass.addEventListener("keyup", validatePassword);

var confirmpass = document.getElementById("confirmpass");
confirmpass.addEventListener("keyup", validatePassword);

pass = document.getElementById("newpass");
confirmpass = document.getElementById("confirmpass");
    function togglepass2() {
      if (pass.type === "password" && confirmpass.type === "password") {
        pass.type = "text";
        confirmpass.type = "text";
        btn.innerHTML = "Sembunyikan Kata Sandi";

      } else {
        pass.type = "password";
        confirmpass.type = "password";
        btn.innerHTML = "Lihat Kata Sandi";
      }
    }
</script>
@endsection
