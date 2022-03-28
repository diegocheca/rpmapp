<template>
  <!-- This is an example component -->
  <div class="w-full h-screen">
    <header class="bg-teal-400">
      <nav
        class="
          flex
          justify-between
          w-full
          bg-slate-900
          text-white
          p-4
          fixed
          top-0
          right-0
        "
      >
        <a href="/"><JetApplicationLogo /></a>
        <div class="md:items-center md:w-auto flex">
          <div class="md:flex hidden">
            <a class="block md:text-white mr-4 page-scroll" href="#home"
              >Incio</a
            >
            <a class="block md:text-white mr-4 page-scroll" href="#services"
              >Datos</a
            >
            <a class="block md:text-white mr-4 page-scroll" href="#features"
              >Funciones</a
            >
            <a class="block md:text-white mr-4 page-scroll" href="#team"
              >Oficinas</a
            >
            <a class="nav-link page-scroll" href="#contact">Contacto</a>
          </div>
          <div class="flex text-sm">
            <inertia-link
              class="
                p-2
                ml-2
                bg-teal-500
                text-gray-100
                font-semibold
                leading-none
                border border-teal-900
                rounded
                hover:border-transparent hover:bg-cyan-900
              "
              :href="route('login')"
              >Ingresar</inertia-link
            >
            <inertia-link
              class="
                p-2
                ml-2
                bg-teal-500
                text-gray-100
                font-semibold
                leading-none
                border border-teal-900
                rounded
                hover:border-transparent hover:bg-cyan-900
              "
              :href="route('register')"
              >Registrarte</inertia-link
            >
          </div>
        </div>
      </nav>
    </header>
    <main class="flex justify-center items-center">
      <!-- <div class="container">
        <div class="row space-100">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title">
                Registro de Productores Mineros ( RPM )
              </h2>
              <p>
                Registro de productores Mineros ante el Ministerio de Mineria de
                la Provincia de {{ $provincia }}, Argentina.
              </p>
              <div class="header-button">
                <a href="{{url('login')}}" class="btn btn-border-filled"
                  >Entrar</a
                >
                <a href="#contact" class="btn btn-border page-scroll"
                  >Contactanos</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="{{url('slick/img/intro.png')}}" alt="" />
            </div>
          </div>
        </div>
      </div> -->
      <div class="bg-gray-50">
        <div id="home"></div>
        <h1
          class="
            font-sans font-bold
            text-2xl
            md:text-3xl
            leading-none
            mt-24
            mb-4
            text-center text-gray-700
          "
        >
          <span class="text-green-500">Top Headlines</span>
        </h1>
        <div class="mx-auto px-4 py-4 max-w-xl my-auto">
          <div class="bg-gray-50 md:bg-white md:shadow-xl rounded-lg mb-6">
            <a
              target="_blank"
              rel="noreferrer noopener"
              href="https://timesofindia.indiatimes.com/india/international-space-station-to-retire-in-2030-will-fall-into-pacific-ocean-a-year-later-nasa/articleshow/89392862.cms"
            >
              <div class="md:flex-shrink-0">
                <img
                  src="https://static.toiimg.com/thumb/msid-89392914,width-1070,height-580,imgsize-104716,resizemode-75,overlay-toi_sw,pt-32,y_pad-40/photo.jpg"
                  alt="uploaded cover image"
                  class="object-cover h-full w-full rounded-lg rounded-b-none"
                />
              </div>
            </a>

            <div class="py-1">
              <div class="p-4">
                <h2
                  class="
                    truncate
                    font-bold
                    mb-2
                    md:mt-4
                    text-2xl text-gray-800
                    tracking-normal
                  "
                >
                  International Space Station to retire in 2030, will fall into
                  Pacific Ocean a year later: Nasa - Times of India
                </h2>

                <p class="break-words text-sm text-gray-700 px-2 mr-1">
                  India News: The International Space Station (ISS), the world’s
                  largest habitable artificial satellite in space being managed
                  by five countries, will continue its .
                </p>
              </div>

              <div class="flex items-center justify-between p-2 md:p-4 md:mx-4">
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://timesofindia.indiatimes.com/india/international-space-station-to-retire-in-2030-will-fall-into-pacific-ocean-a-year-later-nasa/articleshow/89392862.cms"
                >
                  <div class="flex items-center">
                    <div class="text-sm ml-2">
                      <p class="text-black leading-none">The Times of India</p>

                      <p class="text-gray-700">February 6, 2022</p>
                    </div>
                  </div>
                </a>
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://timesofindia.indiatimes.com/india/international-space-station-to-retire-in-2030-will-fall-into-pacific-ocean-a-year-later-nasa/articleshow/89392862.cms"
                  class="
                    bg-green-500
                    hover:bg-green-600
                    text-white
                    rounded-full
                    px-8
                    py-2
                  "
                >
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="services"></div>
        <div class="mx-auto px-4 py-4 mt-20 max-w-xl my-auto">
          <div class="container">
            <div class="row">
              <!-- Start Col -->
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="services-item text-center">
                  <a href="/"><JetApplicationLogo /></a>
                  <img
                    :src="$inertia.page.props.appName + '/storage/Logo_RPM.png'"
                    class="img-fluid"
                    alt=""
                    width="35%"
                    height="50%"
                  />
                  <h4>Gestionado por Minería</h4>
                  <p>
                    El sistema es avaldo por el ministario de Minería de San
                    Juan.
                  </p>
                </div>
              </div>
              <!-- End Col -->
              <!-- Start Col -->
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="services-item text-center">
                  <img
                    :src="$inertia.page.props.appName + '/slick/img/home/candado.svg'"
                    class="img-fluid"
                    alt=""
                    width="35%"
                    height="55%"
                  />
                  <h4>Información Actualizada</h4>
                  <p>
                    Siempre se modifica algún dato, este se ve reflejado
                    automáticamente en todos usuarios de forma inmediata.
                  </p>
                </div>
              </div>
              <!-- End Col -->
              <!-- Start Col -->
              <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="services-item text-center">
                  <img
                   :src="$inertia.page.props.appName + '/storage/Logo_RPM.png'"
                    class="img-fluid"
                    alt=""
                    width="30%"
                    height="50%"
                  />

                  <h4>Seguro</h4>
                  <p>
                    El sistema para la administración de productores mineros ha
                    sido diseñado respetando los estándares de seguridad más
                    exigentes.
                  </p>
                </div>
              </div>
              <!-- End Col -->
            </div>
          </div>
        </div>

        <div id="features"></div>
        <div class="mx-auto px-4 py-4 mt-20 max-w-xl my-auto">
          <div class="bg-gray-50 md:bg-white md:shadow-xl rounded-lg mb-6">
            <a
              target="_blank"
              rel="noreferrer noopener"
              href="https://www.moneycontrol.com/news/business/markets/trade-setup-for-monday-top-15-things-to-know-before-opening-bell-170-8042701.html"
            >
              <div class="md:flex-shrink-0">
                <img
                  src="https://images.moneycontrol.com/static-mcnews/2021/07/stocks_sensex_nifty_stockmarket1-1-770x433.jpg"
                  alt="uploaded cover image"
                  class="object-cover h-full w-full rounded-lg rounded-b-none"
                />
              </div>
            </a>

            <div class="py-1">
              <div class="p-4">
                <h2
                  class="
                    truncate
                    font-bold
                    mb-2
                    md:mt-4
                    text-2xl text-gray-800
                    tracking-normal
                  "
                >
                  Trade setup for Monday: Top 15 things to know before Opening
                  Bell - Moneycontrol.com
                </h2>

                <p class="break-words text-sm text-gray-700 px-2 mr-1">
                  Trade Setup | According to pivot charts, the key support
                  levels for the Nifty are placed at 17,446.66, followed by
                  17,377.03. If the index moves up, the key resistance levels to
                  watch out for are 17,601.87 and 17,687.43.
                </p>
              </div>

              <div class="flex items-center justify-between p-2 md:p-4 md:mx-4">
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.moneycontrol.com/news/business/markets/trade-setup-for-monday-top-15-things-to-know-before-opening-bell-170-8042701.html"
                >
                  <div class="flex items-center">
                    <div class="text-sm ml-2">
                      <p class="text-black leading-none">Moneycontrol</p>

                      <p class="text-gray-700">February 6, 2022</p>
                    </div>
                  </div>
                </a>
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.moneycontrol.com/news/business/markets/trade-setup-for-monday-top-15-things-to-know-before-opening-bell-170-8042701.html"
                  class="
                    bg-green-500
                    hover:bg-green-600
                    text-white
                    rounded-full
                    px-8
                    py-2
                  "
                >
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="team"></div>
        <div class="mx-auto px-4 py-4 mt-20 max-w-xl my-auto">
          <div class="bg-gray-50 md:bg-white md:shadow-xl rounded-lg mb-6">
            <a
              target="_blank"
              rel="noreferrer noopener"
              href="https://www.businessinsider.in/tech/news/spacex-has-so-many-starlink-satellites-theyre-increasingly-photobombing-astronomers-images-a-study-says/articleshow/89389799.cms"
            >
              <div class="md:flex-shrink-0">
                <img
                  src="https://www.businessinsider.in/photo/89389799/spacex-has-so-many-starlink-satellites-theyre-increasingly-photobombing-astronomers-images-a-study-says.jpg?imgsize=162344"
                  alt="uploaded cover image"
                  class="object-cover h-full w-full rounded-lg rounded-b-none"
                />
              </div>
            </a>

            <div class="py-1">
              <div class="p-4">
                <h2
                  class="
                    truncate
                    font-bold
                    mb-2
                    md:mt-4
                    text-2xl text-gray-800
                    tracking-normal
                  "
                >
                  SpaceX has so many Starlink satellites they&#39;re
                  increasingly photobombing astronomers&#39; images, a study
                  says - Business Insider India
                </h2>

                <p class="break-words text-sm text-gray-700 px-2 mr-1">
                  SpaceX&#39;s satellites are increasingly photobombing
                  astronomical images, a study has found. It identified a
                  35-fold increase in the twilight images corrupted
                </p>
              </div>

              <div class="flex items-center justify-between p-2 md:p-4 md:mx-4">
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.businessinsider.in/tech/news/spacex-has-so-many-starlink-satellites-theyre-increasingly-photobombing-astronomers-images-a-study-says/articleshow/89389799.cms"
                >
                  <div class="flex items-center">
                    <div class="text-sm ml-2">
                      <p class="text-black leading-none">
                        Business Insider India
                      </p>

                      <p class="text-gray-700">February 6, 2022</p>
                    </div>
                  </div>
                </a>
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.businessinsider.in/tech/news/spacex-has-so-many-starlink-satellites-theyre-increasingly-photobombing-astronomers-images-a-study-says/articleshow/89389799.cms"
                  class="
                    bg-green-500
                    hover:bg-green-600
                    text-white
                    rounded-full
                    px-8
                    py-2
                  "
                >
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="contact"></div>
        <div class="mx-auto px-4 py-4 mt-20 max-w-xl my-auto">
          <div class="bg-gray-50 md:bg-white md:shadow-xl rounded-lg mb-6">
            <a
              target="_blank"
              rel="noreferrer noopener"
              href="https://www.hindustantimes.com/india-news/covid19-centre-to-resume-full-office-attendance-without-any-exemption-from-feb-7-101644161758671.html"
            >
              <div class="md:flex-shrink-0">
                <img
                  src="https://images.hindustantimes.com/img/2022/02/06/1600x900/211b953a-6c53-11ec-90fd-dc4af0b7c0b9_1641196168085_1644161865598.jpg"
                  alt="uploaded cover image"
                  class="object-cover h-full w-full rounded-lg rounded-b-none"
                />
              </div>
            </a>

            <div class="py-1">
              <div class="p-4">
                <h2
                  class="
                    truncate
                    font-bold
                    mb-2
                    md:mt-4
                    text-2xl text-gray-800
                    tracking-normal
                  "
                >
                  Covid-19: Centre to resume full office attendance ‘without any
                  exemption’ from Feb 7 - Hindustan Times
                </h2>

                <p class="break-words text-sm text-gray-700 px-2 mr-1">
                  The Union ministry of personnel, public grievances &amp;
                  pensions said that Union minister Jitendra Singh held a review
                  meeting on Sunday following which the decision to resume 100%
                  attendance for its employees was taken. | Latest News India
                </p>
              </div>

              <div class="flex items-center justify-between p-2 md:p-4 md:mx-4">
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.hindustantimes.com/india-news/covid19-centre-to-resume-full-office-attendance-without-any-exemption-from-feb-7-101644161758671.html"
                >
                  <div class="flex items-center">
                    <div class="text-sm ml-2">
                      <p class="text-black leading-none">Hindustan Times</p>

                      <p class="text-gray-700">February 6, 2022</p>
                    </div>
                  </div>
                </a>
                <a
                  target="_blank"
                  rel="noreferrer noopener"
                  href="https://www.hindustantimes.com/india-news/covid19-centre-to-resume-full-office-attendance-without-any-exemption-from-feb-7-101644161758671.html"
                  class="
                    bg-green-500
                    hover:bg-green-600
                    text-white
                    rounded-full
                    px-8
                    py-2
                  "
                >
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="bottomNav fixed bottom-0 w-full">
      <nav
        style="border: 1px solid blue"
        class="md:hidden bottom-0 w-full bg-gray-700 text-xs"
      >
        <ul
          class="
            flex
            justify-around
            items-center
            text-white text-center
            opacity-75
            text-lg
            font-bold
          "
        >
          <li class="p-4 hover:bg-gray-500">
            <a href="#home">
              <span>Incio</span>
              <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                <path
                  d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z"
                  fill-rule="evenodd"
                />
              </svg>
            </a>
          </li>
          <li class="p-4 hover:bg-gray-500">
            <a href="#services">
              <span>Datos</span>
              <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                <path
                  d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z"
                  fill-rule="evenodd"
                />
              </svg>
            </a>
          </li>
          <li class="p-4 hover:bg-gray-500">
            <a href="#features">
              <span>Funciones</span>
              <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                <path
                  d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z"
                  fill-rule="evenodd"
                />
              </svg>
            </a>
          </li>
          <li class="p-4 hover:bg-gray-500">
            <a href="#team">
              <span>Oficinas</span>
              <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                <path
                  d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z"
                  fill-rule="evenodd"
                />
              </svg>
            </a>
          </li>
          <li class="p-4 hover:bg-gray-500">
            <a href="#contact">
              <span>Contacto</span>
              <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                <path
                  d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z"
                  fill-rule="evenodd"
                />
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>
<style>
html,
body {
  height: 100%;
  -webkit-font-smoothing: antialiased;
  scrollbar-width: none;
  -ms-overflow-style: none;
}
body::-webkit-scrollbar {
  display: none;
}
::-moz-selection {
  color: white;
  background: #10b981;
}
::selection {
  color: white;
  background: #10b981;
}
</style>

<script>
import AppLayout from "@/Layouts/AppLayoutPrueba";

import JetApplicationLogo from "@/Jetstream/ApplicationLogo2";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import ChartBar from "@/Components/charts/bar";
import ChartPie from "@/Components/charts/pie";
import TimeLine from "@/Components/charts/line";
import LineChart from "../Components/charts/linechart.vue";
export default {
  components: {
    AppLayout,
    JetApplicationLogo,
    JetAuthenticationCardLogo,
    ChartBar,
    ChartPie,
    TimeLine,
    LineChart,
  },
};
</script>