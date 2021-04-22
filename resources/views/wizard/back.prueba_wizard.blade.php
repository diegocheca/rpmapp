<!DOCTYPE html>
<html lang="en" dir="ltr" style="background-color: white">
	<head>
		<meta charset="utf-8">
		<title>wiz</title>
		<link rel="stylesheet" href="wizard/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="wizard/vue-form-wizard.min.css">
		<link rel="stylesheet" href="wizard/bootstrap.min.css">
		<link rel="stylesheet" href="wizard/cosas_wizar.css">
		<link rel="stylesheet" href="wizard/menu_flotante.css">
		<link rel="stylesheet" href="wizard/bootstrap-tour-standalone.css">
		<link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">


		<style media="screen">
			pre { overflow: auto; }
			pre .string { color: #885800; }
			pre .number { color: blue; }
			pre .boolean { color: magenta; }
			pre .null { color: red; }
			pre .key { color: green; }

			.slide-fade-enter-active {
				transition: all .3s ease;
			}
			.slide-fade-leave-active {
				transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
			}
			.slide-fade-enter, .slide-fade-leave-to
			/* .slide-fade-leave-active below version 2.1.8 */ {
				transform: translateX(10px);
				opacity: 0;
			}
		</style>
		<link rel="stylesheet" href="wizard/vue-multiselect.min.css">



	<!--	<style type="text/css">
			* html .clearfix {
			  zoom: 1;
			}

			/* IE6 */
			*:first-child + html .clearfix {
			  zoom: 1;
			}

			/* IE7 */
			.clearfix:before,
			.clearfix:after {
			  content: "";
			  display: table;
			}

			.clearfix:after {
			  clear: both;
			}

			.clearfix {
			  zoom: 1;
			  /* For IE 6/7 (trigger hasLayout) */
			}

			* {
			  margin: 0;
			  padding: 0;
			  border: 0;
			  box-sizing: border-box;
			  -webkit-font-smoothing: antialiased;
			}

			a, a:hover, a:focus, a:active {
			  text-decoration: none !important;
			  outline: none;
			}

			.npd {
			  padding: 0;
			}

			ul, li {
			  padding: 0;
			  margin: 0;
			  list-style: none;
			}

			a:hover {
			  opacity: 0.7;
			  color: white;
			}

			body {
			  font-size: 14px;
			  color: black;
			}

			.clear {
			  clear: both;
			}

			img {
			  max-width: 100%;
			}

			h1, h2, h3, h4 {
			  padding: 0;
			  margin: 0;
			}

			.wrap {
			  width: 100%;
			  height: 100vh;
			  position: relative;
			  background-color: #22262b;
			  display: flex;
			  justify-content: center;
			  align-items: center;
			}

			.comp {
			  width: 80%;
			  height: 194px;
			  text-align: center;
			}
			.comp .monitor {
			  width: 275px;
			  height: 181px;
			  display: block;
			  margin: 0 auto;
			  border-radius: 10px 10px 0px 0px;
			  padding: 9px;
			  border: solid 1px #e0e2e2;
			  background-color: black;
			}
			.comp .mid {
			  float: left;
			  display: block;
			  height: 100%;
			  position: relative;
			  background-color: #abadc6;
			  width: 50%;
			}
			.comp .mid.codigo {
			  background-color: #22262b;
			}
			.comp .site {
			  overflow: hidden;
			  position: absolute;
			  width: 105px;
			  height: 138px;
			  bottom: 0;
			  right: 0;
			}
			.comp .site .topbar {
			  width: 100%;
			}
			.comp .site .cerrar {
			  width: 100%;
			  padding: 3px;
			  line-height: 0;
			  display: flex;
			  align-items: center;
			  justify-content: flex-start;
			  border-radius: 4px 4px 0px 0px;
			  background-color: #afa895;
			}
			.comp .site .cerrar > div {
			  display: inline-block;
			  width: 2px;
			  height: 2px;
			  border-radius: 50%;
			  background: white;
			  margin: 0px 1px;
			}
			.comp .site .inhead {
			  padding: 2px;
			  height: 5px;
			  background-color: #ddd8cf;
			}
			.comp .site .inhead .item {
			  width: 10px;
			  height: 1px;
			  background-color: #d1c9bf;
			  margin: 0 1px;
			  display: block;
			  float: left;
			}
			.comp .txr {
			  text-align: right;
			}
			.comp .txr .item {
			  float: right;
			}
			.comp .inslid {
			  width: 100%;
			  height: 33px;
			  background-color: #efebe2;
			}
			.comp .incont {
			  padding-top: 10px;
			  background: #fefaf0;
			}
			.comp .incont .item {
			  background-color: #d1c9bf;
			  width: 53px;
			  height: 2px;
			  display: block;
			  margin: 0 auto;
			  margin-top: 1px;
			}
			.comp .incont .item:nth-child(1) {
			  width: 20px;
			}
			.comp .incont .item:nth-child(2) {
			  margin-top: 3px;
			  width: 41px;
			}
			.comp .incont .item:nth-child(3) {
			  width: 32px;
			}
			.comp .incont .item:nth-child(4) {
			  width: 23px;
			}
			.comp .incont .wid {
			  width: 100%;
			  padding: 8px 1px;
			}
			.comp .incont .wid .itwid {
			  width: 33.333%;
			  float: left;
			  height: 26px;
			  padding: 0px 3px;
			}
			.comp .incont .wid .itwid > div {
			  width: 100%;
			  height: 100%;
			  background-color: #f5f1e6;
			  position: relative;
			}
			.comp .incont .wid .itwid > div .contfoot {
			  position: absolute;
			  bottom: 0;
			  left: 0;
			  height: 6px;
			  width: 100%;
			  background-color: #ebe5dc;
			}
			.comp .incont .infoot {
			  background-color: #efebe2;
			  height: 26px;
			  width: 100%;
			}
			@-webkit-keyframes code {
			  0% {
				opacity: 1;
			  }
			  50% {
				opacity: 0.6;
			  }
			  100% {
				opacity: 1;
			  }
			}
			@keyframes code {
			  0% {
				opacity: 1;
			  }
			  50% {
				opacity: 0.6;
			  }
			  100% {
				opacity: 1;
			  }
			}
			.comp .codigo {
			  padding: 14px 0px 14px 14px;
			}
			.comp .codigo .var {
			  background-color: #ac5e47;
			  -webkit-animation: code;
					  animation: code;
			  -webkit-animation-duration: 0.3s;
					  animation-duration: 0.3s;
			  -webkit-animation-iteration-count: infinite;
					  animation-iteration-count: infinite;
			}
			.comp .codigo .cont {
			  background-color: #464748;
			  -webkit-animation: code;
					  animation: code;
			  -webkit-animation-duration: 0.5s;
					  animation-duration: 0.5s;
			  -webkit-animation-iteration-count: infinite;
					  animation-iteration-count: infinite;
			}
			.comp .codigo .fun {
			  background-color: #fbb053;
			  -webkit-animation: code;
					  animation: code;
			  -webkit-animation-duration: 0.2s;
					  animation-duration: 0.2s;
			  -webkit-animation-iteration-count: infinite;
					  animation-iteration-count: infinite;
			}
			.comp .codigo .atr {
			  background-color: #645572;
			  -webkit-animation: code;
					  animation: code;
			  -webkit-animation-duration: 0.1s;
					  animation-duration: 0.1s;
			  -webkit-animation-iteration-count: infinite;
					  animation-iteration-count: infinite;
			}
			.comp .codigo .item {
			  height: 3px;
			  width: 20px;
			  float: left;
			  margin-right: 3px;
			}
			.comp .codigo .item.min {
			  width: 13px;
			}
			.comp .codigo .item.lrg {
			  width: 30px;
			}
			.comp .codigo .line {
			  padding: 2px 0;
			  width: 100%;
			}
			.comp .codigo .tab1 {
			  padding-left: 5px;
			}
			.comp .codigo .tab2 {
			  padding-left: 8px;
			}
			.comp .codigo .tab3 {
			  padding-left: 10px;
			}
			.comp .codigo .tab4 {
			  padding-left: 12px;
			}

			.base {
			  width: 338px;
			  height: 12px;
			  background: #e0e2e2;
			  display: block;
			  margin: 0 auto;
			  border-radius: 0px 0px 6px 6px;
			}

		</style>
-->

		<!--<style type="text/css">
			body {
				  margin: 0;
				  padding: 0;
				  height: 100vh;
				  background: radial-gradient(circle, #B993D6, #8CA6DB);
				  
				}

				.obj {
				  outline: 1px solid transparent;
				  margin: auto;
				  position: absolute;
				  left: 80%;
				  top: 20%;
				  margin-left: -70px;
				  margin-top: -200px;
				  width: 100px;
				  height: 90px;
				  background: rgb(208, 219, 219);
				  border-left: 10px solid rgb(70, 70, 70);
				  border-right: 10px solid rgb(70, 70, 70);
				  border-bottom: 0;
				  transform: rotateX(45deg) rotateZ(45deg);
				  transform-style: preserve-3d;
				 
				}

				.plane1 {
				  outline: 1px solid transparent;
				  position: absolute;
				  display: inline-block;
				  background: lightgray;
				  width: 140px;
				  height: 400px;
				  bottom: -341px;
				  left: 131px;
				  border-left: 9px solid rgb(75, 75, 75);
				  border-right: 10px solid rgb(75, 75, 75);
				  border-top: 1px solid white;
				  border-bottom: 0;
				  z-index: 1;
				  transform: rotateX(-90deg);
				}

				.topedge {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 20px;
				  background: rgb(230, 241, 241);
				}

				.module1 {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 60px;
				  border-top: 4px solid rgb(25, 25, 25);
				  background: rgb(45, 45, 45);
				}

				.minimod {
				  display: block;
				  position: absolute;
				  width: 28px;
				  height: 10px;
				  top: 25%;
				  left: 5px;
				  background: darkgray;
				}

				.minimod:nth-child(2) {
				  left: 38px;
				}

				.minimod:nth-child(3) {
				  left: 72px;
				}

				.minimod:nth-child(4) {
				  left: 106px;
				}

				.minimodmain:nth-child(2) {
				  position: relative;
				  top: 30px;
				}

				.mod1light {
				  position: absolute;
				  display: block;
				  width: 4px;
				  height: 4px;
				  background: rgb(99, 228, 0);
				  border-radius: 5px;
				  top: 5px;
				  left: 30px;
				}

				.mod1light::before {
				  content: "";
				  display: block;
				  width: 2px;
				  height: 2px;
				  background: black;
				  position: absolute;
				  right: 15px;
				  border-radius: 5px;
				}

				.mod1light::after {
				  content: "";
				  display: block;
				  width: 4px;
				  height: 4px;
				  background: red;
				  position: absolute;
				  border-radius: 5px;
				  opacity: 0;
				  animation: blink 2s ease-out infinite;
				}

				@keyframes blink {
				  0%,
				  100% {
					opacity: 0;
				  }
				  50% {
					opacity: 1;
				  }
				}

				.mod1light:nth-child(2) {
				  left: 62px;
				}

				.mod1light:nth-child(3) {
				  left: 97px;
				}

				.mod1light:nth-child(4) {
				  left: 130px;
				}

				.lights:nth-child(2) {
				  position: absolute;
				  bottom: 20px;
				}

				.module2 {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 60px;
				  border-top: 4px solid rgb(25, 25, 25);
				  background: rgb(57, 56, 56);
				}

				.line {
				  position: absolute;
				  display: block;
				  width: 5px;
				  height: 40px;
				  background: rgb(25, 25, 25);
				  top: 8px;
				  left: 6px;
				  border-radius: 10px;
				}

				.line:nth-child(2) {
				  left: 16px;
				}

				.line:nth-child(3) {
				  left: 26px;
				}

				.line:nth-child(4) {
				  left: 36px;
				}

				.line:nth-child(5) {
				  left: 46px;
				}

				.line:nth-child(6) {
				  left: 56px;
				}

				.line:nth-child(7) {
				  left: 66px;
				}

				.line:nth-child(8) {
				  left: 76px;
				}

				.line:nth-child(9) {
				  left: 86px;
				}

				.line:nth-child(10) {
				  left: 96px;
				}

				.line:nth-child(11) {
				  left: 106px;
				}

				.power {
				  display: block;
				  position: absolute;
				  width: 12px;
				  height: 12px;
				  background: rgb(117, 114, 114);
				  border-radius: 12px;
				  right: 8px;
				  top: 20px;
				  border: 1px solid rgb(50, 50, 50);
				}

				.powerlight {
				  display: block;
				  position: absolute;
				  width: 12px;
				  height: 5px;
				  background: rgb(99, 228, 0);
				  border-radius: 5px;
				  right: 8px;
				  top: 40px;
				  animation: glow 1s ease-out infinite;
				}

				@keyframes glow {
				  50% {
					opacity: 0.6;
				  }
				}

				.module3 {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 50px;
				  border-top: 4px solid rgb(25, 25, 25);
				  background: rgb(120, 120, 120);
				}

				.tape {
				  display: block;
				  position: absolute;
				  width: 30px;
				  height: 12px;
				  background: skyblue;
				  top: 20px;
				  left: 15px;
				  -webkit-box-shadow: inset 1px -1px 0 1px rgba(0, 0, 0, 0.73);
				  -moz-box-shadow: inset 1px -1px 0 1px rgba(0, 0, 0, 0.73);
				  box-shadow: inset 1px -1px 0 1px rgba(0, 0, 0, 0.73);
				  overflow: hidden;
				}

				.tape::after {
				  display: block;
				  content: "";
				  width: 120px;
				  height: 10px;
				  background: transparent;
				  border-bottom: 3px dotted black;
				  position: absolute;
				  bottom: 5px;
				  right: -90px;
				  border-style: dashed;
				  animation: datamov 15s ease infinite;
				}

				@keyframes datamov {
				  50% {
					right: 0;
					border-width: 2px;
				  }
				}

				.lines2 {
				  display: block;
				  position: absolute;
				  width: 3px;
				  height: 12px;
				  background: rgb(32, 32, 32);
				  border-radius: 10px;
				  right: 60px;
				  top: 2px;
				}

				.line2main {
				  position: absolute;
				  right: 10px;
				}

				.lines2:nth-child(2) {
				  right: 55px;
				}

				.lines2:nth-child(3) {
				  right: 50px;
				}

				.lines2:nth-child(4) {
				  right: 45px;
				}

				.lines2:nth-child(5) {
				  right: 40px;
				}

				.lines2:nth-child(6) {
				  right: 35px;
				}

				.lines2:nth-child(7) {
				  right: 30px;
				}

				.lines2:nth-child(8) {
				  right: 25px;
				}

				.lines2:nth-child(9) {
				  right: 20px;
				}

				.lines2:nth-child(10) {
				  right: 15px;
				}

				.line2main:nth-child(2) {
				  position: absolute;
				  bottom: 18px;
				  right: 10px;
				}

				.bord {
				  display: block;
				  width: 6px;
				  left: 3px;
				  top: 5px;
				  height: 40px;
				  background: rgb(82, 82, 82);
				  position: absolute;
				  opacity: 0.7;
				}

				.bord2 {
				  display: block;
				  width: 6px;
				  right: 3px;
				  top: 5px;
				  height: 40px;
				  background: rgb(82, 82, 82);
				  position: absolute;
				  opacity: 0.7;
				}

				.module4 {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 40px;
				  border-top: 4px solid rgb(25, 25, 25);
				  background: rgb(0, 0, 0);
				  overflow: hidden;
				}

				.glow {
				  display: block;
				  position: absolute;
				  width: 60px;
				  height: 120px;
				  background: rgb(0, 173, 196);
				  background: rgba(0, 173, 196, 0.94);
				  bottom: 0;
				  right: -60px;
				  box-shadow: -8px 23px 200px 100px rgba(0, 173, 196, 0.94);
				  opacity: 1;
				  animation: glowy 3s ease infinite;
				}

				.door {
				  position: absolute;
				  display: block;
				  width: 100%;
				  height: 50px;
				  background: green;
				  opacity: 0.3;
				}

				@keyframes glowy {
				  50% {
					opacity: 0.5;
				  }
				}

				.module4::after {
				  content: "";
				  display: block;
				  width: 70px;
				  height: 100px;
				  background: white;
				  opacity: 0.1;
				  right: 0;
				  top: 0;
				  position: absolute;
				}

				@keyframes cles {
				  50% {
					transform: rotateX(70deg);
				  }
				}

				.module5 {
				  display: block;
				  position: relative;
				  width: 100%;
				  height: 90px;
				  border-top: 8px solid rgb(42, 42, 42);
				  background: rgb(205, 223, 223);
				  border-bottom: 2px solid rgb(24, 24, 24);
				}

				.plane2 {
				  outline: 1px solid transparent;
				  position: absolute;
				  display: block;
				  background: linear-gradient(45deg, #201f1f, #2d2d2d);
				  width: 148px;
				  height: 400px;
				  border: 1px solid rgb(48, 48, 48);
				  border-right: 0 solid rgb(47, 47, 47);
				  transform: rotate(-90deg) rotateX(-90deg);
				  float: left;
				  top: 16px;
				  left: 216px;
				}

				.ventil {
				  position: absolute;
				  width: 100px;
				  height: 4px;
				  background: rgb(85, 85, 85);
				  left: 1px;
				  bottom: 145px;
				  box-shadow: 0 4px 2px 0 rgba(0, 0, 0, 1);
				}

				.ventil:nth-child(2) {
				  bottom: 135px;
				}

				.ventil:nth-child(3) {
				  bottom: 125px;
				}

				.ventil:nth-child(4) {
				  bottom: 115px;
				}

				.ventil:nth-child(5) {
				  bottom: 105px;
				}

				.ventil:nth-child(6) {
				  bottom: 95px;
				}

				.ventil:nth-child(7) {
				  bottom: 85px;
				}

				.ventil:nth-child(8) {
				  bottom: 75px;
				}

				.ventil:nth-child(9) {
				  bottom: 65px;
				}

				.ventil:nth-child(10) {
				  bottom: 55px;
				}

				.ventil:nth-child(11) {
				  bottom: 45px;
				}

				.ventil:nth-child(12) {
				  bottom: 35px;
				}

				.ventil:nth-child(13) {
				  bottom: 25px;
				}

				.ventil:nth-child(14) {
				  bottom: 15px;
				}

				.ventil:nth-child(15) {
				  bottom: 5px;
				  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 1);
				}

				.ventlmain {
				  background: rgb(148, 148, 148);
				  width: 105px;
				  height: 150px;
				  position: absolute;
				  bottom: 25px;
				  left: 25px;
				  border-radius: 4px;
				}

				.plane2top {
				  position: relative;
				  width: 120px;
				  left: 15px;
				  height: 365px;
				  top: 15px;
				  background: transparent;
				  border: 2px solid rgb(166, 166, 166);
				  border-radius: 10px;
				  opacity: 0.8;
				}

				.topvent {
				  position: absolute;
				  width: 6px;
				  height: 6px;
				  background: black;
				  display: block;
				  z-index: 3;
				  border-radius: 5px;
				  top: 50%;
				  right: 50%;
				}

				.topvent::before {
				  content: "";
				  position: absolute;
				  width: 6px;
				  height: 6px;
				  background: black;
				  display: block;
				  z-index: 3;
				  border-radius: 5px;
				  left: 10px;
				}

				.topvent::after {
				  content: "";
				  position: absolute;
				  width: 6px;
				  height: 6px;
				  background: black;
				  display: block;
				  z-index: 3;
				  border-radius: 5px;
				  right: 10px;
				}

				.topvent:nth-child(2):before {
				  left: 20px;
				}

				.topvent:nth-child(2):after {
				  right: 20px;
				}

				.topventrow:nth-child(2) {
				  position: absolute;
				  top: 43%;
				  right: 50%;
				}

				.topventrow:nth-child(3) {
				  position: absolute;
				  top: 37%;
				  right: 50%;
				}

				.topventrow:nth-child(4) {
				  position: absolute;
				  top: 31%;
				  right: 50%;
				}

				.topventrow:nth-child(5) {
				  position: absolute;
				  top: 24%;
				  right: 50%;
				}

				.topventrow:nth-child(5) .topvent:nth-child(2):before {
				  display: none;
				}

				.topventrow:nth-child(5) .topvent:nth-child(2):after {
				  display: none;
				}

				.topventrow:nth-child(6) {
				  position: absolute;
				  top: 57%;
				  right: 50%;
				}

				.topventrow:nth-child(6) .topvent:nth-child(2):before {
				  display: none;
				}

				.topventrow:nth-child(6) .topvent:nth-child(2):after {
				  display: none;
				}

				.ventsmain {
				  position: absolute;
				  width: 50px;
				  height: 100%;
				  top: 10px;
				  right: 45px;
				}
		</style>-->















		<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Raleway:300');
			/*html, body {
				height: 100%;
				width: 100%;
				background: #47515e;
				font-family: 'Raleway', sans-serif;
			}*/
			main {
				position: relative;
				top: 0;
				left: 0;
			}
			main h1 {
				font-weight: lighter;
				text-align: center;
				margin-top: 50px;
				color: #eee;
				position: fixed;
				width: 300px;
				height: 100px;
				top: 68%;
				left: 92%;
				margin-left: -150px;
				margin-top: -170px;
			  font-size: 30px;
			}
			main span {
				background: #13FC13;
				width: 10px;
				height: 10px;
				border-radius: 100%;
			  display: inline-block;
			  vertical-align: middle;
			}
			section {
				position: fixed;
				width: 250px;
				height: 250px;
				top: 80%;
				left: 80%;
				margin-left: -125px;
				margin-top: -125px;
			}
			section aside {
				background: #202730;
				height: 200px;
				width: 15px;
				position: absolute;
				z-index: -1;
			}
			section aside:nth-child(1) {
				left: 5px;
				top: 20px;
			}
			section aside:nth-child(2) {
				right: 5px;
				top: 20px;
			}
			section article {
				width: 100%;
				height: 50px;
				background: #202730;
				margin: 10px auto;
				position: relative;
				box-shadow: 10px 0px 15px #2D3540, -10px 0px 15px #2D3540;
			}
			section article span {
				width: 7px;
				height: 7px;
				border-radius: 100%;
				display: block;
				position: relative;
				top: 10px;
				left: 10px;
				margin: 0 0 15px 0;
			}
			section article span:nth-child(1) {
				background: #28cb40;
			  animation: blinker 0.7s linear infinite;
			}
			section article span:nth-child(2) {
				background: #c99a31;
			  animation: blinker 1.3s linear infinite;
			}
			section article span:nth-child(3) {
				background: transparent;
				border: 1px solid #fff;
				position: absolute;
				top: 20px;
				right: 10px;
				left: inherit;
			}
			section article ul li {
				width: 10px;
			  height: 30px;
			  background: #818993;
			  position: absolute;
			  display: inline-block;
			  z-index: 1;
			  top: 10px;
			}
			section article ul li:nth-child(1) {
			  left: 30px;
			  animation: fade 2s infinite alternate backwards;
			}
			section article ul li:nth-child(2) {
			  left: 50px;
			  animation: fade 1.8s 0.2s infinite alternate backwards;
			}
			section article ul li:nth-child(3) {
			  left: 70px;
			  animation: fade 1.6s 0.4s infinite alternate backwards;
			}
			section article ul li:nth-child(4) {
			  left: 90px;
			  animation: fade 1.4s 0.6s infinite alternate backwards;
			}
			section article ul li:nth-child(5) {
			  left: 110px;
			  animation: fade 1.2s 0.8s infinite alternate backwards;
			}
			section article ul li:nth-child(6) {
			  left: 130px;
			  animation: fade 1s 1s infinite alternate backwards;
			}
			section article ul li:nth-child(7) {
			  left: 150px;
			  animation: fade 0.8s 1.2s infinite alternate backwards;
			}
			section article ul li:nth-child(8) {
			  left: 170px;
			  animation: fade 0.6s 1.4s infinite alternate backwards;
			}
			section article ul li:nth-child(9) {
				width: 30px;
				background: #32a3ef;
				color: #202730;
				font-family: monospace;
			  left: 190px;
			  line-height: 27px;
			  text-align: center;
			  animation: pulse 1.5s linear infinite;
			}

			@keyframes blinker {  
			  50% { opacity: 0; }
			}
			@keyframes pulse {
			  from { background-color: #32a3ef; box-shadow: 0 0 9px #333; }
			  50% { background-color: #59B6F2; box-shadow: 0 0 15px #047AC7; }
			  to { background-color: #32a3ef; box-shadow: 0 0 9px #333; }
			}
			@keyframes fade {
			  from { filter: alpha(opacity=0); opacity: 0; }
			  to { filter: alpha(opacity=100); opacity: 1; }
			}
			@-webkit-keyframes blinker {  
			  50% { opacity: 0; }
			}
			@-webkit-keyframes pulse {
			  from { background-color: #32a3ef; box-shadow: 0 0 9px #333; }
			  50% { background-color: #59B6F2; box-shadow: 0 0 15px #047AC7; }
			  to { background-color: #32a3ef; box-shadow: 0 0 9px #333; }
			}
			@-webkit-keyframes fade {
			  from { filter: alpha(opacity=0); opacity: 0; }
			  to { filter: alpha(opacity=100); opacity: 1; }
			}





















































































































body{margin:0;width:100%;height:100%} body,td,input,textarea,select{font-family:arial,sans-serif} input,textarea,select{font-size:100%} #loading{position:absolute;width:100%;height:100%;z-index:1000;background-color:#fff} .msg{ color: #757575; font: 20px/20px Arial, sans-serif; letter-spacing: .2px; text-align: center } #nlpt{ animation: a-s .5s 2.5s 1 forwards; background-color: #f1f1f1; height: 4px; margin: 56px auto 20px; opacity: 0; overflow: hidden; position: relative; width: 300px } #nlpt::before{ animation: a-lb 20s 3s linear forwards; background-color: #db4437; content: ''; display: block; height: 100%; position: absolute; transform: translateX(-300px); width: 100% } @keyframes a-lb{ 0%{transform:translateX(-300px)}5%{transform:translateX(-240px)}15%{transform:translateX(-30px)}25%{transform:translateX(-30px)}30%{transform:translateX(-20px)}45%{transform:translateX(-20px)}50%{transform:translateX(-15px)}65%{transform:translateX(-15px)}70%{transform:translateX(-10px)}95%{transform:translateX(-10px)}100%{transform:translateX(-5px)} } @keyframes a-s{ 100%{opacity:1} } @keyframes a-h{ 100%{opacity:0} } @keyframes a-nt{ 100%{transform:none} } @keyframes a-e{ 43%{animation-timing-function:cubic-bezier(.8,0,.2,1);transform:scale(.75)} 60%{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-16px)} 77%{animation-timing-function:cubic-bezier(.16,0,.2,1);transform:none} 89%{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-5px)} 100%{transform:none} } @keyframes a-ef{ 24%{animation-timing-function:cubic-bezier(.8,0,.6,1);transform:scaleY(.42)} 52%{animation-timing-function:cubic-bezier(.63,0,.2,1);transform:scaleY(.98)} 83%{animation-timing-function:cubic-bezier(.8,0,.84,1);transform:scaleY(.96)} 100%{transform:none} } @keyframes a-efs{ 24%{animation-timing-function:cubic-bezier(.8,0,.6,1);opacity:.3} 52%{animation-timing-function:cubic-bezier(.63,0,.2,1);opacity:.03} 83%{animation-timing-function:cubic-bezier(.8,0,.84,1);opacity:.05} 100%{opacity:0} } @keyframes a-es{ 24%{animation-timing-function:cubic-bezier(.8,0,.6,1);transform:rotate(-25deg)} 52%{animation-timing-function:cubic-bezier(.63,0,.2,1);transform:rotate(-42.5deg)} 83%{animation-timing-function:cubic-bezier(.8,0,.84,1);transform:rotate(-42deg)} 100%{transform:rotate(-43deg)} } .invfr{position:absolute;left:0;top:0;z-index:-1;width:0;height:0;border:0} .msgb{position:absolute;right:0;font-size:12px;font-weight:normal;color:#000;padding:20px}





























































































svg {
  background-color: #0082c9;
}

#centerCircle {
  stroke-dasharray: 133;
  stroke-dashoffset: 133;
  animation-name: dash;
  animation-duration: 1s;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
}

@keyframes dash {
  from {
	stroke-dashoffset: 133;
  }
  to {
	stroke-dashoffset: 0;
  }
}

#leftCircle, #rightCircle {
  animation-name: popEars;
  animation-duration: 0.35s;
  animation-timing-function: ease;
  animation-fill-mode: forwards;
  opacity: 0;
}

#leftCircle {
  animation-delay: 750ms;
  transform-origin: 52px 47px;
}

#rightCircle {
  animation-delay: 1s;
  transform-origin: 82px 47px;
}

@keyframes popEars {
  0% {
	transform: scale(0.7);
  }
  15% {
  }
  90% {
	transform: scale(1.06);
	opacity: 1;
  }
  100% {
	transform: scale(1);
	opacity: 1;
  }
}

.Type > path {
  animation: popletters 0.6s ease 1 forwards;
  opacity: 0;
  transform-origin: 67px 47px;
}
#N {
  animation-delay: 1s;
}
#e {
  animation-delay: 1.05s;
}
#x {
  animation-delay: 1.1s;
}
#t {
  animation-delay: 1.15s;
}
#c {
  animation-delay: 1.2s;
}
#l {
  animation-delay: 1.25s;
}
#o {
  animation-delay: 1.3s;
}
#u {
  animation-delay: 1.35s;
}
#d {
  animation-delay: 1.4s;
}

@keyframes popletters {
  60% {
	transform: scale(1.0);
	opacity: 0;
  }
  90% {
	transform: scale(1.06);
	opacity: 1;
  }
  100% {
	transform: scale(1.0);
	opacity: 1;
  }
}

@-webkit-keyframes reflow {
  to {width: auto;}
}

svg:hover #centerCircle, svg:hover #leftCircle, svg:hover #rightCircle, svg:hover .Type > path {
  animation: reflow;
}
		</style>
	</head>
	<body>
		<div id="app" style="background-color: white">

			<div>
				
			</div>
			<div>

				<form-wizard @on-complete="onComplete"
							 color="green"
							 error-color="#a94442"
							 >

							<!--<header class="header">
								<nav class="header__nav">
								  <ul class="header__navbar">
									<li class="header__item">
									  <a href="#" class="header__link">
										<transition name="slide-fade">
										  <button class="header--btn" v-if="show" key="on" @click="show = false">
											<svg viewBox="0 0 24 24" class="header--icon">
											  <title>Close</title>
											  <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
											</svg>
										  </button>
										  <button class="header--btn" v-else key="off" @click="show = true">
											<svg viewBox="0 0 24 24" class="header--icon">
											  <title>Navigation Menu</title>
											  <path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z" />
											</svg>
										  </button>
										</transition>
									  </a>
									  <transition name="dropdown">
										<div class="header__dropdown-menu" v-bind:class="{ active: show }" v-if="show">
										  <ul class="header__dropdown-menu-nav">
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Account">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 496 512" class="header--icon">
													<path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm128 421.6c-35.9 26.5-80.1 42.4-128 42.4s-92.1-15.9-128-42.4V416c0-35.3 28.7-64 64-64 11.1 0 27.5 11.4 64 11.4 36.6 0 52.8-11.4 64-11.4 35.3 0 64 28.7 64 64v13.6zm30.6-27.5c-6.8-46.4-46.3-82.1-94.6-82.1-20.5 0-30.4 11.4-64 11.4S204.6 320 184 320c-48.3 0-87.8 35.7-94.6 82.1C53.9 363.6 32 312.4 32 256c0-119.1 96.9-216 216-216s216 96.9 216 216c0 56.4-21.9 107.6-57.4 146.1zM248 120c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 144c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  Account
												</div>
											  </a>
											</li>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Personal info">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 576 512" class="header--icon">
													<path d="M512 32H64C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm32 384c0 17.6-14.4 32-32 32H64c-17.6 0-32-14.4-32-32V96c0-17.6 14.4-32 32-32h448c17.6 0 32 14.4 32 32v320zm-72-128H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm0-64H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM208 288c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm46.8 144c-19.5 0-24.4 7-46.8 7s-27.3-7-46.8-7c-21.2 0-41.8 9.4-53.8 27.4C100.2 342.1 96 355 96 368.9V392c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-23.1c0-7 2.1-13.8 6-19.6 5.6-8.3 15.8-13.2 27.3-13.2 12.4 0 20.8 7 46.8 7 25.9 0 34.3-7 46.8-7 11.5 0 21.7 5 27.3 13.2 3.9 5.8 6 12.6 6 19.6V392c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-23.1c0-13.9-4.2-26.8-11.4-37.5-12.3-18-32.9-27.4-54-27.4z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  Personal info
												</div>
											  </a>
											</li>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Privacy">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 512 512" class="header--icon">
													<path d="M256 169.92c-28.28.41-52.84 9.62-71.37 28.17-18 18-27.69 41.94-27.28 67.44.78 50.23-3.91 100.5-14 149.39-1.81 8.66 3.78 17.12 12.41 18.91 8.5 1.66 17.09-3.77 18.91-12.44 10.56-51.17 15.5-103.78 14.69-156.35-.25-16.77 6.09-32.5 17.91-44.31 18.66-18.66 42.27-18.8 48.75-18.8 37.12.55 66.41 30.19 66.97 66.06.78 50.37-2.97 100.86-11.12 150.06-1.44 8.72 4.44 16.95 13.16 18.39.91.16 1.78.22 2.66.22 7.69 0 14.47-5.55 15.75-13.39 8.47-51.08 12.34-103.48 11.56-155.79-.87-53-44.81-96.76-99-97.56zm-.09 86.09c-8.84.14-15.87 7.41-15.75 16.25 1.12 73.39-8.22 144.99-27.78 215.07l-1.22 4.33c-1.85 6.63 1.74 20.34 15.41 20.34 7 0 13.41-4.61 15.41-11.66l1.22-4.37c20.41-73.08 30.16-147.74 28.97-224.21-.14-8.84-8.23-15.9-16.26-15.75zM112.66 149.79c-25.19 30.98-38.72 70.11-38.09 110.15.62 39.56-2.62 79.14-9.59 117.61-1.56 8.7 4.19 17.03 12.91 18.61.97.17 1.91.25 2.87.25 7.56 0 14.31-5.42 15.72-13.14 7.34-40.53 10.72-82.18 10.09-123.82-.53-33.01 10.19-63.95 30.91-89.47 5.59-6.86 4.53-16.94-2.31-22.51-6.85-5.55-16.91-4.57-22.51 2.32zm399.22 103.03c-.25-16.5-2.19-33.03-5.75-49.14-1.91-8.61-10.34-14-19.06-12.17-8.62 1.91-14.09 10.44-12.19 19.08 3.09 14 4.78 28.39 5 42.73.12 7.66.16 15.31.09 22.97-.06 8.83 7.03 16.05 15.87 16.12h.12c8.78 0 15.94-7.08 16-15.87.07-7.91.04-15.81-.08-23.72zM252.6.05C182.63-1.29 118.32 24.88 70.32 72.91 24.04 119.22-.87 180.76.16 246.2c.12 7.55.06 15.09-.16 22.62-.25 8.83 6.72 16.2 15.56 16.45H16c8.62 0 15.75-6.87 16-15.55.22-8 .28-16.02.16-24.03-.9-56.69 20.69-110.04 60.78-150.16 41.78-41.84 98.9-64.37 159.15-63.48 74.69 1.09 144.87 38.23 187.75 99.32 5.12 7.23 15.12 8.97 22.28 3.91 7.25-5.08 9-15.05 3.91-22.28C417.28 43.52 337.5 1.3 252.6.05zm1.28 84.93a182.36 182.36 0 0 0-45.19 4.91c-8.59 2.03-13.91 10.66-11.87 19.26 2.03 8.58 10.75 13.87 19.25 11.86 12.12-2.86 25.09-4.25 37.31-4.03 82.78 1.22 151.12 67.56 152.37 147.89.62 39.65-1.34 79.59-5.81 118.7-1 8.78 5.31 16.7 14.09 17.7.62.08 1.22.11 1.84.11 8 0 14.94-6.02 15.87-14.19 4.62-40.47 6.62-81.79 6-122.82-1.49-97.44-83.99-177.92-183.86-179.39z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  Privacy
												</div>
											  </a>
											</li>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Data & personalization">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 448 512" class="header--icon">
													<path d="M224 420c-11 0-20-9-20-20v-64c0-11 9-20 20-20s20 9 20 20v64c0 11-9 20-20 20zm224-148v192c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272c0-26.5 21.5-48 48-48h16v-64C64 71.6 136-.3 224.5 0 312.9.3 384 73.1 384 161.5V224h16c26.5 0 48 21.5 48 48zM96 224h256v-64c0-70.6-57.4-128-128-128S96 89.4 96 160v64zm320 240V272c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  Data & personalization
												</div>
											  </a>
											</li>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="People & sharing">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 640 512" class="header--icon">
													<path d="M480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm0-160c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zM192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm80.1 212c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9C7.2 341.3 0 363.4 0 387.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM352 432c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zm271.7-114.9C606.4 291.5 577 278 546.8 278c-27.8 0-34.8 10-66.8 10s-39-10-66.8-10c-13.2 0-26.1 3-38.1 8.1 15.2 15.4 18.5 23.6 20.2 26.6 5.7-1.6 11.6-2.6 17.9-2.6 21.8 0 30 10 66.8 10s45-10 66.8-10c21 0 39.8 9.3 50.4 25 7.1 10.5 10.9 22.9 10.9 35.7V408c0 4.4-3.6 8-8 8H416c0 17.7.3 22.5-1.6 32H600c22.1 0 40-17.9 40-40v-37.3c0-19.9-6-38.3-16.3-53.6z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  People & sharing
												</div>
											  </a>
											</li>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Subscriptions">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 576 512" class="header--icon">
													<path d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM48 64h480c8.8 0 16 7.2 16 16v48H32V80c0-8.8 7.2-16 16-16zm480 384H48c-8.8 0-16-7.2-16-16V224h512v208c0 8.8-7.2 16-16 16zm-336-84v8c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v8c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
												  </svg>
												</div>
												<div class="header__dropdown-menu-text">
												  Subscriptions
												</div>
											  </a>
											</li>
											<hr>
											<li class="header__dropdown-menu-item">
											  <a href="#" class="header__dropdown-menu-link" title="Help">
												<div class="header__dropdown-menu-svg">
												  <svg viewBox="0 0 512 512" class="header--icon">
													<path d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z" />
												  </svg>
												</div>

												<div class="header__dropdown-menu-text">
												  Help
												</div>
											  </a>
											</li>
										  </ul>
										</div>
									  </transition>
									</li>
								  </ul>
								</nav>
							</header>-->
					<tab-content title="Tipo Formulario" icon="ti-layout-list-thumb-alt" :before-change="validatezeroTab">
						<button type="button" class="btn btn-warning" id="startTour">Tutorial</button>
						<h4>Seleccione Tipo de Tramite</h4> <i class="ti-info-alt" id="element" ></i>
						<!--<button v-on:click="show = !show">
							Toggle
						</button>
						<transition name="fade">
							<p v-if="show">hello</p>
						</transition>-->































































































		
























































						  <!--<button @click="show = !show">
							Toggle render
						  </button>
						  <!-<transition name="slide-fade">
							<p v-if="show">hello</p>
						  </transition>->
						   <transition
							name="custom-classes-transition"
							enter-active-class="animated hinge"
							leave-active-class="animated fadeInDownBig"
						  >
							<p v-if="show">hello</p>
						  </transition>
						   @{{paso_130_2}}
						-->

						<div class="middle">
							<label>
								<input type="radio" name="radio"  v-model="formulario_seleccionado" value="101" checked/>
								<div class="front-end box">
									<span>Formulario 101</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="103"/>
								<div class="cientotres box">
									<span>Formulario 103</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="203"/>
								<div class="home box">
									<span>Formulario 203</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="130"/>
								<div class="so box">
									<span>Formulario 130</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="correo"/>
								<div class="mail box">
									<span>Correo Electronico</span>
								</div>
							</label>
							<label>
								<input type="radio" name="radio" v-model="formulario_seleccionado" value="nextcloud"/>
								<div class="next box">
									<span>Nextcloud</span>
								</div>
							</label>
						</div>
						<transition
							name="custom-classes-transition"
							enter-active-class="animated fadeInDownBig"
							leave-active-class="animated bounceOut"
						>
							<div v-show="formulario_seleccionado==101">
								<h4>Sistema el sistema a utilizar:</h4> <i class="ti-info-alt" id="element1" ></i>
								<button type="button" class="btn btn-warning" id="startTourtipo_form">Tutorial</button>
								<div class="middle_sis" >
									<label>
										<input type="radio" name="radio_sys" checked/>
										<div class="dinero box">
											<span>SIIF (Traffin)</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys"/>
										<div class="file box">
											<span>SIGED</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys"/>
										<div class="home box">
											<span>SIGOP</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys"/>
										<div class="usuarios box">
											<span>SIARH</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys"/>
										<div class="usuarios_sipe box">
											<span>SIPE</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sys"/>
										<div class="usuarios_sipe box">
											<span>IPV</span>
										</div>
									</label>
								</div>
							</div>
						</transition>
						
						<vue-form-generator :model="model"
											:schema="zeroTabSchema"
											:options="formOptions"
											ref="zeroTabForm">
						</vue-form-generator>
						<div>
							<!--<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
								Tooltip with HTML
							</button>-->
								<!--<h3>Pasos a Seguir para Realizar el tramite</h3>
								<p>Completar los datos que se le piden en esta pagina web
								Imprimir el documento
								Hacerlo firmar por las autoridades
								Presentarlo en la Oficina de ciberseguridad
								Luego sera llamado por ciberseguridad</p>-->
						</div>
						<!--<button v-on:click="clicked">Click me</button>
						<button v-on:click="prueba_axios">axios</button>
						<button v-on:click="prueba_axios_post">guardar con axios</button>-->
					</tab-content>
					<tab-content title="Datos Personales" icon="ti-user" :before-change="validateFirstTab">
						<button type="button" class="btn btn-warning" id="startTour_dos">Tutorial</button>
						<i class="ti-info-alt" id="element_tres" ></i>
						

						<vue-form-generator :model="model"
										   :schema="firstTabSchema"
										   :options="formOptions"
										   ref="firstTabForm">
						</vue-form-generator>
						
					</tab-content>
					<tab-content title="Datos Laborales"  icon="ti-settings" :before-change="validateSecondTab">
						<button type="button" class="btn btn-warning" id="startTour_tres">Tutorial</button>
						<i class="ti-info-alt" id="element_cuatro" ></i>
						<vue-form-generator :model="model"
										   :schema="secondTabSchema"
										   :options="formOptions"
										   ref="secondTabForm">
						</vue-form-generator>
					</tab-content>
					<tab-content title="Formulario"
								 icon="ti-pencil-alt" 
								 :before-change="validateThridTab">
								 <vue-form-generator :model="model"
										   ref="thridTabForm">
						</vue-form-generator>


								 
						<div v-show="formulario_seleccionado == 101">
							<h4>Seleccion el pedido</h4>
							<div class="middle_pedido">
								<label>
									<input type="radio" name="radio_so" v-model="pedido_formulario" value="alta" checked/>
									<div class="mas box">
										<span>Alta</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so"  v-model="pedido_formulario" value="baja" />
									<div class="baja box">
										<span>Baja</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so" v-model="pedido_formulario" value="modificacion"/>
									<div class="modficacion box">
										<span>Modificacion</span>
									</div>
								</label>
							</div>
							<hr>
							<h3>Perfiles</h3>
							<!--<div>
								<label class="typo__label">Seleccion Perfil select / dropdown</label>
								<multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
									<template slot="selection" slot-scope="	{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">@{{ values.length }} options selected</span></template>
								</multiselect>
								<pre class="language-json"><code>@{{value }}</code></pre>
							</div>-->
							<div>
								<label class="typo__label">Seleccion Perfil</label>
								<!--<multiselect v-model="value" 
											:options="options"
											:multiple="true" 
											:close-on-select="false" 
											:clear-on-select="false" 
											:preserve-search="true" 
											placeholder="Seleccione" 
											label="perfiles_101"  
											track-by="name" 
											:preselect-first="true">
									<template slot="selection" 
												slot-scope="{ values, search, isOpen }">
												<span class="multiselect__single" 
													  v-if="values.length &amp;&amp; !isOpen">@{{ values.length }} Opciones Elegidas
												</span>
									</template>
								</multiselect>
										-->

								<multiselect 
									v-model="value" 
									:options="options" 
									:multiple="true" 
									:close-on-select="false" 
									:clear-on-select="false" 
									:hide-selected="false" 
									:preserve-search="true" 
									placeholder="Seleccion Perfil/es" 
									label="name" 
									track-by="name" 
									:preselect-first="false"
									id="example"
									@select="onSelect"
								>
								</multiselect>
								<pre class="language-json"><code>@{{value }}</code></pre>
							</div>

							<br>
						</div>
						<div v-show="formulario_seleccionado == 103">
							<br>
							<br>
							<label>Nombre de Usuario (opcional)</label>
							<input type="text" name="usuario_sistema" id="usuario_sistema"  v-model="usuario_sistema" maxlength="20">
							<br>
							<br>
							<br>
							<br>

						</div>
						<div v-show="formulario_seleccionado == 203">
							<h4>Seleccion el pedido</h4>
							<div class="middle_solicitud_203">
								<label>
									<input type="radio" name="radio_sol_203" v-model="pedido_formulario_203" value="alta"/>
									<div class="mas box">
										<span>Crear Usuario</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_sol_203"  v-model="pedido_formulario_203" value="baja" />
									<div class="baja box">
										<span>Eliminar Usuario</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_sol_203" v-model="pedido_formulario_203" value="modificacion"/>
									<div class="modficacion box">
										<span>Modificar Usuario</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_sol_203" v-model="pedido_formulario_203" value="desbloqueo"/>
									<div class="pass box">
										<span>Desbloquear Usuario</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_sol_203" v-model="pedido_formulario_203" value="cambio_contraseña"/>
									<div class="desbloqueo box">
										<span>Cambiar Contraseña</span>
									</div>
								</label>

							</div>
							<hr style="border-top: 1px dashed #B6B6B4;">
							<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInLeft"
								leave-active-class="animated slideOutRight"
							>
								<div v-show="pedido_formulario_203 != ''">
									<h4>Datos</h4>
									<br>
									<label>Nombre de Usuario:</label>
									<input type="text" name="nombre_usuario_203" v-model="nombre_de_usuario_203">
									<hr style="border-top: 1px dashed #B6B6B4;">

									<div>
										<label class="detalles_f_203">Detalles:</label>
										<textarea cols="50" rows="2" name="detalles_f_203" id="detalles_f_203" cols="35" rows="4" v-model="detalles_f_203"></textarea>
										
									</div>
									
								</div>
							</transition>
							<br>
						</div>
						<div v-show="formulario_seleccionado == 'correo'">
							<h3>Seleccion el pedido</h3>
							<div class="middle_correo">
								<label>
									<input type="radio" name="radio_sol_203" v-model="uso_de_correo" value="laboral"/>
									<div class="laboral box">
										<span>Institucional</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_sol_203"  v-model="uso_de_correo" value="personal" />
									<div class="personal box">
										<span>Personal</span>
									</div>
								</label>
							</div>
								<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInLeft"
								leave-active-class="animated slideOutRight"
							>
								<div v-show="uso_de_correo == 'laboral'">
									<label>Nombre sugerido de cuenta Institucional:</label>
									<input type="text" name="sugerencia_mail" v-model="sugerencia_mail" placeholder="tesoreria">@sanjuan.gov.ar
								</div>
							</transition>
							<div style="display: flex; justify-content: right; align-items: right; height: 10vh;">
								<div style="height:128px;margin:0 auto;position:absolute;  left: 74%; top: 25%;width:176px">
									<div style="animation:a-s .5s .5s 1 linear forwards,a-e 1.75s .5s 1 cubic-bezier(0,0,.67,1) forwards;opacity:0;transform:scale(.68)">
										<div style="background:#ddd;border-radius:12px;box-shadow:0 15px 15px -15px rgba(0,0,0,.3);height:128px;left:0;overflow:hidden;position:absolute;top:0;transform:scale(1);width:176px">
											<div style="animation:a-nt .667s 1.5s 1 cubic-bezier(.4,0,.2,1) forwards;background:#d23f31;border-radius:50%;height:270px;left:88px;margin:-135px;position:absolute;top:25px;transform:scale(.5);width:270px"></div>
											<div style="height:128px;left:20px;overflow:hidden;position:absolute;top:0;transform:scale(1);width:136px">
												<div style="background:#e1e1e1;height:128px;left:0;position:absolute;top:0;width:68px">
													<div style="animation:a-h .25s 1.25s 1 forwards;background:#eee;height:128px;left:0;opacity:1;position:absolute;top:0;width:68px"></div>
												</div>
												<div style="background:#eee;height:100px;left:1px;position:absolute;top:56px;transform:scaleY(.73)rotate(135deg);width:200px"></div>
											</div>
											<div style="background:#bbb;height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
												<div style="background:#eee;border-radius:12px 12px 0 0;bottom:117px;height:12px;left:55px;position:absolute;transform:rotate(-135deg)scaleY(1.37);width:136px"></div>
												<div style="background:#eee;height:96px;position:absolute;right:0;top:0;width:96px"></div>
												<div style="box-shadow:inset 0 0 10px #888;height:155px;position:absolute;right:0;top:0;width:155px"></div>
											</div>
											<div style="animation:a-s .167s 1.283s 1 linear forwards,a-es 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:linear-gradient(0,rgba(38,38,38,0),rgba(38,38,38,.2));height:225px;left:0;opacity:0;position:absolute;top:0;transform:rotate(-43deg);transform-origin:0 13px;width:176px"></div>
										</div>
										<div style="animation:a-ef 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;border-radius:12px;height:100px;left:0;overflow:hidden;position:absolute;top:0;transform:scaleY(1);transform-origin:top;width:176px">
											<div style="height:176px;left:0;position:absolute;top:-100px;transform:scaleY(.73)rotate(135deg);width:176px">
												<div style="animation:a-s .167s 1.283s 1 linear forwards;box-shadow:-5px 0 12px rgba(0,0,0,.5);height:176px;left:0;opacity:0;position:absolute;top:0;width:176px"></div>
												<div style="background:#ddd;height:176px;left:0;overflow:hidden;position:absolute;top:0;width:176px">
													<div style="animation:a-nt .667s 1.25s 1 cubic-bezier(.4,0,.2,1) forwards;background:#db4437;border-radius:50%;bottom:41px;height:225px;left:41px;position:absolute;transform:scale(0);width:225px"></div>
													<div style="background:#f1f1f1;height:128px;left:24px;position:absolute;top:24px;transform:rotate(90deg);width:128px"></div>
													<div style="animation:a-efs 1.184s 1.283s 1 cubic-bezier(.4,0,.2,1) forwards;background:#fff;height:176px;opacity:0;transform:rotate(90deg);width:176px"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
						
							<hr>
							<br>
						</div>
						<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInLeft"
								leave-active-class="animated slideOutRight"
							>
							
							<div v-show="formulario_seleccionado == 'nextcloud'">
								<svg width="20%" height="25%" style="position: absolute;  left: 74%; top: 25%;" viewBox="0 0 133 94" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
									<g id="OnlyLines">
										<g class="Type">
											<path id="d" d="M107.705,73.761c2.493,0 3.387,2.07 3.387,2.07l0.047,0c0,0 -0.047,-0.329 -0.047,-0.8l0,-4.656c0,-0.33 -0.141,-0.518 0.188,-0.518l0.376,0c0.329,0 0.847,0.188 0.847,0.518l0,13.406c0,0.329 -0.141,0.517 -0.471,0.517l-0.329,0c-0.329,0 -0.517,-0.141 -0.517,-0.47l0,-0.8c0,-0.376 0.094,-0.659 0.094,-0.659l-0.047,0c0,0 -0.894,2.164 -3.575,2.164c-2.775,0 -4.516,-2.211 -4.516,-5.409c-0.094,-3.199 1.835,-5.363 4.563,-5.363l0,0Zm0.047,9.596c1.74,0 3.34,-1.223 3.34,-4.186c0,-2.117 -1.082,-4.14 -3.293,-4.14c-1.835,0 -3.34,1.506 -3.34,4.14c0.047,2.54 1.364,4.186 3.293,4.186Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="u" d="M100.367,73.997l-0.376,0c-0.33,0 -0.518,0.188 -0.518,0.517l0,5.692c0,1.599 -1.035,3.057 -3.057,3.057c-1.976,0 -3.058,-1.458 -3.058,-3.057l0,-5.692c0,-0.329 -0.188,-0.517 -0.517,-0.517l-0.377,0c-0.329,0 -0.47,0.188 -0.47,0.517l0,6.068c0,2.681 1.976,3.998 4.422,3.998c2.446,0 4.421,-1.317 4.421,-3.998l0,-6.068c0.047,-0.329 -0.141,-0.517 -0.47,-0.517l0,0Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="o" d="M84.233,73.761c3.01,0 5.456,2.305 5.456,5.363c0,3.104 -2.446,5.456 -5.456,5.456c-3.011,0 -5.457,-2.352 -5.457,-5.456c0,-3.058 2.446,-5.363 5.457,-5.363l0,0Zm0,9.596c2.21,0 3.998,-1.787 3.998,-4.233c0,-2.352 -1.788,-4.093 -3.998,-4.093c-2.211,0 -4.046,1.788 -4.046,4.093c0.047,2.399 1.835,4.233 4.046,4.233Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="l" d="M74.59,70.422c0,-0.33 -0.188,-0.518 0.141,-0.518l0.376,0c0.329,0 0.847,0.188 0.847,0.518l0,11.242c0,1.317 0.611,1.458 1.082,1.505c0.235,0 0.423,0.141 0.423,0.471l0,0.329c0,0.329 -0.141,0.517 -0.517,0.517c-0.847,0 -2.352,-0.282 -2.352,-2.54l0,-11.524l0,0Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="c" d="M68.334,73.761c1.787,0 2.916,0.753 3.433,1.176c0.236,0.189 0.283,0.424 0.047,0.706l-0.141,0.235c-0.188,0.282 -0.423,0.282 -0.705,0.094c-0.471,-0.329 -1.364,-0.941 -2.587,-0.941c-2.258,0 -4.046,1.694 -4.046,4.187c0,2.446 1.788,4.139 4.046,4.139c1.458,0 2.446,-0.658 2.916,-1.082c0.282,-0.188 0.47,-0.141 0.659,0.142l0.141,0.188c0.141,0.282 0.094,0.47 -0.141,0.705c-0.518,0.424 -1.788,1.317 -3.669,1.317c-3.058,0 -5.41,-2.21 -5.41,-5.409c0.047,-3.199 2.399,-5.457 5.457,-5.457Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="t" d="M57.562,75.267l0,-1.176l0,-2.446c0,-0.33 0.188,-0.518 0.517,-0.518l0.377,0c0.329,0 0.47,0.188 0.47,0.518l0,2.446l2.117,0c0.329,0 0.517,0.188 0.517,0.517l0,0.141c0,0.33 -0.188,0.471 -0.517,0.471l-2.117,0l0,5.174c0,2.399 1.458,2.681 2.258,2.728c0.423,0.047 0.564,0.141 0.564,0.518l0,0.282c0,0.329 -0.141,0.47 -0.564,0.47c-2.258,0 -3.622,-1.364 -3.622,-3.81l0,-5.315l0,0Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="x" d="M53.803,73.919c-0.116,0.019 -0.226,0.096 -0.332,0.222l-1.904,2.269l-1.425,1.698l-2.157,-2.572l-1.17,-1.395c-0.106,-0.126 -0.226,-0.195 -0.35,-0.206c-0.125,-0.011 -0.254,0.037 -0.38,0.142l-0.288,0.242c-0.252,0.212 -0.239,0.446 -0.028,0.698l1.905,2.27l1.579,1.881l-2.312,2.755c-0.002,0.002 -0.003,0.005 -0.005,0.007l-1.167,1.39c-0.211,0.252 -0.188,0.518 0.065,0.729l0.288,0.241c0.252,0.212 0.481,0.158 0.693,-0.094l1.903,-2.269l1.425,-1.698l2.157,2.572c0.002,0.001 0.004,0.003 0.005,0.004l1.167,1.391c0.212,0.253 0.476,0.275 0.728,0.064l0.289,-0.242c0.252,-0.212 0.239,-0.446 0.027,-0.698l-1.904,-2.269l-1.579,-1.882l2.312,-2.755c0.002,-0.002 0.003,-0.005 0.005,-0.007l1.166,-1.39c0.212,-0.252 0.188,-0.517 -0.064,-0.729l-0.288,-0.242c-0.126,-0.106 -0.246,-0.145 -0.361,-0.127l0,0Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="e" d="M39.108,73.761c2.776,0 4.328,1.976 4.328,4.939c0,0.283 -0.235,0.518 -0.517,0.518l-7.48,0c0.047,2.634 1.882,4.139 3.999,4.139c1.317,0 2.258,-0.564 2.728,-0.94c0.282,-0.189 0.517,-0.142 0.658,0.141l0.142,0.235c0.141,0.235 0.094,0.47 -0.142,0.658c-0.564,0.424 -1.787,1.129 -3.433,1.129c-3.058,0 -5.41,-2.211 -5.41,-5.409c0.047,-3.387 2.305,-5.41 5.127,-5.41l0,0Zm2.87,4.422c-0.094,-2.164 -1.411,-3.246 -2.917,-3.246c-1.74,0 -3.245,1.129 -3.575,3.246l6.492,0Z" style="fill:#fff;fill-rule:nonzero;" />
											<path id="N" d="M21.86,84.345l0.376,0c0.329,0 0.517,-0.188 0.517,-0.517l0,-10.101c0,-1.599 1.741,-2.741 3.716,-2.741c1.976,0 3.716,1.142 3.716,2.741l0,10.101c0,0.329 0.189,0.517 0.518,0.517l0.376,0c0.329,0 0.471,-0.188 0.471,-0.517l0,-10.161c0,-2.681 -2.682,-3.998 -5.128,-3.998c-2.352,0 -5.033,1.317 -5.033,3.998l0,10.161c0,0.329 0.141,0.517 0.471,0.517Z" style="fill:#fff;fill-rule:nonzero;" />
										</g>
										<path id="rightCircle" d="M107.03,24.024c6.673,0 11.903,5.225 11.903,11.897c0,6.673 -5.23,11.903 -11.903,11.903c-6.672,0 -11.897,-5.23 -11.897,-11.903c0,-6.672 5.225,-11.897 11.897,-11.897l0,0Z" style="fill:none;stroke:#fff;stroke-width:10px;" />
										<path id="leftCircle" d="M26.856,24.024c6.672,0 11.903,5.225 11.903,11.897c0,6.673 -5.231,11.903 -11.903,11.903c-6.673,0 -11.897,-5.23 -11.897,-11.903c0,-6.672 5.224,-11.897 11.897,-11.897l0,0Z" style="fill:none;stroke:#fff;stroke-width:10px;" />
										<path id="centerCircle" d="M67.037,56.924c-11.676,0 -21.002,-9.322 -21.002,-20.997c0,-11.676 9.326,-21.003 21.002,-21.003c11.675,0 20.998,9.327 20.998,21.003c0,11.675 -9.323,20.997 -20.998,20.997Z" style="fill:none;stroke:#fff;stroke-width:10px;" />
									</g>
								</svg>
								<h4>Seleccione la cantidad de memoria</h4>
								<button type="button" class="btn btn-warning" id="startTour_next">Tutorial</button>
								<i class="ti-info-alt" id="elementnext" ></i>
								<div class="middle_next">
									<label>
										<input type="radio" name="radio_sol_next" v-model="memoria_solicitada_nextcloud" value="500"/>
										<div class="floppy box">
											<span>500MB</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sol_next"  v-model="memoria_solicitada_nextcloud" value="1" />
										<div class="floppy box">
											<span>1GB</span>
										</div>
									</label>
									<label>
										<input type="radio" name="radio_sol_next"  v-model="memoria_solicitada_nextcloud" value="2" />
										<div class="floppy box">
											<span>2GB</span>
										</div>
									</label>
								</div>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated slideInLeft"
									leave-active-class="animated slideOutRight"
								>
									<div class="row" v-show="memoria_solicitada_nextcloud == 2">
										<label for="jutificacion_memoria_nextcloud">Justificacion de memoria:</label>
										<textarea id="jutificacion_memoria_nextcloud" name="jutificacion_memoria_nextcloud" cols="50" rows="3" v-model="jutificacion_memoria_nextcloud"></textarea>
									</div>
								</transition>
								<br>
								<transition
									name="custom-classes-transition"
									enter-active-class="animated slideInLeft"
									leave-active-class="animated slideOutRight"
								>
								</transition>
								<hr>
								<br>
							</div>
						</transition>
						<div v-show="formulario_seleccionado == 130">
							<div class="row">
<!--								<div class="comp">
									<div class="monitor">
										<div class="mid">
											<div class="site">
												<div class="topbar">
													<div class="cerrar">
														<div class="circl"></div>
														<div class="circl"></div>
														<div class="circl"></div>
													</div>
												</div>
												<div class="inhead">
													<div class="mid">
														<div class="item"></div>
													</div>
													<div class="mid txr">
														<div class="item"></div>
														<div class="item"></div>
														<div class="item"></div>
														<div class="item"></div>
													</div>
												</div>
												<div class="inslid">
													
												</div>
												<div class="incont">
													<div class="item"></div>
													<div class="item"></div>
													<div class="item"></div>
													<div class="item"></div>
													<div class="wid">
														<div class="itwid">
															<div>
																<div class="contfoot"></div>
															</div>
														</div>
														<div class="itwid">
															<div>
																<div class="contfoot"></div>
															</div>
														</div>
														<div class="itwid">
															<div>
																<div class="contfoot"></div>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="infoot">
														
													</div>
												</div>
											</div>
										</div>
										<div class="mid codigo">
											<div class="line">
												<div class="item var"></div>
												<div class="item cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line">
												<div class="item min var"></div>
												<div class="item min fun"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line">
												<div class="item var"></div>
												<div class="item atr"></div>
												<div class="item cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item min atr"></div>
												<div class="item lrg fun"></div>
												<div class="item min fun"></div>
												<div class="item lrg cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item lrg atr"></div>
												<div class="item min fun"></div>
												<div class="item min cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item atr"></div>
												<div class="item min fun"></div>
												<div class="item atr"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item min atr"></div>
												<div class="item min cont"></div>
												<div class="item lrg atr"></div>
												<div class="item  fun"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item min atr"></div>
												<div class="item lrg fun"></div>
												<div class="item lrg cont"></div>
												<div class="item min fun"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab2">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab2">
												<div class="item min atr"></div>
												<div class="item min fun"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab3">
												<div class="item min atr"></div>
												<div class="item min fun"></div>
												<div class="item lrg fun"></div>
												<div class="item lrg cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab3">
												<div class="item min atr"></div>
												<div class="item min fun"></div>
												<div class="item lrg atr"></div>
												<div class="item lrg cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab4">
												<div class="item min fun"></div>
												<div class="item lrg atr"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab1">
												<div class="item atr"></div>
												<div class="item var"></div>
												<div class="item cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab3">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line tab4">
												<div class="item min atr"></div>
												<div class="item min fun"></div>
												<div class="item lrg atr"></div>
												<div class="item lrg cont"></div>
												<div class="clearfix"></div>
											</div>
											<div class="line">
												<div class="item min var"></div>
												<div class="clearfix"></div>
											</div>
											
										</div>
									</div>
									<div class="base">
										
									</div>
								</div>-->

<!--

	<div class="obj">
	  <div class="ventsmain">
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
		<div class="topventrow">
		  <div class="topvent"></div>
		  <div class="topvent"></div>
		</div>
	  </div>


	  <div class="plane1">
		<div class="topedge"></div>
		<div class="module1">

		  <div class="lightsmain">
			<div class="lights">
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			</div>
			<div class="lights">
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			  <div class="mod1light">
			  </div>
			</div>
		  </div>

		  <div class="minimodmain">
			<div class="minimod"></div>
			<div class="minimod"></div>
			<div class="minimod"></div>
			<div class="minimod"></div>
		  </div>
		  <div class="minimodmain">
			<div class="minimod"></div>
			<div class="minimod"></div>
			<div class="minimod"></div>
			<div class="minimod"></div>
		  </div>

		</div>
		<div class="module2">

		  <div class="linesmain">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		  </div>
		  <div class="powermain">
			<div class="power">
			</div>
			<div class="powerlight">
			</div>
		  </div>

		</div>
		<div class="module3">

		  <div class="tape">

		  </div>

		  <div class="allines">
			<div class="line2main">
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			</div>
			<div class="line2main">
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			</div>
		  </div>

		  <div class="bordmain">
			<div class="bord"></div>
			<div class="bord2"></div>
		  </div>

		</div>
		<div class="module3">

		  <div class="tape"></div>

		  <div class="allines">
			<div class="line2main">
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			</div>
			<div class="line2main">
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			  <div class="lines2"></div>
			</div>
		  </div>

		  <div class="bordmain">
			<div class="bord"></div>
			<div class="bord2"></div>
		  </div>

		</div>
		<div class="module4">
		  <div class="door">

		  </div>
		  <div class="glow">

		  </div>
		</div>
		<div class="module5">
		</div>
	  </div>


	  <div class="plane2">
		<div class="plane2top">

		</div>
		<div class="ventlmain">
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		  <div class="ventil"></div>
		</div>

	  </div>

	</div>


-->
















<main>
	<section>
		<!-- Vertical Line -->
		<aside></aside>
		<aside></aside>

		<!-- 1 -->
		<article>
			<span></span>
			<span></span>
			<span></span>

			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>

				<li>0A</li>
			</ul>
		</article>
		<!-- 2 -->
		<article>
			<span></span>
			<span></span>
			<span></span>

			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>

				<li>0B</li>
			</ul>
		</article>
		<!-- 3 -->
		<article>
			<span></span>
			<span></span>
			<span></span>

			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>

				<li>0C</li>
			</ul>
		</article>
		<!-- 4 -->
		<article>
			<span></span>
			<span></span>
			<span></span>

			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>

				<li>0D</li>
			</ul>
		</article>
	</section>
</main>

								<div class="col-md-5">
								<!--<h4  v-bind:style="{ color: seleccion_so_130_validacion }">Seleccione el sistema operativo: @{{paso_130_2}}</h4>-->
								</div>
								<div class="col-md-6">
									<transition
										name="custom-classes-transition"
										enter-active-class="animated fadeInDown"
										leave-active-class="animated fadeOutDown"
									>
										<div v-show="seleccion_so_130_validacion == 'red'">
											<div class="alert alert-danger" role="alert">
												@{{error_seleccion_so_130_validacion}}
												<span>sadasd</span>
											</div>
										</div>
									</transition>
								</div>
							</div>
							<div class="middle_so">
								<label>
									<input type="radio" name="radio_so" v-model="so_seleccionado" value="w2008" checked v-change="cambiar_so()" />
									<div class="windows box">
										<span>Windows 2008 R2</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so"  v-model="so_seleccionado" value="w2012" v-change="cambiar_so()" />
									<div class="windows box">
										<span>Windows 2012 R2</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so" v-model="so_seleccionado" value="debian" v-change="cambiar_so()"/>
									<div class="linux box">
										<span>Debian</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so" v-model="so_seleccionado" value="ubuntu" v-change="cambiar_so()"/>
									<div class="linux box">
										<span>Ubuntu</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so" v-model="so_seleccionado" value="suse" v-change="cambiar_so()"/>
									<div class="linux box">
										<span>SUSE</span>
									</div>
								</label>
								<label>
									<input type="radio" name="radio_so"  v-model="so_seleccionado" value="otro" v-change="cambiar_so()" />
									<div class="manzanita box">
										<span>Otro</span>
									</div>
								</label>
							</div>
							
							<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInLeft"
								leave-active-class="animated slideOutRight"
							>
								<div v-show="so_seleccionado == 'otro'">
									<label for="sistema_operativo_otro">Especifique el sistema operativo solicitado:</label>
									<input type="text" name="sistema_operativo_otro" id="sistema_operativo_otro" v-model="otro_sistema_operativo_aclaracion">
								</div>
							</transition>
							<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInLeft"
								leave-active-class="animated slideOutRight"
							>
								<div class="col-md-12" v-show="mostrar_licencia_so">
									<label for="sistema_operativo_otro">Propietario de licencia:</label>
									<input class="form-control" type="text"  name="licencia" v-model="licencia_solicitada" placeholder="Entidad solicitante" style="width:25%" @change="cambiar_so()">
								</div>
								<br>
								
							</transition>
							<br>

							<div class="col-md-12">
										<label for="nombre_servidor">Hostname:</label>
										<input class="form-control" type="text" placeholder="Ingrese el hostanme"  name="nombre_servidor" v-model="nombre_servidor_solicitada" @change="cambiar_so()" style="width:25%">
								</div>
							<!--
							Comienza Hardware
							<transition
								name="custom-classes-transition"
								enter-active-class="animated slideInRight"
								leave-active-class="animated slideOutLeft"
							>
								<div v-show="paso_130_2" style="display: none"> 
									<hr style="border-top: 1px dashed #8c8b8b;">
									<div class="row">
										<div class="col-md-4">
											<h3>Hardware</h3>
										</div>
										<div class="col-md-6">
											<transition
												name="custom-classes-transition"
												enter-active-class="animated fadeInDown"
												leave-active-class="animated fadeOutDown"
											>
												<div v-show="hardware_mostrar_alerta_130_validacion">
													<div class="alert alert-danger" role="alert">
														@{{error_hardware_130_validacion}}
													</div>
												</div>
											</transition>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label>Memoria Ram: <strong>
												<input style="width:27%" type="number" min="2" max="32" name="memoria_ram_input" v-model="ram_solicitada" @change="cambio_hardware_130()" />
												<animated-number :number="ram_solicitada"></animated-number>
												 </strong>  @{{displayNumber}} GB</label>
											<div class="row">
												<div class="col-md-1">
													<span>2 GB</span>
												</div>
												<div class="col-md-4">
													<input type="range" min="2" max="32" value="2" id="fader" v-model="ram_solicitada" @change="cambio_hardware_130()">
												</div>
												<div class="col-md-1">
													<span>32 GB</span>
												</div>
											</div>
											<div class="row" v-show="mostrar_aclaracion_ram()">
												<label>Aclaracion de Memoria Ram</label>
												<textarea  name="aclaracion_ram" id="aclaracion_ram" v-model="aclaracion_ram" cols="50" rows="2" v-on:input="cambio_hardware_130()"></textarea>
											</div>
										</div>
										<br>
										<br>
										<hr>
										<br>
										<br>
										<div class="col-md-12"></div>
										<div class="col-md-12">
											<label>Disco Duro: <strong><input style="width:27%" type="number" min="15" max="1024" name="disco_duro_input" v-model="disco_solicitada" @change="cambio_hardware_130()" /> </strong>  GB</label>
											<div class="row">
												<div class="col-md-1">
													<span>15 GB</span>
												</div>
												<div class="col-md-4">
													<input type="range" class="disco" min="15" max="1024" value="2" id="hhd" v-model="disco_solicitada" @change="cambio_hardware_130()">
												</div>
												<div class="col-md-1">
													<span>1024 GB</span>
												</div>
											</div>
											<div class="row" v-show="mostrar_aclaracion_disco()">
												<label>Aclaracion de Disco Duro</label>
												<textarea  name="aclaracion_disco" id="aclaracion_disco" v-model="aclaracion_disco" cols="50" rows="2" v-on:input="cambio_hardware_130()"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<br>
											</div>
											<div class="col-md-6">
												<br>
											</div>
										</div>
										<br>
										
										<div class="col-md-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text">Hostname:</span>
												</div>
												<input class="form-control" type="text"   name="nombre_servidor" v-model="nombre_servidor_solicitada" @change="cambio_hardware_130()">
											</div>
										</div>
									</div>
								</div>
							</transition>-->

							valores de Hardware: Ram @{{ram_solicitada}}  | Disco: @{{disco_solicitada}} <span>| Si necesita mas prestaciones, debera justificar personalmente al momento de presentar el formulario</span>


							
							<br>
							@{{paso_130_3}}
							<transition
								name="custom-classes-transition"
								enter-active-class="animated fadeInDown"
								leave-active-class="animated fadeOutDown"
							>
								<div v-show="paso_130_3"> 
									<hr style="border-top: 1px dashed #8c8b8b;">
									<h3>Finalidad de uso</h3>
									<div class="middle_finalidad">
										<label>
											<input type="radio" name="radio_finalidad"  v-model="finalidad_seleccionado" value="desarrollo" @change="cambiar_finalidad()"/>
											<div class="front-end box">
												<span>Desarrollo</span>
											</div>
										</label>
										<label>
											<input type="radio" name="radio_finalidad"  v-model="finalidad_seleccionado" value="testing" @change="cambiar_finalidad"/>
											<div class="testing box">
												<span>Testing</span>
											</div>
										</label>
										<label>
											<input type="radio" name="radio_finalidad" v-model="finalidad_seleccionado" value="pre_prod" @change="cambiar_finalidad()"/>
											<div class="pre-prod box">
												<span>Pre Produccion</span>
											</div>
										</label>
										<label>
											<input type="radio" name="radio_finalidad" v-model="finalidad_seleccionado" value="prod" @change="cambiar_finalidad()"/>
											<div class="prod box">
												<span>Produccion</span>
											</div>
										</label>
										<br>
										<div class="row">
											<label for="observaciones_servidor">Aclaraciones:</label>
											<textarea id= "observaciones_servidor" name="observaciones_servidor"  cols="40" rows="3" v-model="observaciones_solicitada" v-on:input="restar_caracteres(3)"></textarea> <span>Rest @{{caracteres_restantes_aclaracion_finalidad}}</span>
											
										</div>
									</div>
								</div>
							</transition>
							<br>
							<br>
							<transition
								name="custom-classes-transition"
								enter-active-class="animated fadeInDown"
								leave-active-class="animated fadeOutDown"
							>
								<div v-show="paso_130_4">
									<hr style="border-top: 1px dashed #8c8b8b;">
										<ul class="list" style="list-style: none;">
											<li class="list__item">
												<!--<label class="label--checkbox">
													<input type="checkbox" class="checkbox" v-model="tiene_aplicaciones" checked>
													<p v-show="!tiene_aplicaciones"><font color="red"> Sin Aplicaciones </font></p>
													<p v-show="tiene_aplicaciones"><font color="green"> Con Aplicaciones </font></p>
												</label>-->
												<div class="row">
													<h4>Aplicaciones del Servidor</h4>
													<div class="col-md-12">
														<div class="col-md-1">
															<h4 v-show="!tiene_aplicaciones"> <font color="red"> Sin Aplicaciones </font></h4>
														</div>
														<div class="col-md-1">
															<label class="switch">
																<input type="checkbox" v-model="tiene_aplicaciones">
																<span class="slider round"></span>
															</label>
														</div>
														<transition
															name="custom-classes-transition"
															enter-active-class="animated rollIn"
															leave-active-class="animated rollOut"
														  >
															<div v-show="tiene_aplicaciones">
																<div class="col-md-1">
																	<h4 ><font color="green"> Con Aplicaciones </font></h4>
																</div>
																<div class="col-md-3" >
																	<input type="text" name="nombre_aplicaciones" placeholder="Nombre Aplicacion" v-model="nombre_aplicaciones">
																</div>
																<div class="col-md-4" >
																	<textarea name="descripcion_aplicaciones" cols="35" rows="4"  placeholder="Descripcion Aplicacion" v-model="descripcion_aplicaciones">Detalle de la aplicacion</textarea>
																</div>
																
															</div>
														</transition>
													</div>
												</div>
											</li>
											<hr style="border-top: 1px dashed #B6B6B4;">
											<li class="list__item">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-1">
															<h4 v-show="!tiene_server_web"> <font color="red"> Sin Server Web </font></h4>
														</div>
														<div class="col-md-1">
															<label class="switch">
																<input type="checkbox" v-model="tiene_server_web">
																<span class="slider round"></span>
															</label>
														</div>
														<transition
															name="custom-classes-transition"
															enter-active-class="animated rollIn"
															leave-active-class="animated rollOut"
														  >
															<div v-show="tiene_server_web">
																<div class="col-md-1">
																	<h4 ><font color="green"> Con Server Web </font></h4>
																</div>
																<div class="col-md-3" >
																	<input type="text" name="nombre_server_web" placeholder="Nombre Servidor Web" v-model="nombre_server_web" >
																</div>
																<div class="col-md-4" >
																	<textarea cols="35" rows="4" name="descripcion_server_web" placeholder="Descripcion Servidor Web" v-model="descripcion_server_web"  ></textarea>
																</div>
															</div>
														</transition>
													</div>
												</div>
											</li>
											<hr style="border-top: 1px dashed #B6B6B4;">
											<li class="list__item">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-1">
															<h4 v-show="!tiene_base_de_datos"> <font color="red"> Sin Base de Datos </font></h4>
														</div>
														<div class="col-md-1">
															<label class="switch">
																<input type="checkbox" v-model="tiene_base_de_datos">
																<span class="slider round"></span>
															</label>
														</div>
														<transition
															name="custom-classes-transition"
															enter-active-class="animated rollIn"
															leave-active-class="animated rollOut"
														  >
															<div v-show="tiene_base_de_datos">
																
																<div class="col-md-1">
																	<h4 ><font color="green"> Con Base de Datos </font></h4>
																</div>
																<div class="col-md-3">
																	<input type="text" name="nombre_base_de_datos" placeholder="Nombre Base de Datos" v-model="nombre_base_de_datos">
																</div>
																<div class="col-md-4">
																	<textarea cols="35" rows="4" name="descripcion_base_de_datos" placeholder="Descripcion Base de Datos" v-model="descripcion_base_de_datos"></textarea>
																</div>
															</div>
														</transition>
													</div>
												</div>
											</li>
											<hr style="border-top: 1px dashed #B6B6B4;">
											<li class="list__item">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-1">
															<h4 v-show="!tiene_servidor_archivos"> <font color="red"> Sin Servidor de Archivos </font></h4>
														</div>
														<div class="col-md-1">
															<label class="switch">
																<input type="checkbox" v-model="tiene_servidor_archivos">
																<span class="slider round"></span>
															</label>
														</div>
														<transition
															name="custom-classes-transition"
															enter-active-class="animated rollIn"
															leave-active-class="animated rollOut"
														  >
															<div v-show="tiene_servidor_archivos">
																<div class="col-md-1">
																	<h4 ><font color="green"> Con Servidor de Archivos </font></h4>
																</div>
																<div class="col-md-3" >
																	<input type="text" name="nombre_server_archivos" placeholder="Nombre Servidor de Archivos" v-model="nombre_servidor_archivos">
																</div>
																<div class="col-md-4">
																	<textarea cols="35" rows="4" name="descripcion_server_archivos" placeholder="Descripcion de Archivos" v-model="descripcion_servidor_archivos"></textarea>
																</div>
															</div>
														</transition>
													</div>
												</div>
											</li>
											<hr style="border-top: 1px dashed #B6B6B4;">
											<li class="list__item">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-1">
															<h4 v-show="!tiene_aplicaciones_otro"> <font color="red"> Sin Otra Aplicacion </font></h4>
														</div>
														<div class="col-md-1">
															<label class="switch_aplicaciones_otro">
																<input type="checkbox" v-model="tiene_aplicaciones_otro">
																<span class="slider_otro round"></span>
															</label>
														</div>
														<transition
															name="custom-classes-transition"
															enter-active-class="animated rollIn"
															leave-active-class="animated rollOut"
														  >
															<div v-show="tiene_aplicaciones_otro">
																<div class="col-md-1">
																	<h4 ><font color="green"> Con Otra Aplicacion </font></h4>
																</div>
																<div class="col-md-3" >
																	<input type="text" name="nombre_otro" placeholder="Nombre Otra Aplicacion" v-model="nombre_aplicaciones_otro">
																</div>
																<div class="col-md-4">
																	<textarea cols="35" rows="4" name="descripcion_otro" placeholder="Descripcion Otra Aplicacion" v-model="descripcion_aplicaciones_otro"></textarea>
																</div>
															</div>
														</transition>
													</div>
												</div>
											</li>
										</ul>
										<br>

										<hr>
										<h3>Lista de puertos solicitados</h3>
										<button class="btn btn-success" @click="agregar_puerto()"><i class="ti-plus"></i> Agregar Puerto</button>
										<ul class="list" style="list-style: none;">
											<li v-for="(puerto, index) in puertos">
												<p>
													<span>@{{index+1}}</span>
													<span>Puerto:  </span> <input type="number" name="puerto_puertos" v-model="puerto.puerto"> 
													<span>Servicio: </span> <input type="text" name="servicio_puertos" v-model="puerto.servicio">
													<span>Observacion: </span> <input type="text" name="observacion_puertos" v-model="puerto.observacion">
													<span></span> <button type="button" class="btn btn-danger" @click="eliminar_puerta(index)"><i class="ti-trash"></i> Eliminar</button>
												</p>
											</li>
										</ul>
										<hr>

										<!-- Rounded switch -->
										<h3> Duracion del servidor</h3>
										<transition
															name="custom-classes-transition"
															enter-active-class="animated jackInTheBox"
															leave-active-class="animated rollOut"
														  >
											<h4 v-show="!servidor_temporal"> <font color="indigo"> Servidor Permanete</font></h4>
										</transition>
										<label class="switch">
											<input type="checkbox" v-model="servidor_temporal">
											<span class="slider round"></span>
										</label>
										<transition
											name="custom-classes-transition"
											enter-active-class="animated jackInTheBox"
											leave-active-class="animated rollOut"
										>
										<div v-show="servidor_temporal">
											<h4 ><font color="orange"> Servidor Temporal </font></h4>
											<div >
												<label for="fecha_de_baja">Fecha de Baja</label>
												<input type="datetime-local" id="fecha_de_baja" name="fecha_de_baja" v-model="servidor_temporal_fecha_fin">
											</div>
											
										</div>
										</transition>
										
										<hr>
										<br>
								</div>
							</transition>
						</div>

					</tab-content>
					<tab-content title="Donde Presentar"
								 icon="ti-location-pin">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5">
									</div>
									<div class="col-md-6">
										<h3>Pasos a seguir</h3>
									</div>
								</div>
							</div>
							<br>
								<p><h4>1 <i class="ti-alert"></i> Revisar los datos ingresados: 
									<button type="button" class="btn btn-warning" @mouseover="active = true" @mouseleave="active = false" >
										<i class="ti-eye"></i> 
									</button>
									<transition
										name="custom-classes-transition"
										enter-active-class="animated flipInX"
										leave-active-class="animated flipOutX"
									>
									<div v-show="active">
										<div class="panel-body">
											<!--<pre v-if="model" v-html="prettyJSON(model)"></pre>-->
											<span><font color="orange">Tramite:</font> Formulario @{{formulario_seleccionado}}</span>
											<br>
											<p>Datos personales</p>
											<span> <font color="green">Apellido:</font>  @{{model.lastName}}  <font color="green">Nombre:</font> @{{model.firstName}} <font color="green">Email:</font> @{{model.email}}</span>
											<span><font color="green">Cuit:</font> @{{model.cuit}}  <font color="green">Telefono:</font> @{{model.telefono_contacto}} <font color="green">Direccion:</font> @{{model.streetName}}</span>
											<span><font color="green">Departamento:</font> @{{model.departamento}}</span>
											<br>
											<p>Datos Laborales</p>
											<span> <font color="red">Cargo:</font>  @{{model.cargo}} , <font color="red">Relacion Laboral:</font> @{{model.relacion}}, <font color="red">Ministerio:</font> @{{model.library.name}}</span>
											<span><font color="red">Secretaria:</font> @{{model.secretaria.name}} , <font color="red">Otra Direccion:</font> @{{model.unidad_organica}}
											<br>
											<p>Datos del Tramite</p>
												<span v-if="formulario_seleccionado == 'nextcloud'"> <font color="indigo">Capacidad de Almacenamiento:</font>  @{{memoria_solicitada_nextcloud}} , <font color="indigo">Justificacion:</font> @{{jutificacion_memoria_nextcloud}}</span>
												<span v-if="formulario_seleccionado == 'correo'"> <font color="indigo">Cuanta sugerida:</font>  @{{sugerencia_mail}} </span>
												<span v-if="formulario_seleccionado == '130'"> 
													<font color="indigo">SO:</font>  @{{so_seleccionado}} ,
													<font color="indigo">Ram:</font>  @{{ram_solicitada}} ,
													<font color="indigo">Disco:</font>  @{{disco_solicitada}} ,
													<font color="indigo">Hostname:</font>  @{{nombre_servidor_solicitada}} ,
													<font color="indigo">Licencia:</font>  @{{licencia_solicitada}} ,
												</span>
											
										</div>
									</div>
									</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p><h4>2 <i class="ti-download"></i> Descargar el formulario, haciendo click aca:</h4>
									<button class="btn btn-primary" v-on:click="prueba_axios_post" ><i class="ti-download"></i> Descargar</button>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4>3 <i class="ti-printer"></i> Abrir el archivo recien descargado (formulario_ciberseguridad_ @{{id_recien_creado}} ) e imprimirlo en hoja tamaño a4</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4 v-if="this.formulario_seleccionado == 'nextcloud'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante y un encargado informatico de su reparticion, donde se especifica
									</h4>
									<h4 v-if="this.formulario_seleccionado == '130'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante y un encargado informatico de su reparticion
									</h4>
									<h4 v-if="this.formulario_seleccionado == '103'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante y el director inmediato
									</h4>
									<h4 v-if="this.formulario_seleccionado == '101'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante y el director inmediato
									</h4>
									<h4 v-if="this.formulario_seleccionado == '203'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante
									</h4>
									<h4 v-if="this.formulario_seleccionado == 'correo'">
									4 <i class="ti-marker-alt"></i>  Firmar por la persona solicitante
									</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4 v-if="this.formulario_seleccionado == 'correo'">
									5 <i class="ti-map"></i>  Presentar el formulario en la oficina de Mesa de entrada de la Gesion Publica, (3º piso, nucleo 7, Centro Civico - Telefono: 430-1111)
									</h4>
									<h4 v-else>
									5 <i class="ti-map"></i>  Presentar el formulario en la oficina "Redes y Lineas" (1º piso, nucleo 5, Centro Civico - Telefono: 430-7471)
									</h4>
								</p>
								<hr style="border-top: 1px dashed #B6B6B4;">
								<br>
								<p>
									<h4 v-if="this.formulario_seleccionado == 'correo'">
									6 <i class="ti-headphone-alt"></i>  Esperar a ser contactado por la direccion, o bien llamar: 430-6565 o 430-7471
									</h4>
									<h4 v-if="this.formulario_seleccionado == 'nextcloud'">
									6 <i class="ti-headphone-alt"></i>  Esperar a ser contactado por la direccion, o bien llamar: 430-7471
									</h4>
								</p>
								<hr>
								

						</div>
						
					</tab-content>
					<!--<tab-content title="Descargar"  icon="ti-printer" :before-change="validateFourthTab">
						<div class="container">
							<vue-form-generator :model="model"
											   :schema="fourthTabSchema"
											   :options="formOptions"
											   ref="fourthTabForm">
							</vue-form-generator>
						</div>
					</tab-content>-->
				</form-wizard>
			</div>
		</div>
		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script type="text/javascript" src="wizard/bootstrap.min.js"></script>

		<script type="text/javascript" src="wizard/vue.min.js"></script>
		<script type="text/javascript" src="wizard/vue-form-wizard.js"></script>
		<script type="text/javascript" src="wizard/vfg.js"></script>
		<script type="text/javascript" src="wizard/vue-multiselect.min.js"></script>
		<script type="text/javascript" src="wizard/bootstrap-tour-standalone.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// Instance the tour
				var tour = new Tour({
						steps: [{
							element: "#element",
							title: "Tipos de Formularios",
							content: "<p><strong>F101:</strong> Alta, Baja o Modificacion de cualquier sistema</p><p><strong>F103:</strong> Cambiar Contraseña o Desbloquear Usuario de cualquier sistema</p><p><strong>F203:</strong> Alta, Baja o Modifcacion de usuarios de Servicio de Directorio</p><p><strong>F130:</strong> Solicitar Servidor Vistual</p>"
						}]
					}).init().start(false);

					var tour_tipo_form = new Tour({
						steps: [{
							element: "#element1",
							title: "Sistemas Integrados",
							content: "<p><strong>SIIF:</strong> Sistema Financiero</p><p><strong>SIGED:</strong> Sistema de Expedientes</p><p><strong>SIGOP:</strong> Sistema Integrado de Obras Publicas</p><p><strong>SIARH:</strong> Sistema Integrado de Recursos Humanos</p><p><strong>SIPE:</strong> Sistema Integrado de Personas</p>"
						}]
					}).init().start(false);

				$("#startTour").click(function(){
					tour.restart();
				});
				$("#startTourtipo_form").click(function(){
					tour_tipo_form.restart();
				});



				


				var tour_next = new Tour({
						steps: [{

							element: "#elementnext",
							title: "Cantidad de Memoria",
							content: "<p><strong>Se deben seleccionar la cantidad de memoria que tendra disponible esta cuenta de nextcloud</strong></p>"
							
						}]
					}).init().start(false);


				$("#startTour_next").click(function(){
					tour_next.restart();
				});

				

				var tour_dos = new Tour({
						steps: [{
							element: "#element_tres",
							title: "Datos Personales",
							content: "<p><strong>Se deben ingresar los datos personales de la persona que realizarà el tramite</strong></p><p>Si desea una cantidad mayor, por favor comuniquese via telefonica</p>"
						}]
					}).init().start(false);

				$("#startTour_dos").click(function(){
					tour_dos.restart();
				})


				var tour_tres = new Tour({
						steps: [{
							element: "#element_cuatro",
							title: "Datos Laborales",
							content: "<p><strong>Relacion:</strong>tipo de relacion laboral con el ministerio al que pertenece</p>"
						}]
					}).init().start(false);

				$("#startTour_tres").click(function(){
					tour_tres.restart();
				})

				var tour_cuatro = new Tour({
						steps: [{
							element: "#element_",
							title: "Datos Laborales",
							content: "<p><strong>Relacion:</strong>tipo de relacion laboral con el ministerio al que pertenece</p>"
						}]
					}).init().start(false);

				$("#startTour_cuatro").click(function(){
					tour_cuatro.restart();
				})

			});
		</script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

		<!--<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
		<script type="text/javascript" src="wizard/data.js?renderer=html"></script>
		<script type="text/javascript" src="wizard/html2canvas.min.js"></script>-->
		
		<script type="text/javascript">
			
			//import ToggleSwitch from 'vuejs-toggle-switch'


			Vue.use(VueFormWizard)
			Vue.use(VueFormGenerator)
			Vue.use(axios)


			

			Vue.component("multiselect", VueMultiselect.default);


			var app = new Vue({
			 el: '#app',
				data:{
					seleccion_so_130_validacion: '',
					error_seleccion_so_130_validacion:'',
					hardware_mostrar_alerta_130_validacion: false,
					error_hardware_130_validacion:'',
					caracteres_restantes_aclaracion_finalidad:150,

			myOptions: {
				layout: {
					color: 'white',
					backgroundColor: 'lightgray',
					selectedColor: 'white',
					selectedBackgroundColor: 'green',
					borderColor: 'black',
					fontFamily: 'Arial',
					fontWeight: 'normal',
					fontWeightSelected: 'bold',
					squareCorners: false,
					noBorder: false
				},
				size: {
					fontSize: 14,
					height: 34,
					padding: 7,
					width: 100
				},
				items: {
					delay: .4,
					preSelected: 'unknown',
					disabled: false,
					labels: [
						{name: 'Off', color: 'white', backgroundColor: 'red'}, 
						{name: 'On', color: 'white', backgroundColor: 'green'}
					]
				}
			},

			

			value: '',
			options: [
				{ name: 'Habilitado Sueldos', language: '1' },
				{ name: 'Habilitado Fondo Permanentes', language: '2' },
				{ name: 'Habilitado Viaticos', language: '3' },
				{ name: 'Tesoreria Juridiccional', language: '4' },
				{ name: 'Administracion de Bienes', language: '5' },
				{ name: 'Contabilidad', language: '6' },
				{ name: 'Ejecucion Presupuestaria', language: '7' },
				{ name: 'Formulacion Presupuestaria', language: '8' },
				{ name: 'Organizacion y control', language: '9' },
				{ name: 'Operador de carga de registro', language: '10' },
				{ name: 'Tesoreria completo', language: '11' },
				{ name: 'Ejecucion de Gastos', language: '12' },
				{ name: 'Liquidacion de haber', language: '13' },
				{ name: 'Interfaz sueldos', language: '14' },
				{ name: 'Modificacion presupuestaria', language: '15' },
				{ name: 'Modulo de contabilida, libros y balances', language: '16' },
				{ name: 'Contador Juridiccional', language: '17' }
			],
			multiple: true,
			show: false,
			
			

			active: false,
			formulario_seleccionado: '',

			//FORMULARIO 130
			so_seleccionado: '',
			otro_sistema_operativo_aclaracion:'',
			ram_solicitada : '2',
			aclaracion_ram: '',
			disco_solicitada : '15',
			aclaracion_disco: '',
			licencia_solicitada : '',
			nombre_servidor_solicitada : '',
			finalidad_seleccionado : '',
			observaciones_solicitada : '',
			tiene_aplicaciones: false,
			nombre_aplicaciones: '',
			descripcion_aplicaciones: '',
			tiene_server_web: false,
			nombre_server_web: '',
			descripcion_server_web: '',
			tiene_base_de_datos: false,
			nombre_base_de_datos: '',
			descripcion_base_de_datos: '',
			tiene_servidor_archivos: false,
			nombre_servidor_archivos: '',
			descripcion_servidor_archivos: '',
			tiene_aplicaciones_otro: false,
			nombre_aplicaciones_otro: '',
			descripcion_aplicaciones_otro: '',
			puertos:  [
						{puerto: '80', servicio: "http" , observacion:''},
						{puerto: '443', servicio: "https" , observacion:''}
					],
			servidor_temporal: false,
			servidor_temporal_fecha_fin: '',


			paso_130_2: false,
			paso_130_3: false,
			paso_130_4: false,
			paso_130_5: false,
			mostrar_licencia_so: false,
			//FIN FORMULARIO 130


			//inicio Formulario 203
			detalles_f_203:'',
			pedido_formulario_203: '',
			nombre_de_usuario_203:'',
			//FIN Formulario 203

			//FORMULARIO nextcloud
			memoria_solicitada_nextcloud:'',
			jutificacion_memoria_nextcloud: '',
			//Fin FOrmulario Nextcloud






			//FORMULARIO 103
			usuario_sistema: '',
			//FIN formulario 103

			//Laboral
			cargo: 'Jefe Informatica',
			//Fin laboral
			


			//Formulario emial
			uso_de_correo: '',
			sugerencia_mail: '',
			
			//Fin Formulario emial


			show: true,
			interval:false,
			displayNumber: 2,

			 //Formulario de sistemas
			pedido_formulario: '', // siif, siged,etc..
			 //Fin Formularios de sistemas


			 //Ministerios y secretarias
			 //Fin Ministerios y secretarias
			id_recien_creado: 0,


			listado_ministerios: [
						{key: 'html5', value: "HTML5"},
						{key: 'js', value: "Javascript"},
						{key: 'css', value: "CSS3"},
						{key: 'cf', value: "CoffeeScript"},
						{key: 'ng', value: "AngularJS"},
						{key: 'react', value: "ReactJS"},
						{key: 'vue', value: "VueJS"}
					],
					//PASOS
					//pasos 

					model:{
						//tipo de formulario
						tipo_formulario :  false,
						sistema :  '',
						//Datos personales
						firstName:'{{$nombre}}',
						lastName:'{{$apellido}}',
						email:'{{$email}}',
						cuit:'{{$cuit}}',
						phone:'',
						telefono_contacto:'{{$telefono}}',
						streetName:'{{$domicilio}}',
						departamento: '',
						//FIN datos personales

						//DATOS LABORALES
						library:'',
						status: true,
						streetNumber:'',
						ministerio: '',
						secretaria:'',
						unidad_organica:'',
						cargo_funcion:'jefe Informatica',
						relacion:''
						//FIN DE DATOS LABORALES
					},
					formOptions: {
						validationErrorClass: "has-error",
						validationSuccessClass: "has-success",
						validateAfterChanged: true
					},
					zeroTabSchema:{
						fields:[
							/*{
								type: "radios",
								model: "tipo_formulario",
								require: false,
								values: [
									"Crear Usuario Nuevo, Modificar Usuario ya creado, Eliminar Usuario ya creado (F101)",
									"Cambiar Clave a usuario ya creado, Desbloquear Usuario ya creado (F103)"
								],
								styleClasses:'col-md-8 display-inline'
							},
							{
								type: "select",
								label: "Sistema (solamente se debe seleccionar uno)",
								model: "sistema",
								required: false,
								validator:VueFormGenerator.validators.string,
								values:['SIIF (Sistema Integrado Financiero)','SIGED (Sistema integrado de expediente)','SIGOP (Sistema integrado de Obras publicas)','SIARH (Sistema integrado de Recursos Humanos)', 'SIPE', 'Otro'],
								styleClasses:'col-xs-5'
							}*/
						]
					},
					firstTabSchema:{
						fields:[
						{
							type: "input",
									inputType: "text",
							label: "Nombre (*)",
							model: "firstName",
							required:true,
							validator:VueFormGenerator.validators.string,
							styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "Apellido (*)",
							model: "lastName",
							required:true,
							validator:VueFormGenerator.validators.string,
							styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "CUIL (*)",
							model: "cuit",
							required:true,
							validator:VueFormGenerator.validators.string,
							styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "Telefono de Contacto (*)",
							model: "telefono_contacto",
							required:true,
							validator:VueFormGenerator.validators.string,
							styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "Email",
							model: "email",
							required:false,
							validator:VueFormGenerator.validators.email,
							styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "Domicilio (*)",
							model: "streetName",
							required:true,
							styleClasses:'col-xs-6'
						},
						/*{
							type: "select",
							label: "Departamento",
							model: "departamento",
							validator:VueFormGenerator.validators.string,
							values:['Capital','Rawson','Rivadavia', 'Pocito', 'otro'],
							styleClasses:'col-xs-4'
						},*/
						{
								type: "vueMultiSelect",    
								model: "departamento",
								label: "Departamento donde vive",
								placeholder: "Seleccione el departamento donde vive",
								required: true,  
								selectOptions: {
									multiple: false,
									searchable: true,
									/*customLabel: function({ name_1, name }) {
									  return `${name_1} — [${name}]`
									}*/
								},
								values: ["Albardon","Angaco","Calingasta","Capital", "Caucete", "Chimbas", "Igelsias", "Jachal", "9 de Julio", "Pocito", "Rawson", "Rivadavia", "San Marin", "Santa Lucia", "Sarmiento", "Ullum", "Valle Fertil", "25 de Mayo", "Zonda"],
								
								styleClasses:'col-xs-4'
						}
						
					]
					},
					fourthTabSchema:{
						fields:[
							
						]
					},
					secondTabSchema:{
						fields:[
							{
								type: "input",
								inputType: "text",
								label: "Cargo (*)",
								model: "cargo",
								required: true,
								validator:VueFormGenerator.validators.string,
								styleClasses:'col-xs-6'
							},
							{
								type: "vueMultiSelect",    
								model: "relacion",
								label: "Relacion Laboral (*)",
								placeholder: "Dependencia Laboral",
								required: true,  
								selectOptions: {
									multiple: false,
									searchable: true,
									/*customLabel: function({ name_1, name }) {
									  return `${name_1} — [${name}]`
									}*/
								},
								values: ["Agente de Planta","Contratado",  "Pasante"],
								styleClasses:'col-xs-6'
						},
						/*
							{
								type: "select",
								label: "Ministerio",
								model: "ministerio",
								required: true,
								multiSelect: false,
								selectOptions: {
									multiple: false,
									trackBy: 'value',
									label: 'name',
									selectLabel: '',
									searchable: true,
									taggable: true,
									closeOnSelect: false,
									hideSelected: true,
									//tagPlaceholder: 'Add this as a new room',
									onNewTag(newTag, id, options, value) {
										console.log("onNewTag", newTag, id, options, value);
										const tag = {
											name: newTag,
											icon: 'none',
											custom: true,
											value: newTag
										}
										value.push(tag);
										options.push(tag);
										}
								},
								values: // this.listado_ministerios,
									[
										{ id: "1", name: "Infraesctrucutra" },
										{ id: "2", name: "Deporte" },
										{ id: "3", name: "Salud" },
										{ id: "4", name: "Medio" },
										{ id: "5", name: "Otro" }
									],
								//},
								default: "2",
								onChanged: function(model, newVal, field) {
									console.log("El modelo es:"+model[0]);
									alert("hola desde, newval:"+newVal+" - filed:"+field+"  _ model:"+model);
								},
								styleClasses:'col-xs-3'
							},
							*/
							{
								type: "vueMultiSelect",    
								model: "library",
								label: "Ministerio (*)",
								placeholder: "Seleccione su Ministerio",
								required: true,  
								selectOptions: {
									multiple: false,
									key: "id",
									label: "name",
									searchable: true,
									customLabel: function({ id, name }) {
									  return `${id} — [${name}]`
									}
								},
								values: [],
								onChanged: function(model, newVal, field) {
									var fiel=app.$root.secondTabSchema.fields.find(field => field.model === 'secretaria');
									if(newVal.id == 1)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaria de Promoción Social'},
											{id: 2 , name: 'Subsecretaría de Articulación y Abordaje Territorial'},
											{id: 3 , name: 'Subsecretaría de Asistencia Social'},
											{id: 4 , name: 'Subsecretaría de Coordinación Administrativa Financiera-DH'},
											{id: 5 , name: 'Subsecretaría de Promoción, Protección y Desarrollo Social'},
											{id: 6 , name: 'Dirección de Abordaje Integral de las Adicciones'},
											{id: 7 , name: 'Dirección de Asistencia Directa'},
											{id: 8 , name: 'Dirección de Desarrollo Local y Economía Social'},
											{id: 9 , name: 'Dirección de Emergencia Social'},
											{id: 10 , name: 'Dirección de Gestión Financiera DH'},
											{id: 11 , name: 'Dirección de la Juventud'},
											{id: 12 , name: 'Dirección de la Mujer'},
											{id: 13 , name: 'Dirección de la Niñez, Adolescencia y Familia'},
											{id: 14 , name: 'Dirección de la Persona con Discapacidad'},
											{id: 15 , name: 'Dirección de Mutualidades'},
											{id: 16 , name: 'Dirección de Política para la Equidad y el Desarrollo Social'},
											{id: 17 , name: 'Dirección de Políticas Alimentarias'},
											{id: 18 , name: 'Dirección de Políticas para el Adulto Mayor'},
											{id: 19 , name: 'Dirección de Prestaciones Sociales'},
											{id: 20 , name: 'Dirección de Relaciones Institucionales y Protocolo'},
											{id: 21 , name: 'Dirección de Residencia de Adultos Mayores Eva Duarte de Perón'},
											{id: 22 , name: 'Dirección de Talleres Comunitarios'},
											{id: 23 , name: 'Dirección Provincial de Cooperativas'},
											{id: 24 , name: 'Unidad de Coordinación con la Gobernación'}
											];
									}
									if(newVal.id == 2)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Gobierno, Justicia y Derechos Humanos' },
											{id: 2 , name: 'Secretaría de Relaciones Institucionales' },
											{id: 3 , name: 'Secretaría de Seguridad y Orden Público' }
											];
									}
									if(newVal.id == 3)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Gobierno, Justicia y Derechos Humanos' },
											{id: 2 , name: 'Secretaría de Relaciones Institucionales' },
											{id: 3 , name: 'Secretaría de Seguridad y Orden Público' },
											{id: 4 , name: 'Subsecretaría de Derechos Humanos' },
											{id: 5 , name: 'Subsecretaría de Inspección y Control de Gestión de la Seguridad Pública' },
											{id: 6 , name: 'Subsecretaria de Trabajo'},
											{id: 7 , name: 'Subsecretaría de Tránsito y Transporte'},
											{id: 8 , name: 'Dirección de Asuntos Previsionales'},
											{id: 9 , name: 'Dirección de Control de Gestión'},
											{id: 10 , name: 'Dirección de Control y Seguridad del Tránsito'},
											{id: 11 , name: 'Dirección de Coordinación Administrativa - Gob'},
											{id: 12 , name: 'Dirección de Inspección General de Personas Jurídicas'},
											{id: 13 , name: 'Dirección de Integración y Desarrollo Regional'},
											{id: 14 , name: 'Dirección de Investigación'},
											{id: 15 , name: 'Dirección de Ordenamiento y Consolidación Normativa'},
											{id: 16 , name: 'Dirección de Policía de Trabajo'},
											{id: 17 , name: 'Dirección de Políticas Laborales'},
											{id: 18 , name: 'Dirección de Promoción y Protección de Derechos Humanos'},
											{id: 19 , name: 'Dirección de Protección al Preso, Liberado y Excarcelado'},
											{id: 20 , name: 'Dirección de Protección Civil'},
											{id: 21 , name: 'Dirección de Registro Civil y Capacidad de las Personas'},
											{id: 21 , name: 'Dirección de Relaciones de Culto y Organizaciones No Gubernamentales'},
											{id: 23 , name: 'Dirección de Relaciones Laborales'},
											{id: 24 , name: 'Dirección de Sistema Provincial de Archivos y Archivo General de la Provincia'},
											{id: 25 , name: 'Dirección de Tránsito y Planeamiento de Movilidad'},
											{id: 26 , name: 'Dirección de Transporte'},
											{id: 27 , name: 'Dirección Provincial de Lucha contra la Droga y el Narcotráfico'},
											{id: 28 , name: 'Administración Paraje Difunta Correa'},
											{id: 29 , name: 'Policía de San Juan'},
											{id: 30 , name: 'Servicio Penitenciario Provincial'}
											];
									}
									if(newVal.id == 4)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Hacienda y Finanzas'},
											{id: 2 , name: 'Secretaría de la Gestión Pública'},
											{id: 3 , name: 'Subsecretaría de Hacienda y Finanzas'},
											{id: 4 , name: 'Subsecretaría de la Gestión Pública'},
											{id: 5 , name: 'Caja de Acción Social'},
											{id: 6 , name: 'Caja Mutual'},
											{id: 7 , name: 'Consejo para la Planificación Estratégica de la Provincia de San Juan'},
											{id: 8 , name: 'Contaduría General de la Provincia'},
											{id: 9 , name: 'Dirección de Administración Financiera Hda'},
											{id: 10 , name: 'Dirección de Coordinación Administrativa - Hac'},
											{id: 11 , name: 'Dirección de Geodesia y Catastro'},
											{id: 12 , name: 'Dirección General de Recursos Humanos y Organización'},
											{id: 13 , name: 'Dirección General de Rentas'},
											{id: 14 , name: 'Dirección Prov. de Presupuesto y Control Financiero'},
											{id: 15 , name: 'Dirección Provincial de Informática'},
											{id: 16 , name: 'Ente Residual de Organismos Estatales'},
											{id: 17 , name: 'Tesorería General de la Provincia'},
											{id: 18 , name: 'Unidad de Control Previsional'},
											{id: 19 , name: 'Unidad Ejecutora Provincial'},
											{id: 20 , name: 'Instituto de Investigaciones Económicas y Estadísticas'}
											];
									}
									if(newVal.id == 5)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Obras Públicas'},
											{id: 2 , name: 'Secretaría de Servicios Públicos'},
											{id: 3 , name: 'Secretaría de Vivienda'},
											{id: 4 , name: 'Secretaría del Agua'},
											{id: 5 , name: 'Subsecretaria Administrativo Financiera MIySP'},
											{id: 6 , name: 'Subsecretaría de Infraestructura Municipal'},
											{id: 7 , name: 'Subsecretaría de Infraestructura Tecnológica'},
											{id: 8 , name: 'Subsecretaría de Planificación Territorial'},
											{id: 9 , name: 'Subsecretaría de Programación y Control de Gestión'},
											{id: 10 , name: 'Unidad de Coordinación Túnel de Agua Negra'},
											{id: 11 , name: 'Departamento de Hidráulica'},
											{id: 12 , name: 'Dirección de Arquitectura'},
											{id: 13 , name: 'Dirección de Asuntos Municipales'},
											{id: 14 , name: 'Dirección de Conectividad y Telecomunicaciones'},
											{id: 15 , name: 'Dirección de Control Operativo (DCO)'},
											{id: 16 , name: 'Dirección de Coordinación Institucional'},
											{id: 17 , name: 'Dirección de Infraestructura Escolar'},
											{id: 18 , name: 'Direccion de Lote Hogar'},
											{id: 19 , name: 'Dirección de Mantenimiento y Obras Menores'},
											{id: 20 , name: 'Dirección de Planeamiento y Desarrollo Urbano'},
											{id: 21 , name: 'Dirección de Recursos Energéticos'},
											{id: 21 , name: 'Dirección Provincial de Espacios Verdes'},
											{id: 23 , name: 'Dirección Provincial de Redes de Gas'},
											{id: 24 , name: 'Dirección Técnica'},
											{id: 25 , name: 'Directora Técnica - Subsecretaría de Planificación TerritorialJaquelina Cueli'},
											{id: 26 , name: 'Registro Provincial de Constructores de Obras Públicas'},
											{id: 27 , name: 'Dirección Provincial de Vialidad'},
											{id: 28 , name: 'Distribuidora Eléctrica de Caucete'},
											{id: 29 , name: 'Energía Provincial Sociedad del Estado ( EPSE)'},
											{id: 30 , name: 'Ente Provincial Regulador de la Electricidad (EPRE)'},
											{id: 31 , name: 'Instituto Provincial de la Vivienda'},
											{id: 32 , name: 'Obras Sanitarias Sociedad del Estado (OSSE)'},
											{id: 33 , name: 'Tribunal de Tasaciones de la Provincia'},
											{id: 34 , name: 'U.E.P. del Programa Arraigo'}
											];
									}
									if(newVal.id == 6)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría Técnica Minera'},
											{id: 2 , name: 'Subsecretaría de Planificación y Promoción del Desarrollo Minero Sustentable'},
											{id: 3 , name: 'Dirección Coordinación Administrativa Mineria'},
											{id: 4 , name: 'Dirección de Desarrollo Minero Sustentable'},
											{id: 5 , name: 'Dirección de Fiscalización y Control Ambiental'},
											{id: 6 , name: 'Dirección de Fiscalización y Control de Ingresos'},
											{id: 7 , name: 'Dirección de Registro Minero y Catastro'},
											{id: 8 , name: 'Dirección Evaluación Ambiental Minera'},
											{id: 9 , name: 'CIPCAMI'},
											{id: 10 , name: 'Instituto Pcial de Exploración y Explot Minera-I.P.E.E.M.'}
											];
									}
									if(newVal.id == 7)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Agricultura, Ganadería y Agroindustria' },
											{id: 2 , name: 'Secretaría de Industria, Comercio y Servicios' },
											{id: 3 , name: 'Secretaría de Política Económica' },
											{id: 4 , name: 'Subsecretaria de Coord. Adm. Financiera - Producción' },
											{id: 5 , name: 'Dirección de Asuntos Vitivinícolas' },
											{id: 6 , name: 'Dirección de Comercio Exterior'},
											{id: 7 , name: 'Dirección de Defensa al Consumidor'},
											{id: 8 , name: 'Dirección de Desarrollo Agrícola'},
											{id: 9 , name: 'Dirección de Desarrollo Pecuario'},
											{id: 10 , name: 'Dirección de Empleo y Formación'},
											{id: 11 , name: 'Dirección de Industria y Comercio'},
											{id: 12 , name: 'Dirección de Innovación y Desarrollo Productivo'},
											{id: 13 , name: 'Dirección de Instituto Tecnológico e INSEMI'},
											{id: 14 , name: 'Dirección de PYMES y Emprendedores'},
											{id: 15 , name: 'Dirección de Regímenes Promocionales'},
											{id: 16 , name: 'Dirección de Riego, Contingencias Climáticas y Economía Agropecuaria'},
											{id: 17 , name: 'Dirección de Sanidad Vegetal, Animal y Alimentos'},
											{id: 18 , name: 'Unidad Operativa- CFI'},
											{id: 19 , name: 'Agencia Calidad San Juan (ACSJ)'},
											{id: 20 , name: 'Agencia San Juan de Desarrollo de Inversiones'},
											{id: 21 , name: 'Unidad Ejecutora Central Provincial de Proyectos Agropecuarios (UECPPA)'}
											];
									}
									if(newVal.id == 8)
									{
										fiel.values=[
											{id: 2 , name: 'Secretaría de Industria, Comercio y Servicios' },
											{id: 3 , name: 'Secretaría de Política Económica' },
											{id: 4 , name: 'Subsecretaria de Coord. Adm. Financiera - Producción' }
											];
									}
									if(newVal.id == 9)
									{
										fiel.values=[
											{id: 1 , name: 'Secretaría de Cultura' },
											{id: 2 , name: 'Secretaría de Turismo' },
											{id: 3 , name: 'Dirección Complejo Auditorium Ing. Juan Victoria' },
											{id: 4 , name: 'Dirección de Acción Cultural' },
											{id: 5 , name: 'Dirección de Artes y Oficios' },
											{id: 6 , name: 'Dirección de Bibliotecas Populares'},
											{id: 7 , name: 'Dirección de Comunicación y Promoción'},
											{id: 8 , name: 'Dirección de Control de Gestion E Infraestructura'},
											{id: 9 , name: 'Dirección de Coordinación Administrativa - Turismo'},
											{id: 10 , name: 'Dirección de Desarrollo Turistico'},
											{id: 11 , name: 'Dirección de Fiscalización y Calidad'},
											{id: 12 , name: 'Dirección de Patrimonio Cultural'},
											{id: 13 , name: 'Dirección de Productos Turísticos'},
											{id: 14 , name: 'Dirección Museo Prov. Bellas Arte Franklin Rawson'},
											{id: 15 , name: 'Administración Parque Pcial. Ischigualasto'},
											{id: 16 , name: 'Direcc. de Politicas e Industrias Culturales'}
											];
									}
									if(newVal.id == 10)
									{
										fiel.values=[
											{id: 1 , name: 'Subsecretaría de Conservación y Áreas Protegidas' },
											{id: 2 , name: 'Subsecretaría de Desarrollo Sustentable' },
											{id: 3 , name: 'Dirección Conservación y Áreas Protegidas' },
											{id: 4 , name: 'Dirección de Arbolado Público' },
											{id: 5 , name: 'Dirección de Coordinación del Instituto de Desarrollo de la Biodiversidad' },
											{id: 6 , name: 'Dirección de Gestión Ambiental'},
											{id: 7 , name: 'Dirección de Gestión de Residuos Sólidos Urbanos'},
											{id: 8 , name: 'Dirección de Parques Tecnologías Ambientales'},
											{id: 9 , name: 'Dirección de la Unidad Coordinación de Bosques Nativos'},
											{id: 10 , name: 'Dirección de la Unidad de Educación Ambiental'}
											];
									}
									if(newVal.id == 17)
									{
										fiel.values=[
											{id: 1 , name: 'Otra Secretaría o Dirección' }
											];
									}
								},
							styleClasses:'col-xs-6'
						},

						{
								type: "vueMultiSelect",    
								model: "secretaria",
								label: "Secretaria o Dirección (*)",
								placeholder: "Seleccione la Dirección",
								required: true,  
								//validator: validators.required,
								selectOptions: {
									multiple: false,
									key: "id",
									label: "name",
									searchable: true,
									customLabel: function({ id, name }) {
									  return `${id} — [${name}]`
									}
								},
								values: [],
								onChanged: function(model, newVal, field) {
									var fiel=app.$root.secondTabSchema.fields.find(field => field.model === 'secretaria');
										if(newVal.id == "Vue.js")
										{
											fiel.values=[
												{name: '1Vue.js', language: 'JavaScript1' },
												{name: '1Rails', language: 'Ruby1' },
												{name: '1Sinatra', language: 'Ruby1' },
												{name: '1Laravel', language: 'PHP1' },
												{name: '1Phoenix', language: 'Elixir1' },
												{name: '1html5', language: "HTML51"},
												{name: '1js', language: "Javascript1"},
												{name: '1css', language: "CSS31"},
												{name: '1cf', language: "CoffeeScript1"},
												{name: '1ng', language: "AngularJS1"},
												{name: '1vue', language: "1VueJS"},
												{name: '1react', language: "1ReactJS"}];
										}
										if(newVal.name == "Phoenix")
										{
											fiel.values=[
												{ name: '2Vue.js', language: 'JavaScript2' },
												{ name: '2Rails', language: 'Ruby2' },
												{ name: '2Sinatra', language: 'Ruby2' },
												{ name: '2Laravel', language: 'PHP2' },
												{ name: '2Phoenix', language: 'Elixir2' },
												{name: '2html5', language: "HTML52"},
												{name: '2js', language: "Javascript2"},
												{name: '2css', language: "CSS32"},
												{name: '2cf', language: "CoffeeScript2"},
												{name: '2ng', language: "AngularJS2"},
												{name: '2vue', language: "2VueJS"},
												{name: '2react', language: "2ReactJS"}];
										}
										if(newVal.name == "Sinatra")
										{
											fiel.values=[
												{ name: '3Vue.js', language: 'JavaScript3' },
												{ name: '3Rails', language: 'Ruby3' },
												{ name: '3Sinatra', language: 'Ruby3' },
												{ name: '3Laravel', language: 'PHP3' },
												{ name: '3Phoenix', language: 'Elixir3' },
												{name: '3html5', language: "HTML53"},
												{name: '3js', language: "Javascript3"},
												{name: '3css', language: "CSS33"},
												{name: '3cf', language: "CoffeeScript3"},
												{name: '3ng', language: "AngularJS3"},
												{name: '3vue', language: "3VueJS"},
												{name: '3react', language: "3ReactJS"}];
										}

									},
								styleClasses:'col-xs-6'
						},
						{
							type: "input",
							inputType: "text",
							label: "Otra Secretaría o Dirección (opcional)",
							model: "unidad_organica",
							required: false,
							visible: true,
							validator:VueFormGenerator.validators.string,
							styleClasses:'col-xs-6'
						},
						]
					}
				},
				methods: {
					/*var fiel=app.$root.form_datos.fields.find(field => field.model === 'dp_provincia');
						fiel.values=[{id:"0", name:"example"}];*/

				

						mostrar_aclaracion_ram: function(){
							if(parseInt(this.ram_solicitada)  > 4)
								return true;
							else return false;
						},
						
						mostrar_aclaracion_disco: function(){
							if(parseInt(this.disco_solicitada)  > 50)
								return true;
							else return false;
						},
						cambiar_so: function(){
							/*
							Pasos a seguir:

								1 - setear el hardware automatico
								2 - mostrar propietario de licencia
								3 - establecer puertos
								4 - Validar
								5 - habilitar el paso 3 (el 2 era hardware, ya no existe)
							*
							if(this.so_seleccionado == "w2008" || this.so_seleccionado == "w2012")
							{
								//estoy en windows
								//1
								this.ram_solicitada = 4,
								this.aclaracion_ram = '',
								this.disco_solicitada = 40,
								this.aclaracion_disco = '',
								//2
								this.mostrar_licencia_so = true;
								if(this.licencia_solicitada != '')
								{

									this.paso_130_2 = true;
									this.seleccion_so_130_validacion='green';
									this.error_seleccion_so_130_validacion = '';
								}
								else
								{
									this.paso_130_2 = false;
									this.seleccion_so_130_validacion='red';
									this.error_seleccion_so_130_validacion = 'Por favor, ingrese quien aporta la licencia del so seleccionado';
								}
								//3

								
							}
							else
							{

								this.mostrar_licencia_so = false;
								if(this.so_seleccionado == 'otro')
								{
									// veo si la licenci a sido completada
									if(this.otro_sistema_operativo_aclaracion != '')
									{
										this.paso_130_2 = true;
										this.seleccion_so_130_validacion='green';
										this.error_seleccion_so_130_validacion = '';
									}
									else{
										this.paso_130_2 = false;
										this.seleccion_so_130_validacion='red';
										this.error_seleccion_so_130_validacion = 'Por favor, ingrese cual es el so que desea';
									}
								}
								else
								{
									//Estoy en linux
									//1
									this.ram_solicitada = 2,
									this.aclaracion_ram = '',
									this.disco_solicitada = 20,
									this.aclaracion_disco = '',
									//2
									this.paso_130_2 = true;
									this.seleccion_so_130_validacion='green';
									this.error_seleccion_so_130_validacion = '';
									//3
									//4 - validar
									if(this.hostanme == '')//error , no puede ser vacio
									{
										this.seleccion_so_130_validacion='red';
										this.error_seleccion_so_130_validacion = 'El hostanme no puede ser vacio';
										alert("tengo el hostanme vacio");
									}
									else //todo bien
									{
										this.paso_130_3 = true;
									}
									



									//5
								}
							} */







































							console.log("entre a validar hardware\n\n\n\n");
							// 1 input number ram
							// 2 cantidad ram
							// 3 aclaracion ram
							// 4 input number disco 
							// 5 range cantidad disco
							// 6 aclaracion disco
							// 7 hostanme
							//-----------
							//limpio las variables
							this.hardware_mostrar_alerta_130_validacion = false;
							this.error_seleccion_so_130_validacion = '';
							this.seleccion_so_130_validacion='green';
							this.paso_130_3 = false;
							//comporbando so
							if(this.so_seleccionado == "w2008" || this.so_seleccionado == "w2012")
							{
								//estoy en windows
								//1
								this.ram_solicitada = 4,
								this.aclaracion_ram = '',
								this.disco_solicitada = 40,
								this.aclaracion_disco = '',
								//2
								this.mostrar_licencia_so = true;
								if(this.licencia_solicitada == '') //error la licencia debe estar completa
								{
									this.paso_130_3 = false;
									this.hardware_mostrar_alerta_130_validacion = true;
									this.seleccion_so_130_validacion='red';
									this.error_seleccion_so_130_validacion += '* Ingrese quien aporta la licencia del so seleccionado \n';
								}
							}
							else
							{
								this.ram_solicitada = 2;
								this.aclaracion_ram = '';
								this.disco_solicitada = 20;
								this.aclaracion_disco = '';
								this.mostrar_licencia_so = false;//no hace falta mostrarla
								if(this.so_seleccionado == 'otro')
								{
									// veo si la licenci a sido completada
									if(this.otro_sistema_operativo_aclaracion == '')
									{
										this.error_seleccion_so_130_validacion = '';
										this.paso_130_3 = false;
										this.hardware_mostrar_alerta_130_validacion = true;
										this.seleccion_so_130_validacion='red';
										this.error_seleccion_so_130_validacion += '* Ingrese cual es el so que desea\n';
									}
								}
						}
					},

						
							restar_caracteres: function(caso){

							
							if(caso == 3)
							{
								this.caracteres_restantes_aclaracion_finalidad = 150 - this.observaciones_solicitada.length;
							}
							else
							{
								this.caracteres_restantes_aclaracion_finalidad = 150 +1;
							} 
						},

						
						cambiar_finalidad: function(){

							
							if(this.finalidad_seleccionado != '')
							{
								this.paso_130_4 = true;
								//ACTUALIZO LOS PUERTOS DEPENDIENDO DEl so
								if((this.so_seleccionado == "w2008")|| (this.so_seleccionado == "w2012") )
									this.puertos =  [
										{puerto: '80', servicio: "http" , observacion:''},
										{puerto: '443', servicio: "https" , observacion:''},
										{puerto: '161', servicio: "nagios" , observacion:''},
										{puerto: '162', servicio: "nagios" , observacion:''},
										{puerto: '135', servicio: "samba" , observacion:''},
										{puerto: '139', servicio: "samba" , observacion:''},
										{puerto: '445', servicio: "samba" , observacion:''},
										{puerto: '3306', servicio: "mysql" , observacion:''},
										{puerto: '3389', servicio: "rdp" , observacion:''},
										{puerto: '21', servicio: "ftp" , observacion:''},
										{puerto: '22', servicio: "ssh" , observacion:''},
										{puerto: '1433', servicio: "sql server" , observacion:''},
										{puerto: '8530', servicio: "servicio actualizaciones" , observacion:''}
									];
								else
									this.puertos =  [
										{puerto: '80', servicio: "http" , observacion:''},
										{puerto: '443', servicio: "https" , observacion:''},
										{puerto: '161', servicio: "nagios" , observacion:''},
										{puerto: '162', servicio: "nagios" , observacion:''},
										{puerto: '22', servicio: "ssh" , observacion:''}
									];
							}
							else
							{
								this.paso_130_4= false;
							} 
						},

						
						cambio_hardware_130: function(){
							console.log("entre a validar hardware\n\n\n\n");
							// 1 input number ram
							// 2 cantidad ram
							// 3 aclaracion ram
							// 4 input number disco 
							// 5 range cantidad disco
							// 6 aclaracion disco
							// 7 hostanme
							//-----------
							//limpio las variables
							this.hardware_mostrar_alerta_130_validacion = false;
							this.error_seleccion_so_130_validacion = '';
							this.seleccion_so_130_validacion='green';
							this.paso_130_3 = false;
							//comporbando so
							if(this.so_seleccionado == "w2008" || this.so_seleccionado == "w2012")
							{
								//estoy en windows
								//1
								this.ram_solicitada = 4,
								this.aclaracion_ram = '',
								this.disco_solicitada = 40,
								this.aclaracion_disco = '',
								//2
								this.mostrar_licencia_so = true;
								if(this.licencia_solicitada == '') //error la licencia debe estar completa
								{
									this.paso_130_3 = false;
									this.hardware_mostrar_alerta_130_validacion = true;
									this.seleccion_so_130_validacion='red';
									this.error_seleccion_so_130_validacion += '* Ingrese quien aporta la licencia del so seleccionado \n';
								}
								/*else
								{
									//this.paso_130_2 = true;
									//this.seleccion_so_130_validacion='green';
								}*/
								//3
							}
							else
							{
								this.ram_solicitada = 2;
								this.aclaracion_ram = '';
								this.disco_solicitada = 20;
								this.aclaracion_disco = '';
								this.mostrar_licencia_so = false;//no hace falta mostrarla
								if(this.so_seleccionado == 'otro')
								{
									// veo si la licenci a sido completada
									if(this.otro_sistema_operativo_aclaracion == '')
									{
										this.error_seleccion_so_130_validacion = '';
										this.paso_130_3 = false;
										this.hardware_mostrar_alerta_130_validacion = true;
										this.seleccion_so_130_validacion='red';
										this.error_seleccion_so_130_validacion += '* Ingrese cual es el so que desea\n';
									}
									/*else{
										//this.paso_130_2 = true;
										//this.seleccion_so_130_validacion='green';
										//this.error_seleccion_so_130_validacion = '';
									}*/
								}
								/*else
								{
									//Estoy en linux
									//1
									
									//2
									//3
									//4 - validar
									//5
								}
								*/
							} 
							//comprobar el hostname
							if (this.nombre_servidor_solicitada == '' ) // 
							{
								console.log("opcion 7 \n");

								this.paso_130_3 = false;
								this.hardware_mostrar_alerta_130_validacion = true;
								this.seleccion_so_130_validacion='red';
								this.error_seleccion_so_130_validacion += '* Ingrese el hostanme del servidor \n';

							}
							alert(this.error_seleccion_so_130_validacion);
							if(this.hardware_mostrar_alerta_130_validacion == false)
								this.paso_130_3 = true;
						},

				llenarEsteSelect: function(cualSelect){
					console.log(app.$root);
					var fiel=app.$root.secondTabSchema.fields.find(field => field.model === 'library');
						fiel.values=[
							{id: 1 , name: 'M. Desarrollo Humano y Promocion Social'},
							{id: 2 , name: 'M. Educacion'},
							{id: 3 , name: 'M. Gobierno'},
							{id: 4 , name: 'M. Hacienda y Finanzas'},
							{id: 5 , name: 'M. Infraestrucutra y Servicios Publicos'},
							{id: 6 , name: 'M. Mineria'},
							{id: 7 , name: 'M. Produccion'},
							{id: 8 , name: 'M. Salud'},
							{id: 9 , name: 'M. Cultura'},
							{id: 10 , name: 'S. Ambiente y Desarrollo Sustentable'},
							{id: 11 , name: 'S. Ciencia , Tecnologia e Innovacion'},
							{id: 12 , name: 'S. Deporte'},
							{id: 13 , name: 'S. Sec. General de Gobierno'},
							{id: 14 , name: 'Defensoria del Pueblo'},
							{id: 15 , name: 'Fiscalia de Estado'},
							{id: 16 , name: 'Tribunal de Cuentas'},
							{id: 17 , name: 'Otro'}


						];
				},

				onSelect (option, id) {
					console.log(option, id)
				},


				llenarSecretaria: function(id_ministerio){
					var fiel=app.$root.secondTabForm.fields.find(field => field.model === 'secretaria');
					if(id_ministerio == "Vue.js")
					{
						fiel.values=[
							{ name: '1Vue.js', language: 'JavaScript1' },
							{ name: '1Rails', language: 'Ruby1' },
							{ name: '1Sinatra', language: 'Ruby1' },
							{ name: '1Laravel', language: 'PHP1' },
							{ name: '1Phoenix', language: 'Elixir1' },
							{name: '1html5', language: "HTML51"},
							{name: '1js', language: "Javascript1"},
							{name: '1css', language: "CSS31"},
							{name: '1cf', language: "CoffeeScript1"},
							{name: '1ng', language: "AngularJS1"},
							{name: '1vue', language: "1VueJS"},
							{name: '1react', language: "1ReactJS"}];
					}
					if(id_ministerio == "Phoenix")
					{
						fiel.values=[
							{ name: '2Vue.js', language: 'JavaScript2' },
							{ name: '2Rails', language: 'Ruby2' },
							{ name: '2Sinatra', language: 'Ruby2' },
							{ name: '2Laravel', language: 'PHP2' },
							{ name: '2Phoenix', language: 'Elixir2' },
							{name: '2html5', language: "HTML52"},
							{name: '2js', language: "Javascript2"},
							{name: '2css', language: "CSS32"},
							{name: '2cf', language: "CoffeeScript2"},
							{name: '2ng', language: "AngularJS2"},
							{name: '2vue', language: "2VueJS"},
							{name: '2react', language: "2ReactJS"}];
					}
					if(id_ministerio == "Sinatra")
					{
						fiel.values=[
							{ name: '3Vue.js', language: 'JavaScript3' },
							{ name: '3Rails', language: 'Ruby3' },
							{ name: '3Sinatra', language: 'Ruby3' },
							{ name: '3Laravel', language: 'PHP3' },
							{ name: '3Phoenix', language: 'Elixir3' },
							{name: '3html5', language: "HTML53"},
							{name: '3js', language: "Javascript3"},
							{name: '3css', language: "CSS33"},
							{name: '3cf', language: "CoffeeScript3"},
							{name: '3ng', language: "AngularJS3"},
							{name: '3vue', language: "3VueJS"},
							{name: '3react', language: "3ReactJS"}];
					}

				},

				agregar_puerto: function(){
					var puertos_aux = {puerto: '', servicio: "" , observacion:''};
					this.puertos.push( puertos_aux);
				},

				eliminar_puerta: function(indice){
					this.puertos.splice(indice, 1);
				},
						

				saludo: function(){
				alert("hola desde saludo");
				},
				clicked:function(){
					//alert("hola desde el click");
						let pdf = new jsPDF('p', 'px', 'a4')
						pdf.addHTML(this.$refs.userinfo, function() {
							 pdf.save('web.pdf')
						})


					// Landscape export, 2×4 inches
					var doc = new jsPDF({
					  orientation: 'landscape',
					  unit: 'in',
					  format: [4, 2]
					});
					doc.text('Hello world!', 1, 1)
					doc.save('two-by-four.pdf')
				},

					onComplete: function(){
						alert('Gracias por usar este servicio!');

						

				},
				validatezeroTab: function(){
					//alert("comporbando los campos de 1:"+this.model.tipo_formulario);
					this.llenarEsteSelect(1);
					/*if(this.model.tipo_formulario == false)
					{
						alert("Por favor seleccione una opcion");
							return false;
					}
					else {
						return this.$refs.zeroTabForm.validate();
					}*/
					return true;
				},
				validateFirstTab: function(){
					return this.$refs.firstTabForm.validate();
				},
				validateSecondTab: function(){
					this.paso_130_2 = false;
					this.paso_130_3 = false;
					var mensaje = '';
					if(this.model.relacion == '')
						mensaje += " * Complete el tipo de relacion laboral \n";
					if(this.model.library == '')
						mensaje +=" * Complete el ministerio donde trabaja \n";
					if(this.model.secretaria == '')
						mensaje += " * Complete la secretaria donde trabaja\n";
					if(mensaje != '')
					{
						alert(mensaje);
						return false;
					}
					else return this.$refs.secondTabForm.validate();
				},

				
				validateThridTab: function(){
					if(this.formulario_seleccionado == 'nextcloud') //valida los campos de nextcloud
					{
						//tamaño de memoria
						var mensaje_next = '';
						if(this.memoria_solicitada_nextcloud == '') 
							mensaje_next += " * Por favor seleccione el espacio a solicitar \n";
						if( (this.memoria_solicitada_nextcloud == 2)  && (this.jutificacion_memoria_nextcloud == '') ) 
							mensaje_next += " * Por favor complete la justificacion del uso de Almacenamiento \n";
						if(mensaje_next == '')
							return this.$refs.thridTabForm.validate();
						else 
							{
								alert(mensaje_next);
								return false;
							}
					}
					else return this.$refs.thridTabForm.validate();
					
				},
				/*validateFourthTab: function(){
					return this.$refs.fourthTabForm.validate();
				},*/
				hello_ministerio: function(){
					alert("hola");
				},
				prettyJSON: function(json) {
						if (json) {
							json = JSON.stringify(json, undefined, 4);
							json = json.replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>');
							return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
								var cls = 'number';
								if (/^"/.test(match)) {
									if (/:$/.test(match)) {
										cls = 'key';
									} else {
										cls = 'string';
									}
								} else if (/true|false/.test(match)) {
									cls = 'boolean';
								} else if (/null/.test(match)) {
									cls = 'null';
								}
								return '<span class="' + cls + '">' + match + '</span>';
							});
						}
					},
					prueba_axios: function(){
						// Make a request for a user with a given ID
						axios.get('http://10.66.150.159:8000/formularios/datos')
							.then(function (response) {
								// handle success
								//alert("success");
								console.log(response.data[0]);
							})
							.catch(function (error) {
								// handle error
								console.log(error);
							})
							.then(function () {
								// always executed
								//alert("listo");
								console.log("datos:");
							});
					},
					prueba_axios_post:function(){
						axios.post('http://10.66.150.159:8000/formularios/guardar_persona', {
								//comun
								id: '',
								formulario_seleccionado: this.formulario_seleccionado,
								//persona
								nombre: this.model.firstName,
								apellido: this.model.lastName,
								cuil: this.model.cuit,
								email: this.model.email,
								telefono: this.model.telefono_contacto,
								domicilio: this.model.streetName,
								localidad: 'ds',
								departamento: this.model.departamento,
								//trabajo
								cargo: this.model.cargo,
								relacion: this.model.relacion,
								ministerio: this.model.ministerio,
								library: this.model.library,
								secretaria: this.model.secretaria,
								direccion: "direccion sin uso",
								unidad_organica: this.model.unidad_organica,
								//datos_del_servidor
								so_seleccionado: this.so_seleccionado,
								otro_sistema_operativo_aclaracion: this.otro_sistema_operativo_aclaracion,
								ram_solicitada: this.ram_solicitada,
								aclaracion_ram: this.aclaracion_ram,
								
								disco_solicitada: this.disco_solicitada,
								aclaracion_disco: this.aclaracion_disco,
								
								licencia_solicitada: this.licencia_solicitada,
								nombre_servidor_solicitada: this.nombre_servidor_solicitada,
								finalidad_seleccionado: this.finalidad_seleccionado,
								observaciones_solicitada: this.observaciones_solicitada,
								tiene_aplicaciones: this.tiene_aplicaciones,
								nombre_aplicaciones: this.nombre_aplicaciones,
								descripcion_aplicaciones: this.descripcion_aplicaciones,
								tiene_server_web: this.tiene_server_web,
								nombre_server_web: this.nombre_server_web,
								descripcion_server_web: this.descripcion_server_web,
								tiene_base_de_datos: this.tiene_base_de_datos,
								nombre_base_de_datos: this.nombre_base_de_datos,
								descripcion_base_de_datos: this.descripcion_base_de_datos,
								tiene_servidor_archivos: this.tiene_servidor_archivos,
								nombre_servidor_archivos: this.nombre_servidor_archivos,
								descripcion_servidor_archivos: this.descripcion_servidor_archivos,
								tiene_aplicaciones_otro: this.tiene_aplicaciones_otro,
								nombre_aplicaciones_otro: this.nombre_aplicaciones_otro,
								descripcion_aplicaciones_otro: this.descripcion_aplicaciones_otro,
								puertos: this.puertos,
								servidor_temporal: this.servidor_temporal,
								servidor_temporal_fecha_fin: this.servidor_temporal_fecha_fin,
								//empieza 230
								solicitud_203: this.pedido_formulario_203,
								detalle_203: this.detalles_f_203,
								nombre_de_usuario_203: this.nombre_de_usuario_203,
								memoria_solicitada_nextcloud: this.memoria_solicitada_nextcloud,
								jutificacion_memoria_nextcloud: this.jutificacion_memoria_nextcloud,
								nombre_usuario: this.usuario_sistema,
								//correo
								uso_de_correo: this.uso_de_correo,
								sugerencia_mail: this.sugerencia_mail,
								//comun
								created_at: '',
								updated_at: '',
								deleted_at: ''
							})
						.then(function (response) {
							console.log(response.data);
							if(response.data.resultado){
								console.log("el id nuevo es: "+response.data.id);
							}
							this.id_recien_creado = response.data.id;
							//nueva pestaña de descarga
							var a = document.createElement("a");
							a.target = "_blank";
							a.href = "http://10.66.150.159:8000/formularios/descargar_pdf_id/"+response.data.id;
							a.click();
						})
						.catch(function (error) {
							console.log(error);
						});

					}
				},
				watch: {
					ministerio: function (val) {
						alert("hola");
					},
					ram_solicitada: function(){
						clearInterval(this.interval);
							if(this.ram_solicitada == this.displayNumber){
							return;
						}
						this.interval = window.setInterval(function(){
							if(this.displayNumber != this.ram_solicitada){
							var change = (this.ram_solicitada - this.displayNumber) / 10;
								change = change >= 0 ? Math.ceil(change) : Math.floor(change);
								this.displayNumber = this.displayNumber + change;
							}
						}.bind(this), 20);
					}
				},
				ready:function(){
					this.displayNumber = this.ram_solicitada ? this.ram_solicitada : 0;
				}
			})
		</script>
		<script type="text/javascript">


		</script>
	</body>
</html>










