@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
<style>
  *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}

:root{
    /* --bgcol:#37474F; */
    --mcol0:#d7f629;
    --mcol1:#f3d421;
    --mcol2:#d2b019;
    --txtcol0:#eeff00;
    --txtcol1:#708b60;
    --whitecol:#ECEFF1;
    --darkcol:#0b2700;
}

.bg{
    background-image: url('image/bg1.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    min-height: 80vh;
    min-width: 80vw;
    display: flex;
    flex-direction: column;
}


body{
    display:flex;
    flex-direction:column;
    align-items:center;
    padding-top:15vh;
    background-color:var(--bgcol);
}

#puzzle_container{
    position: relative;
    width: 50vh;
    height:50vh;
    background-color:var(--darkcol);
    border-radius:8px;
    border:1px solid var(--mcol0);
    box-shadow:0px 8px 0px var(--mcol0);
}

.puzzle_block{
    position:absolute;
    left:0;
    top:0;
    width:33.4%;
    height:33.4%;
    background-color:var(--txtcol1);
    color:var(--whitecol);
    font-size:10vh;
    font-weight:bold;
    text-align:center;
    padding-top:3%;
    cursor: pointer;
    user-select:none;
    transition:left 0.3s,top 0.3s;
}

/*difficulty container*/
#difficulty_container{
    display:flex;
    flex-direction:row;
    width:50vh;
    height:10vh;
    background-color:var(--darkcol);
    border-radius:8px;
    margin-top:22px;
}
.difficulty_button{
    flex-grow:1;
    background-color:inherit;
    color:var(--mcol2);
    text-align:center;
    font-size:3vh;
    font-weight:bold;
    padding-top:5%;
    margin:4px;
    cursor: pointer;
    transition:font-size 0.3s;
}
.difficulty_button:hover{
    opacity:0.8;
    font-size:3.5vh;
}
.difficulty_button.active{
    background-color:inherit;
    color:var(--mcol0);
}
/* breakpoin */
@media only screen and (max-width: 600px) {
  /* scale container */
  section {
    transform: scale(0.5);
  }
}
</style>
@endsection

@section('body-style')
  background: linear-gradient(to top, rgba(0, 0, 0, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%), url({{ url('assets/img/bg.jpg') }});
  background-size: cover;
  justify-content: center;
  align-items: center;
  --wall-color: var(--color-default);
  --joystick-color: black;
  --joystick-head-color: var(--color-secondary);
  --ball-color: #f06449;
@endsection

@section('content')

  <section class="bg container d-flex flex-column justify-content-center align-items-center">

    <div id="puzzle_container">
        <div class="puzzle_block">1</div>
        <div class="puzzle_block">2</div>
        <div class="puzzle_block">3</div>
        <div class="puzzle_block">4</div>
        <div class="puzzle_block">5</div>
        <div class="puzzle_block">6</div>
        <div class="puzzle_block">7</div>
        <div class="puzzle_block">8</div>
    </div>
    <div id="difficulty_container">
        <div class="difficulty_button active">Mudah</div>
        <div class="difficulty_button">Normal</div>
        <div class="difficulty_button">Sulit</div>
    </div>

  </section>

@endsection

@section('js')

<script src="{{ url('assets/js/games/puzzle.js') }}"></script>
@endsection