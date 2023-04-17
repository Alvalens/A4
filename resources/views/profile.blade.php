@extends('layout.master')
@section('title', 'Yuk, Belajar!')
@section('css', 'belajar')

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

<style>

</style>
@section('content')
  <section>
    <div class="container">
      {{-- status --}}
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="col-md-5">
        {{-- profile and user name --}}
        <div class="row">
            <img src="{{ url('/pictures/guest.jpg') }}" alt="" class="rounded-circle img-fluid text-center m-auto" style="max-height: 200px; max-width:200px;">
        </div>
        <div class="row">
          {{-- nama --}}
          <h1 class="text-center">{{ Auth::user()->name}}</h1>

          @if (Auth::user()->role == 'siswa')
            {{-- if email is empty --}}
            @if (Auth::user()->email == null)
              <h3 class="text-center">Sambungkan ke orang tua</h3>
              <form action="{{ route('email.send') }}" method="post">
                @csrf
                <input type="text" name="email" id="email" placeholder="Email Orang Tua">
                <button type="submit">Verifikasi</button>
              </form>
            @else
              {{-- show and button to delet --}}
              <form action="{{ route('email.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <h3 class="text-center">{{ Auth::user()->email}}</h3>
                <button type="submit">Hapus</button>
              </form>
            @endif
          @elseif (Auth::user()->role == 'orangtua')
            <h3 class="text-center">Nama Anak</h3>
          @else
            <h3 class="text-center">{{ Auth::user()->email}}</h3>
          @endif
        </div>
      </div>
      <div class="col-md-7">

      </div>
    </div>
  </section>



  {{-- jq --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  <script>

  </script>


@endsection
