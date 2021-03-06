<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Grayrids">
  <title>RPM</title>
  <!--====== Favicon Icon ======-->
  {{-- <link rel="shortcut icon" href="{{url('slick/img/2.png')}}" type="image/png"> --}}
  <link rel="shortcut icon" href="{{url('slick/img/ico_rpm.png')}}" type="image/png">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{url('slick/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/animate.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/LineIcons.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/nivo-lightbox.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/main.css')}}">
  <link rel="stylesheet" href="{{url('slick/css/responsive.css')}}">

</head>

<body>
  <!-- Header Section Start -->
  <header id="home" class="hero-area">
    <div class="overlay">
      <span></span>
      <span></span>
    </div>
    <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
      <div class="container">
        <a href="index.html" class="navbar-brand"><img src="{{url('slick/img/Logo_RPM.png')}}" alt="" width="40%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#home">Incio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#services">Datos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#features">Funciones</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link page-scroll" href="#showcase">Showcase</a>
              </li>        -->
            <!--  <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing">Pricing</a>
              </li>   -->
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#team">Oficinas</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog">Blog</a>
              </li>   -->
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-singin" href="{{url('login')}}">Ingresar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row space-100">
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="contents">
            <h2 class="head-title">Registro de Productores Mineros ( RPM )</h2>
            {{-- <p>Registro de productores Mineros ante el Ministerio de Mineria de la Provincia de {{$provincia}}, Argentina.</p> --}}
            <div class="header-button">
              <a href="{{url('login')}}" class="btn btn-border-filled">Entrar</a>
              <a href="#contact" class="btn btn-border page-scroll">Contactanos</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-xs-12 p-0">
          <div class="intro-img">
            <img src="{{url('slick/img/intro.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Section End -->


  <!-- Services Section Start -->
  <section id="services" class="section">
    <div class="container">

      <div class="row">
        <!-- Start Col -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="services-item text-center">
            <img src="{{url('slick/img/home/gobierno.svg')}}" class="img-fluid" alt="" width="35%" height="50%">
            <h4>Gestionado por Miner??a</h4>
            <p>El sistema es avaldo por el ministario de Miner??a de San Juan.</p>
          </div>
        </div>
        <!-- End Col -->
        <!-- Start Col -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="services-item text-center">
            <img src="{{url('slick/img/home/update.svg')}}" class="img-fluid" alt="" width="35%" height="55%">
            <h4>Informaci??n Actualizada</h4>
            <p>Siempre se modifica alg??n dato, este se ve reflejado autom??ticamente en todos usuarios de forma inmediata.</p>
          </div>
        </div>
        <!-- End Col -->
        <!-- Start Col -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="services-item text-center">
            <img src="{{url('slick/img/home/candado.svg')}}" class="img-fluid" alt="" width="30%" height="50%">

            <h4>Seguro</h4>
            <p>El sistema para la administraci??n de productores mineros ha sido dise??ado respetando los est??ndares de seguridad m??s exigentes.</p>
          </div>
        </div>
        <!-- End Col -->

      </div>
    </div>
  </section>
  <!-- Services Section End -->
  <!-- Business Plan Section Start -->
  <section id="business-plan">
    <div class="container">

      <div class="row">
        <!-- Start Col -->
        <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
          <div class="business-item-img">
            <img src="{{url('slick/img/business/carrito_tirando.jpg')}}" class="img-fluid" alt="">
          </div>
        </div>
        <!-- End Col -->
        <!-- Start Col -->
        <div class="col-lg-6 col-md-12 pl-4">
          <div class="business-item-info">
            <h3>Mayor control de Recursos</h3>
            <p>El sistema de RPM tiene por objetivo brindar beneficios a la ayuda a detener la mineria clandestina, a la vez que se disponen datos de manera abierta para ser accedida por todos.</p>

            <!-- <a class="btn btn-common" href="#">download</a> -->
          </div>
        </div>
        <!-- End Col -->

      </div>
    </div>
  </section>
  <!-- Business Plan Section End -->

  <!-- Business Plan Section Start -->
  <section id="business-plan">
    <div class="container">

      <div class="row">

        <!-- Start Col -->
        <div class="col-lg-6 col-md-12 pl-4">
          <div class="business-item-info">
            <h3>Cuidado del Medio Ambiente</h3>
            <p>El sistema de RPM ayuda a detener la miner??a clandestina, mientras que ayuda a la comunidad evitando contaminaci??nes y residuos nosivos para las personas y animales.</p>

            <!-- <a class="btn btn-common" href="#">download</a> -->
          </div>
        </div>
        <!-- End Col -->
        <!-- Start Col -->
        <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
          <div class="business-item-img">
            <img src="{{url('slick/img/business/business-img.png')}}" class="img-fluid" alt="">
          </div>
        </div>
        <!-- End Col -->


      </div>
    </div>
  </section>
  <!-- Business Plan Section End -->



  <!-- Cool Fetatures Section Start -->
  <section id="features" class="section">
    <div class="container">
      <!-- Start Row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="features-text section-header text-center">
            <div>
              <h2 class="section-title">Funciones de RPM</h2>
              <div class="desc-text">
                <p>Entre las caracteristicas del sistema de Registro de Productores Mineros, se encuentran: .</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- End Row -->
      <!-- Start Row -->
      <div class="row featured-bg">
        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item featured-border1">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/oro-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Registro de Minerales</h4>
              <p>Todos los productores, sin importar, cual <br> sea el tipo de mineral que trabaje se debe,<br> inscribir en el sistema.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->

        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item featured-border2">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/carrito-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Gesti??n de datos</h4>
              <p>El sistema aporta facilidad para la administraci??n <br> de los productores locales, disponiendo los datos <br> de contacto, y ubicaci??n de sus oficinas.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->

        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item featured-border1">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/plano-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Mapa Online</h4>
              <p>RPM cuenta con una visualizacion de datos en <br> un mapa virtual que garantiza la f??cil comprensi??n. <br>Adem??s los datos son p??blicos.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->

        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item featured-border2">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/mineral-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Transparencia</h4>
              <p>El sistema contribuye a sumar transparancia en <br> el manejo de la extracci??n de minerales <br>y sus cantidades, cuidando el medio ambiente.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->

        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item featured-border3">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/casco-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Inclusi??n de Productores</h4>
              <p>El sistema esta pensado para <br> incluir a todos los productores mineros.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->

        <!-- Start Col -->
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
          <!-- Start Fetatures -->
          <div class="feature-item">
            <div class="feature-icon float-left">
              <img src="{{url('slick/img/features/tratamiento-minero.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="feature-info float-left">
              <h4>Mayor Control</h4>
              <p>Se espera poder contar con un minucioso control<br> del proceso de extracci??n de los minerales.</p>
            </div>
          </div>
          <!-- End Fetatures -->
        </div>
        <!-- End Col -->


      </div>
      <!-- End Row -->
    </div>
  </section>
  <!-- Cool Fetatures Section End -->


  <!-- Recent Showcase Section Start ->
    <section id="showcase">
      <div class="container-fluid right-position">
        <!-- Start Row ->
        <div class="row gradient-bg">
          <div class="col-lg-12">
            <div class="showcase-text section-header text-center">  
              <div>   
                <h2 class="section-title">Recent Works</h2>
                <div class="desc-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row ->
        <!-- Start Row ->
        <div class="row justify-content-center showcase-area">
          <div class="col-lg-12 col-md-12 col-xs-12 pr-0">
            <div class="showcase-slider owl-carousel">
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/02.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/03.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/04.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/05.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/02.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/03.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/04.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/05.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             

              
            </div>
          </div>
        </div>
        <!-- End Row ->
      </div>
    </section>
    <!-- Recent Showcase Section End -->

  <!-- Our Pricing Plan Section Start ->
    <section id="pricing" class="section">
      <div class="container">
        <!-- Start Row ->
        <div class="row">
          <div class="col-lg-12">
            <div class="pricing-text section-header text-center">  
              <div>   
                <h2 class="section-title">Pricing Plans</h2>
                <div class="desc-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p>
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row ->
        <!-- Start Row ->
        <div class="row pricing-tables">
         <!--  Start Col ->
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table text-center">
              <div class="pricing-details">
                <h3>Free</h3>
                <h1><span>$</span>00</h1>
                <ul>
                  <li>Free Instalation</li>
                  <li>500MB Storage</li>
                  <li>Single User</li>
                  <li>5 GB Bandwith</li>
                  <li>Minimal Features</li>
                  <li>No Dashboard</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-border">Purchase</a>
              </div>
            </div>
          </div>
           <!--  End Col ->
         <!--  Start Col ->
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table text-center">
              <div class="pricing-details">
                <h3>standard</h3>
                <h1><span>$</span>19.99</h1>
                <ul>
                  <li>Free Instalation</li>
                  <li>2 GB Storage</li>
                  <li>Upto 2 users</li>
                  <li>50 GB Bandwith</li>
                  <li>All Features</li>
                  <li>Sales Dashboard</li>                  
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Purchase</a>
              </div>
            </div>
          </div>
           <!--  End Col ->
         <!--  Start Col ->
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table text-center">
              <div class="pricing-details">
                <h3>Business</h3>
                <h1><span>$</span>29.99</h1>
                <ul>
                  <li>Free Instalation</li>
                  <li>5 GB Storage</li>
                  <li>Upto 4 users</li>
                  <li>100 GB Bandwith</li>
                  <li>All Features</li>
                  <li>Sales Dashboard</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-border">Purchase</a>
              </div>
            </div>
          </div>
           <!--  End Col ->

        </div>
        <!-- End Row ->
      </div>
    </section>
    <!-- Our Pricing Plan Section End -->

  <!-- Client Testimoninals Section Start ->
    <section id="testimonial" class="section">
      <div class="container right-position">
        <!-- Start Row ->
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="video-promo-content text-center">

              <a id="play-video" class="video-play-button video-popup" href="https://www.youtube.com/watch?v=Y4fodpIwal8&list=RDXCElIIYx_8s&index=13">
                <span></span>
              </a>

            </div>
          </div>
        </div>
        <!-- End Row ->
        <!-- Start Row ->
        <div class="row justify-content-center testimonial-area">
          <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 pr-20 pl-20" style="overflow: hidden;padding-bottom: 60px">
            <div id="client-testimonial" class="text-center owl-carousel">
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="content-inner">
                    <p class="description">Appropriately implement one-to-one catalysts for change <br> vis-a-vis wireless catalysts for change. Enthusiastically architect <br> adaptive e-tailers after sustainable total linkage. Appropriately <br> implement one-to-one catalysts for change.</p>
                    <div class="author-info">
                      <h5>Tahmina Anny ; <span> UIdeck Customer</span></h5>
                    </div>
                  </div>
                  <div class="client-thumb">
                    <img src="img/testimonial/01.png" alt="">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- End Row ->
      </div>
    </section>
    <!-- Client Testimoninals Section End -->


  <!-- Team section Start -->
  <section id="team" class="section">
    <div class="container">
      <!-- Start Row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="team-text section-header text-center">
            <div>
              <h2 class="section-title">Departamentos</h2>
              <div class="desc-text">
                <p>Estos son los departamento y direccion que componen el ministrerio de Miner??a</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- End Row -->
      <!-- Start Row -->
      <div class="row">
        <!-- Start Col -->
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="single-team">
            <div class="team-thumb">
              <img src="{{url('slick/img/team/oficina1.svg')}}" class="img-fluid" alt="" width="263" height="310">
            </div>

            <div class="team-details">
              <div class="team-social-icons">
                <ul class="social-list">
                  <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a href="#"><i class="lni-google-plus"></i></a></li>
                </ul>
              </div>
              <div class="team-inner text-center">
                <h5 class="team-title">Oficina de Mesa de Entrada</h5>
                <p>Tel: 4302525</p>
                <p>email: mesaentrada@sanjuan.gov.ar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Start Col -->

        <!-- Start Col -->
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="single-team">
            <div class="team-thumb">
              <img src="{{url('slick/img/team/oficina2.svg')}}" class="img-fluid" alt="" width="263" height="310">
            </div>

            <div class="team-details">
              <div class="team-social-icons">
                <ul class="social-list">
                  <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a href="#"><i class="lni-google-plus"></i></a></li>
                </ul>
              </div>
              <div class="team-inner text-center">
                <h5 class="team-title">Oficina Contable</h5>
                <p>Tel: 4302525</p>
                <p>email: contable@sanjuan.gov.ar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Start Col -->

        <!-- Start Col -->
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="single-team">
            <div class="team-thumb">
              <img src="{{url('slick/img/team/oficina3.svg')}}" class="img-fluid" alt="" width="263" height="310">
            </div>

            <div class="team-details">
              <div class="team-social-icons">
                <ul class="social-list">
                  <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a href="#"><i class="lni-google-plus"></i></a></li>
                </ul>
              </div>
              <div class="team-inner text-center">
                <h5 class="team-title">Oficina Director</h5>
                <p>Tel: 4302525</p>
                <p>email: directordgr@sanjuan.gov.ar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Start Col -->

        <!-- Start Col -->
        <div class="col-lg-3 col-md-6 col-xs-12">
          <div class="single-team">
            <div class="team-thumb">
              <img src="{{url('slick/img/team/oficina4.svg')}}" class="img-fluid" alt="" width="263" height="310">
            </div>

            <div class="team-details">
              <div class="team-social-icons">
                <ul class="social-list">
                  <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a href="#"><i class="lni-google-plus"></i></a></li>
                </ul>
              </div>
              <div class="team-inner text-center">
                <h5 class="team-title">Oficina Letrada</h5>
                <p>Tel: 4302525</p>
                <p>email: letrada@sanjuan.gov.ar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Start Col -->


      </div>
      <!-- End Row -->
    </div>
  </section>
  <!-- Team section End -->



  <!-- Contact Us Section -->
  <section id="contact" class="section">
    <!-- Container Starts -->
    <div class="container">
      <!-- Start Row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-text section-header text-center">
            <div>
              <h2 class="section-title">Contacto</h2>
              <div class="desc-text">
                <p>Por favor, realizanos cualquier pregunta , inquietud o sugerencia</p>
                <p>A la brevedad te responderemos.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- End Row -->
      <!-- Start Row -->







      <div class="row">
        <!-- Start Col -->
        <div class="col-lg-6 col-md-12">
          @if(Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
          @endif
          {!! Form::open(['route'=>'contact.store']) !!}
          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Name:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
          </div>
          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('Email:') !!}
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) !!}
            <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>
          <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {!! Form::label('Message:') !!}
            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Mensaje']) !!}
            <span class="text-danger">{{ $errors->first('message') }}</span>
          </div>
          {{-- <div class="form-group">
            <button class="btn btn-success">Enviar</button>
          </div> --}}
          <div class="submit-button">
            <button class="btn btn-common" style="width:100%" id="submit" type="submit">Enviar</button>
            <div id="msgSubmit" class="h3 hidden"></div>
            <div class="clearfix"></div>
          </div>
        </div>

        {!! Form::close() !!}
        <!-- End Row -->
        <!-- End Col -->
        <!-- Start Col -->
        <!-- End Col -->
        <!-- Start Col -->
        <div class="col-lg-6 col-md-12">
          <div class="contact-img">
            <img src="{{url('slick/img/contact/contact-us-rpm.svg')}}" width="100%" height="80%" class="img-fluid" alt="">
          </div>
        </div>
        <!-- End Col -->
        <!-- Start Col -->
        <!-- End Col -->

      </div>
      <!-- End Row -->
    </div>
  </section>
  <!-- Contact Us Section End -->


  <!-- Footer Section Start -->
  <footer>
    <!-- Footer Area Start -->
    <section id="footer-Content" style="padding-top:0px">
      <!--<div class="container">
          <!-- Start Row ->
          <div class="row">

          <!-- Start Col ->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              
              <div class="footer-logo">
               <img src="img/footer-logo.png" alt="">
              </div>
            </div>
             <!-- End Col ->
              <!-- Start Col ->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Company</h3>
                <ul class="menu">
                  <li><a href="#">  - About Us</a></li>
                  <li><a href="#">- Career</a></li>
                  <li><a href="#">- Blog</a></li>
                  <li><a href="#">- Press</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col ->
              <!-- Start Col ->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Product</h3>
                <ul class="menu">
                  <li><a href="#">  - Customer Service</a></li>
                  <li><a href="#">- Enterprise</a></li>
                  <li><a href="#">- Price</a></li>
                  <li><a href="#">- Scurity</a></li>
                  <li><a href="#">- Why SLICK?</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col ->
              <!-- Start Col ->
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Download App</h3>
                <ul class="menu">
                  <li><a href="#">  - Android App</a></li>
                  <li><a href="#">- IOS App</a></li>
                  <li><a href="#">- Windows App</a></li>
                  <li><a href="#">- Play Store</a></li>
                  <li><a href="#">- IOS Store</a></li>
                </ul>
              </div>
            </div>
             <!-- End Col ->
              <!-- Start Col ->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Subscribe Now</h3>
                <p>Appropriately implement calysts for change visa wireless catalysts for change. </p>
                <div class="subscribe-area">
                  <input type="email" class="form-control" placeholder="Enter Email">
                  <span><i class="lni-chevron-right"></i></span>
                </div>
              </div>
            </div>
            <!-- End Col ->
          </div>
          <!-- End Row ->
        </div>
        <!-- Copyright Start  -->

      <div class="copyright">
        <div class="container">
          <!-- Star Row -->
          <div class="row">
            <div class="col-md-12">
              <div class="site-info text-center">
                <p>P.N.U.D. y Secretar??a de Miner??a Nacional</p>
              </div>

            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <!-- Copyright End -->
    </section>
    <!-- Footer area End -->

  </footer>
  <!-- Footer Section End -->



  <!-- Go To Top Link -->
  <a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="loader" id="loader-1"></div>
  </div>
  <!-- End Preloader -->

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="{{url('slick/js/jquery-min.js')}}"></script>
  <script src="{{url('slick/js/popper.min.js')}}"></script>
  <script src="{{url('slick/js/bootstrap.min.js')}}"></script>
  <script src="{{url('slick/js/owl.carousel.js')}}"></script>
  <script src="{{url('slick/js/jquery.nav.js')}}"></script>
  <script src="{{url('slick/js/scrolling-nav.js')}}"></script>
  <script src="{{url('slick/js/jquery.easing.min.js')}}"></script>
  <script src="{{url('slick/js/nivo-lightbox.js')}}"></script>
  <script src="{{url('slick/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{url('slick/js/main.js')}}"></script>

  <script>
    //mis funciones 
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('document').ready(function() {
      //para expedientes
      //fin expedientes

      //Init datepicker for date fields if data-datepicker attribute defined
      //or if browser does not handle date inputs
    });
  </script>

</body>

</html>