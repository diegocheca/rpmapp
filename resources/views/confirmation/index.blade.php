<!DOCTYPE html>
<html>
<head>
	<title>Gracias</title>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600");
@import url("https://fonts.googleapis.com/css?family=Lato");
.more-pens {
  position: fixed;
  left: 20px;
  bottom: 20px;
  z-index: 10;
  font-family: "Montserrat";
  font-size: 12px;
}

a.white-mode, a.white-mode:link, a.white-mode:visited, a.white-mode:active {
  font-family: "Montserrat";
  font-size: 12px;
  text-decoration: none;
  background: #212121;
  padding: 4px 8px;
  color: #f7f7f7;
}
a.white-mode:hover, a.white-mode:link:hover, a.white-mode:visited:hover, a.white-mode:active:hover {
  background: #edf3f8;
  color: #212121;
}

body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  width: 100%;
  height: 100%;
  background: #121212;
}

.codepen {
  text-align: center;
  width: 427px;
  height: 76px;
}
.codepen svg {
  width: 427px;
  height: 76px;
  fill: #FFFFFF;
}

.title {
  z-index: 10;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%) scale(0.8);
  text-align: center;
}
.title h1 {
  font-family: "Montserrat";
  font-weight: 200;
  font-size: 40px;
  padding: 0;
  margin: 0;
  line-height: 1;
  color: #FFFFFF;
  letter-spacing: 2px;
}
.title h2 {
  font-family: "Lato", sans-serif;
  font-size: 14px;
  font-weight: 400;
  font-style: italic;
  padding: 0;
  margin: 4px 0 0 0;
  line-height: 1;
  color: #FFFFFF;
  letter-spacing: 2px;
}

svg {
  transition: fill 0.3s ease-out;
  display: block;
  width: 30px;
  height: 30px;
  position: absolute;
  transform: translateZ(0px);
  fill: #444444;
}
svg.highlight {
  fill: #fcd000;
}

	</style>
</head>
<body>

<div class="title">
  <h1>Gracias Por confirmar tu email</h1>
  <div class="codepen">
    

  </div>
  <h2>Registro de Productores Mineros - San Juan.</h2>
  <br>
  <br>
  <a  href="{{url('dashboard')}}"><h1 style="color:white;">Ir página principal</h1></a>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	const heart = '<svg viewBox="0 0 100.1 86.8"> <path d="M85.3,2.7c-13-5.8-29.5,0-35.3,12.2C44.3,1.9,27-3.8,14.8,2.7C1.2,9.1-5.3,25,5.5,44.4C13.4,58,27,68.1,50,86.8 C73.8,68.1,87.4,58,94.6,44.4C105.4,25.7,98.9,9.1,85.3,2.7z"/> </svg>';
const logo = '<svg viewBox="0 0 100.1 100"> <path d="M100.1,34.3c-0.4-2.6-3.3-4-5.3-5.3c-3.6-2.4-7.1-4.7-10.7-7.1C75.6,16.2,67,10.5,58.5,4.8c-2-1.3-4-2.7-6-4 c-1.4-1-3.3-1-4.8,0C42,4.6,36.2,8.5,30.5,12.3L5.3,29.1c-2.2,1.4-5.1,2.8-5.2,5.8c-0.1,3.3,0,6.7,0,10v16c0,2.9-0.6,6.3,2.1,8.1 c6.4,4.4,12.9,8.6,19.4,12.9c8,5.3,16,10.7,24,16c2.2,1.5,4.4,3.1,7.1,1.3c2.3-1.5,4.5-3,6.8-4.5c8.9-5.9,17.8-11.9,26.7-17.8 l9.9-6.6c0.6-0.4,1.3-0.8,1.9-1.3c1.4-1,2-2.4,2-4.1V37.4C100.1,36.3,100.2,35.3,100.1,34.3C100.1,34.2,100.1,34.5,100.1,34.3z M54.4,12.4l33.7,22.5L73.1,45L54.4,32.5V12.4z M45.8,12.4v20L27.2,44.9l-15.1-10L45.8,12.4z M8.7,42.9l10.7,7.2L8.7,57.3V42.9z M45.8,87.8L12.1,65.3l15-10.1l18.6,12.5L45.8,87.8L45.8,87.8z M50.1,60.3L34.9,50.1l15.2-10.2l15.2,10.2L50.1,60.3z M54.4,87.8v-20 L73,55.3l15,10.1L54.4,87.8z M91.5,57.3l-10.7-7.2l10.8-7.2C91.6,42.9,91.5,57.3,91.5,57.3z"/> </svg>';

const star = '<svg viewBox="0 0 100.1 99.2"> <path d="M50,2.7l12.8,34.4l36.6,1.6L70.8,61.2l9.9,35.3L50,76.3L19.5,96.5l9.9-35.3L0.7,38.5L37.3,37L50,2.7z"/> </svg>';
const cloud = '<svg viewBox="0 0 100.1 65.1"> <path class="st0" d="M36.6,58.6c0,1.5,1.2,1.7,1.9,1.2c1.8-1.6,15.9-14.6,15.9-14.6h19.3c3.8,0,4.4-0.8,4.4-4.5V9.6 c0-3.7-0.8-4.5-4.4-4.5H26.3c-3.6,0-4.4,0.9-4.4,4.5v31.1c0,3.7,0.7,4.4,4.4,4.4h10.4L36.6,58.6L36.6,58.6z"/></svg>';


const data = [heart, logo, star, cloud];

const max = 50;

let particles = [];


class Ball {
  constructor(shape) {
    this.shape = $(shape);
    this.speed = 2 + Math.random() * 12;
    this.vx = Math.random() * this.speed - Math.random() * this.speed;
    this.vy = Math.random() * this.speed - Math.random() * this.speed;
    this.radius = 10 + Math.round(Math.random() * 50);
    this.w = $(window).width();
    this.h = $(window).height();
    this.x = (this.w - this.radius) / 2;
    this.y = (this.h - this.radius) / 2;

    $(window).on("resize", this.resize.bind(this));
    this.render();
  }

  render() {
    $(this.shape).css({
      width: this.radius,
      height: this.radius });

    $("body").append(this.shape);
  }

  resize() {
    this.w = $(window).width();
    this.h = $(window).height();
  }

  move() {
    this.x = this.x + this.vx;
    this.y = this.y + this.vy;


    this.shape.css({
      left: this.x,
      top: this.y,
      transform: "rotate(" + this.y + "deg)" });


    if (this.x < 0 || this.x > this.w - this.radius) {
      this.vx = -this.vx;
      $(this.shape).toggleClass("highlight");
    }
    if (this.y < 0 || this.y > this.h - this.radius) {
      this.vy = -this.vy;
      $(this.shape).toggleClass("highlight");
    }
    return this;
  }}



function randomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}


for (let i = 0; i < max; i++) {
  particles.push(
  new Ball(data[randomInt(0, data.length - 1)]));

}

function update() {
  particles = particles.filter(function (p) {
    return p.move();
  });
  requestAnimationFrame(update.bind(this));
}
update();
</script>

</body>
</html>