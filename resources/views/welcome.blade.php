<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome!</title>
</head>
<style>
  #leftDiv,
  #rightDiv {
    position: fixed;
    top: 0;
    height: 100vh;
    width: 50vw;
    background-color: white;
    z-index: 9999;
    transition: transform 0.5s ease-in-out;
  }

  #leftDiv {
    left: 0;
    transform: translateX(-100%);
  }

  #rightDiv {
    right: 0;
    transform: translateX(100%);
  }

  html {
    font: 16px/1.5 "Work Sans", sans-serif;
    color: #444;

  }

  body {
    margin: 0;
    padding: 0;
    overflow: hidden !important;
  }

  section {
    background-color: #214;
    overflow: hidden;
    display: flex;
    padding: 0;
    margin: 0;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  h1 {
    top: 0;
    font-size: 5em;
    text-align: center;
    font-weight: 800;
    color: #dce;
    opacity: 1;
    transition: opacity 0.5s ease-in-out;
    margin-bottom: 10px !important;
    margin-top: 0 !important;
  }

  .canvas {
    position: absolute;
    pointer-events: none;
    height: 100% !important;
  }

  button {
    position: relative;
    padding: 12px 35px;
    background: #FEC195;
    font-size: 17px;
    font-weight: 600;
    color: #214;
    border: 3px solid #FEC195;
    border-radius: 8px;
    box-shadow: 0 0 0 #fec1958c;
    transition: all .3s ease-in-out;
  }

  .star-1 {
    position: absolute;
    top: 20%;
    left: 20%;
    width: 25px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
  }

  .star-2 {
    position: absolute;
    top: 45%;
    left: 45%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
  }

  .star-3 {
    position: absolute;
    top: 40%;
    left: 40%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
  }

  .star-4 {
    position: absolute;
    top: 20%;
    left: 40%;
    width: 8px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .8s cubic-bezier(0, 0.4, 0, 1.01);
  }

  .star-5 {
    position: absolute;
    top: 25%;
    left: 45%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .6s cubic-bezier(0, 0.4, 0, 1.01);
  }

  .star-6 {
    position: absolute;
    top: 5%;
    left: 50%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 0 #fffdef);
    z-index: -5;
    transition: all .8s ease;
  }

  button:hover {
    background: transparent;
    color: #FEC195;
    box-shadow: 0 0 25px #fec1958c;
  }

  button:hover .star-1 {
    position: absolute;
    top: -80%;
    left: -30%;
    width: 25px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  button:hover .star-2 {
    position: absolute;
    top: -25%;
    left: 10%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  button:hover .star-3 {
    position: absolute;
    top: 55%;
    left: 25%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  button:hover .star-4 {
    position: absolute;
    top: 30%;
    left: 80%;
    width: 8px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  button:hover .star-5 {
    position: absolute;
    top: 25%;
    left: 115%;
    width: 15px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  button:hover .star-6 {
    position: absolute;
    top: 5%;
    left: 60%;
    width: 5px;
    height: auto;
    filter: drop-shadow(0 0 10px #fffdef);
    z-index: 2;
  }

  .fil0 {
    fill: #FFFDEF
  }

  .sub {
    font-size: 1em;
    text-align: justify;
    font-weight: 600;
    color: #dce;
    opacity: 1;
    transition: opacity 0.5s ease-in-out;
    padding: 0 20%;
    margin-bottom: 20px;
  }

  /* on breakpoin small decrase h1 p size */
  @media (max-width: 576px) {
    h1 {
      font-size: 3.5em;
    }

    .sub {
      font-size: 0.8em;
      padding: 0 10%;
    }
  }

  section {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }

  .show {
    opacity: 1;
    transition: opacity 0.5s ease-in-out;
  }
</style>

<body>
  <div id="intro">
  {{-- include intro --}}
  @include('layout.misc.intro')
  </div>
  <section>
    <div id="leftDiv"></div>
    <div id="rightDiv"></div>
    <h1>Halo! Selamat datang!</h1>
    <p class="sub">Selamat datang di web pembelajaran A4! Web ini memiliki banyak fitur seperti video pembelajaran,
      permainan, hingga kuis-kuis acak yang disajikan untuk membantu kegiatan pembelajaran penderita tunaringa. Selain
      itu juga dilengkapi dengan panel Admin agar pengajar dapat secara mudah melihat perkembangan dari siswanya dan
      memanage materi, serta raport dimana orang tua juga dapat melihat progress dari sang buah hati. Terdapat <a>manual
        book</a> kepada tiap user website ini agar dapat lebih efektif dalam penggunaannya</p>
    <form action="{{ route('start') }}" method="POST">
      @csrf

      <button name="mulai" type="submit">Mulai!
        <div class="star-1">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
        <div class="star-2">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
        <div class="star-3">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
        <div class="star-4">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
        <div class="star-5">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
        <div class="star-6">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <defs></defs>
            <g id="Layer_x0020_1">
              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
              <path
                d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                class="fil0"></path>
            </g>
          </svg>
        </div>
      </button>
    </form>
    <canvas id="canvas" class="canvas"></canvas>
  </section>
</body>
<script>
  // every 200px of screen width change refresh the page
  window.addEventListener('resize', function() {
    if (window.innerWidth % 200 === 0) {
      window.location.reload();
    }
  });
  setTimeout(function() {
    document.querySelector('section').classList.add('show');
  }, 8000);
  setTimeout(function() {
    document.querySelector('#intro').innerHTML = '';
  }, 7500);
</script>
<script>
  'use strict';

  let mouse, originx, originy, int, cvs;

  // Safari doesn't support EventTarget
  var EventTarget = EventTarget || false;

  // addEventListener shorthand
  if (EventTarget) {
    EventTarget.prototype.evt = function(event, callback) {
      return this.addEventListener(event, callback);
    }
  } else {
    window.evt = function(event, callback) {
      return this.addEventListener(event, callback);
    };
    document.evt = function(event, callback) {
      return this.addEventListener(event, callback);
    };
    Element.prototype.evt = function(event, callback) {
      return this.addEventListener(event, callback);
    };
  }

  // getElementById shorthand
  function $(elemId) {
    return document.getElementById(elemId);
  }

  function init() {
    cvs = $("canvas");

    resizeCanvas(cvs);

    window.evt('resize', resizeCanvas, false);
    window.evt("mousemove", function(e) {
      mouse = getMousePos(cvs, e);
      originx = mouse.x;
      originy = mouse.y;

    });
    // window.evt("touchmove", function (e) {
    //     originx = e.originalEvent.touches[0].pageX;
    //     originy = e.originalEvent.touches[0].pageY;
    // });

    var network = new Field(0, 0, 50);
    var emit = new Emitter(0, 0, 50);

    animateCanvas(cvs, function() {
      network.animate();
      emit.animate();
    });
  }

  // Individual particle
  class Point {
    constructor(x, y, canvas, dia) {
      this.canvas = canvas || cvs;
      this.x = x || 0;
      this.y = y || 0;
      this.vx = 0;
      this.vy = 0;
      this.speed = Math.random() * .5 + .2;
      this.angle = Math.random() * 360;
      this.diaSet = dia || 2 + Math.random() * 10;
      this.dia = this.diaSet;
      this.age = 0;
      let hue = Math.floor(Math.random() * 360);
      this.fill = 'hsl(' + hue + ', 95%, 70%)';
      this.line = Math.random() > .5 ? true : false;
    }

    emit(life) {
      let s = this.speed * 2;
      this.angle += Math.random() * 10 - 5;
      this.x += s * Math.cos(this.angle * Math.PI / 180);
      this.y += s * Math.sin(this.angle * Math.PI / 180);
      this.age += 1 / life;
      this.boundary();
    }

    boundary() {
      if (this.x < 0) {
        this.x = this.canvas.width;
      }
      if (this.x > this.canvas.width) {
        this.x = 0;
      }
      if (this.y < 0) {
        this.y = this.canvas.height;
      }
      if (this.y > this.canvas.height) {
        this.y = 0;
      }
    }

    field(life) {
      let s = this.speed;
      this.angle += Math.random() * 10 - 5;
      this.x += s * Math.cos(this.angle * Math.PI / 180);
      this.y += s * Math.sin(this.angle * Math.PI / 180);
      this.age += 1 / life;
      this.boundary();
    }

    shrink(life) {
      this.dia = (1 - this.age) * this.diaSet;
    }

    draw() {
      let ctx = this.canvas.getContext('2d'),
        x = this.x,
        y = this.y,
        dia = this.dia,
        age = this.age;

      ctx.beginPath();
      ctx.fillStyle = this.fill;
      ctx.strokeStyle = this.fill;
      ctx.lineWidth = 2;
      ctx.arc(x, y, dia, 0, 2 * Math.PI);
      ctx.closePath();

      this.line !== true ? ctx.fill() : ctx.stroke();
    }
  }

  class ParticleGroup {

    setPosition(x, y) {
      this.x = x;
      this.y = y;
    }

    getPosition(x, y) {
      return {
        x: this.x,
        y: this.y
      };
    }

    spawn(x, y, amount, dia) {

      var arr = [];
      dia = dia || false;

      amount = amount || 1;

      if (amount > 1) {
        for (let i = 0; i < amount; i++) {
          if (dia) {
            arr.push(new Point(x, y, cvs, dia));
          } else {
            arr.push(new Point(x, y, cvs));
          }

        }
      } else {
        arr = new Point(x, y, cvs, dia);
      }

      return arr;
    }
  }

  // Particle Emitter
  class Emitter extends ParticleGroup {
    constructor(x, y, life, mouse, dia) {
      super();

      if (mouse === undefined) {
        this.mouse = true;
      } else {
        this.mouse = mouse;
      }

      this.particles = [];
      this.x = x || 0;
      this.y = y || 0;
      this.life = life || 20;
      this.canvas = cvs;
      this.dia = dia || false;
    }

    animate() {
      let particles = this.particles;
      if (this.mouse) {
        this.setPosition(originx, originy);
      }

      let mul = 1;

      for (let i = 0; i < mul; i++) {
        particles.push(this.spawn(this.x, this.y, 1));
      }

      if (particles.length > this.life * mul) {
        for (let i = 0; i < mul; i++) {
          particles.shift();
        }
      }

      this.render(this.canvas);
    }

    render() {
      let life = this.life;
      let ctx = this.canvas.getContext('2d');
      let particles = this.particles;

      for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        p.draw();
        p.emit(this.life);
        p.shrink();
      }
    }
  }

  // Particle Field
  class Field extends ParticleGroup {
    constructor(x, y, life) {
      super();
      this.particles = [];
      this.canvas = cvs;
      this.x = x || 0;
      this.y = y || 0;
      this.life = life;

      for (let i = 0; i < this.life; i++) {
        let x = Math.random() * cvs.width,
          y = Math.random() * cvs.height;

        this.particles.push(this.spawn(x, y, 1));
      }
    }

    animate() {
      this.render(canvas);
    }

    render(canvas) {
      let ctx = this.canvas.getContext('2d');
      let particles = this.particles;

      for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        p.draw();
        p.field(this.life);
      }
    }
  }

  // get the mouse position relative to the canvas
  function getMousePos(cvs, evt) {
    const rect = cvs.getBoundingClientRect();
    return {
      x: evt.clientX - rect.left,
      y: evt.clientY - rect.top
    };
  }

  // animate the canvas
  function animateCanvas(canvas, callback) {

    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    callback();

    requestAnimationFrame(animateCanvas.bind(null, canvas, callback));
  }

  // Update canvas size to fill window
  function resizeCanvas(canvas) {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    originx = canvas.width / 2;
    originy = canvas.height / 2;
  }

  init();
</script>
<script>
  // Add event listener for beforeunload
  window.addEventListener('beforeunload', function() {
    // Get the left and right div elements
    var leftDiv = document.getElementById('leftDiv');
    var rightDiv = document.getElementById('rightDiv');

    // Transition the divs to cover the page
    leftDiv.style.transform = 'translateX(0)';
    rightDiv.style.transform = 'translateX(0)';
    // delay 0.5 sec give white screen time to transition
    setTimeout(function() {
      // Set the divs to cover the page
      leftDiv.style.width = '100vw';
      rightDiv.style.width = '100vw';
    }, 500);
  });
</script>

</html>
