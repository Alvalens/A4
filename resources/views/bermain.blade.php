@extends('layout.master')
@section('title', 'Bermain itu Seru!')
@section('css', 'bermain')


<style>
  .bermain {
    background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%), url(assets/img/bg.jpg);
    background-size: cover;
    height: 100%;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
</style>
@section('content')
  <section class="bermain">

    <img id="ikon-rumah" src="assets/img/ikon-rumah.png" alt="Ikon Rumah">
    <img id="angka" src="assets/img/angka.png" alt="Angka">
    <div class="game">
      <div class="grid">
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
        <button>6</button>
        <button>7</button>
        <button>8</button>
        <button>9</button>
        <button>10</button>
        <button>11</button>
        <button>12</button>
        <button>13</button>
        <button>14</button>
        <button>15</button>
        <button></button>
      </div>

      <div class="footer">
        <button>Play</button>
        <span id="move">Move: 100</span>
        <span id="time">Time: 100</span>
      </div>
    </div>
    <h1 class="message">You win!</h1>

  </section>

@section('js', 'bermain')
@endsection
