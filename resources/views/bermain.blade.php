@extends('layout.master')
@section('title', 'Bermain itu Seru!')
@section('css', 'bermain')


@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%), url(assets/img/bg.jpg);
  background-size: cover;
  justify-content: center;
  align-items: center;
  --wall-color: var(--color-default);
  --joystick-color: black;
  --joystick-head-color: var(--color-secondary);
  --ball-color: #f06449;
  --end-color: #7d82b8;
@endsection

@section('content')
<section class="container d-flex flex-column justify-content-center align-items-center vh-100">


  <img id="ikon-rumah" src="assets/img/ikon-rumah.png" alt="Ikon Rumah">
  <a href="#" class="btn mt-4 d-flex justify-content-center" name="puzzle" onclick="toggleFormPuzzle()">Puzzle</a>
  <a href="#" class="btn mt-4 d-flex justify-content-center" name="maze" onclick="toggleFormMaze()">Maze</a>

  <div class="game" style="display: none">
    <div class="grid">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
      <button>5</button>
      <button>6</button>
      <button>7</button>
      <button>8</button>
      <button></button>
    </div>

    <div class="footer">
      <button>Play</button>
      <span id="move">Move: 100</span>
      <span id="time">Time: 100</span>
    </div>
  </div>


  <div id="game1" style="display: none; margin-top: 5%">
    <div id="center">
      <div id="game">
        <div id="maze">
          <div id="end"></div>
        </div>
        <div id="joystick">
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div id="joystick-head"></div>
        </div>
        <div id="note">
        </div>
      </div>
    </div>
  </div>
</section>
<script>
function toggleFormPuzzle() {
  var puzzle = document.querySelector(".game");
  var maze = document.querySelector("#game1");
  if (puzzle.style.display === "none") {
    puzzle.style.display = "block";
    maze.style.display = "none";
  } else {
    puzzle.style.display = "none";
    maze.style.display = "none";
  }
}

function toggleFormMaze() {
  var puzzle = document.querySelector(".game");
  var maze = document.querySelector("#game1");
  if (maze.style.display === "none") {
    maze.style.display = "block";
    puzzle.style.display = "none";
  } else {
    maze.style.display = "none";
    puzzle.style.display = "none";
  }
}
</script>

<script src="assets/js/bermain.js"></script>
<script src="assets/js/bermain2.js"></script>


  </section>

@section('js', 'bermain')
@endsection

