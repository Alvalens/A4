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
  width: 100%;
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
      <form action="{{ route('lupa.proses') }}" method="POST">
        @csrf
        <h4 class="m-2 pb-3 animated">Masukkan data</h4>
        <div class="form-group mt-2">
          <label for="nama" class="sr-only">nama</label>
          <input type="text" name="nama" class="form-style is-invalid" placeholder="username" id="nama"
            autocomplete="off">
          @error('nama')
            <small class="error text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group mt-2">
          <label for="email" class="sr-only">email</label>
          <input type="email" name="email" class="form-style is-invalid" placeholder="email" id="email"
            autocomplete="off">
          @error('email')
            <small class="error text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn mt-5">Kirim verifikasi</button>
      </form>
    </div>
  </div>
</div>
</div>
</section>
@endsection
