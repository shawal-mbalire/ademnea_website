<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adaptive Environmental Monitoring Networks for East Africa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <style>
        #collapseExample.collapse:not(.show) {
        display: block;
        height: 3rem;
        overflow: hidden;
        }

        #collapseExample.collapsing {
        height: 3rem;
        }
    </style>
    @include('website.links')

    <!-- =======================================================
  * Template Name: Green - v4.3.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    @include('website.top_bar')

    <!-- ======= Header ======= -->
    @include('website.header')
    <!-- End Header -->



    <main id="main">
        <!-- ======= Scholarship Section ======= -->
        <section id="gallery" class="gallery">
    <div class="container">
      <div class="section-title">
        <h2>Gallery</h2>
      </div>
  @foreach($gallery as $item)
  <div class="h4 text-center">
     {{$item -> title}}
    </div>
    <div class="row">
      @foreach(explode("|", $item->image) as $image)
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 bg-success card card-body" style="width: 18rem;">
        <img src="{{asset('image/' . $image)}}" class="shadow-1-strong rounded mb-4" alt="" />
      </div>
      @endforeach
    </div>
    <div class="text-center">
      {{$item -> description}}
     </div>
    <br>
    <br>
    @endforeach
</div>
</div>
</section>

        <!-- End Scholarship Section -->

       

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('website.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('website.scripts')

</body>

</html>
