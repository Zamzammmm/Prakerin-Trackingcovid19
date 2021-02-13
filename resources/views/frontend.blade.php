<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TrackingCovid-19</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/icon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css ')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css ')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v3.0.1
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php
        $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
    ?>

  <!-- ======= Header ======= -->
  @include('component.header')
  <!-- End Header -->

  <!-- ======= Count ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Tracking Covid-19</h1>
          <h2>Data Coronavirus Indonesia dan Global Terupdate</h2>
        </div>  
      </div>
      
      <div class="row icon-boxes">
        <div class="col-lg-3 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"> 
              <img src="{{asset('frontend/assets/img/positif.png')}}" width="50" height="50" alt="Positif">
            </div>
            <h4 class="title"><a href="">TOTAL POSITIF</a></h4>
            <span data-toggle="counter-up"><?php echo $positif['value'] ?></span>
            <p class="description">ORANG</p>
          </div>
        </div>

        <div class="col-lg-3 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"> 
              <img src="{{asset('frontend/assets/img/sembuh.png')}}" width="50" height="50" alt="Positif">
            </div>
            <h4 class="title"><a href="">TOTAL SEMBUH</a></h4>
            <span data-toggle="counter-up"><?php echo $sembuh['value'] ?></span>
            <p class="description">ORANG</p>
          </div>
        </div>

        <div class="col-lg-3 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"> 
              <img src="{{asset('frontend/assets/img/meninggal.png')}}" width="50" height="50" alt="Positif">
            </div>
            <h4 class="title"><a href="">TOTAL MENINGGAL</a></h4>
            <span data-toggle="counter-up"><?php echo $meninggal['value'] ?></span>
            <p class="description">ORANG</p>
          </div>
        </div>

        <div class="col-lg-3 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"> 
              <img src="{{asset('frontend/assets/img/indonesia.png')}}" width="50" height="50" alt="Positif">
            </div>
            <h4 class="title"><a href="">INDONESIA</a></h4>
            <span data-toggle="counter-up">{{number_format($jumlah_positif)}}</span>&nbsp; POSITIF,<br>
            <span data-toggle="counter-up">{{number_format($jumlah_sembuh)}}</span> SEMBUH, <br>
            <span data-toggle="counter-up"> {{number_format($jumlah_meninggal)}}</span> MENINGGAL. 
          </div>
        </div>
      </div><br>
      <div class="col text-center">
            <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
        </div> 
    </div>
  </section><!-- End Count -->

  <!-- ======= Main ======= -->
  @include('component.main')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('component.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>