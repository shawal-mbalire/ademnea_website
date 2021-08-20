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
        <section id="scholarship" class="about">
    <div class="container">
     @if($scholarships->count())
        <div class="section-title">
            <h2>call for scholarships</h2>
            </div>
            <div class="row no-gutters">
            @foreach($scholarships as $scholarship)
            <div class="col-lg-6 col-md-6">
                <div class="icon-box">
                <h4 class="title">{{$scholarship->topic}}</h4>
                    <p class="description">Scholarship category: {{$scholarship->category}}</p>
                    <p class="description"> {{$scholarship->positions}}</p>
                    <p class="description">{{$scholarship->task}}</p>
                    <p class="description"> {{$scholarship->deliverables}}</p>
                    <p class="description">{{$scholarship->task}}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>There are currently no scholarships</p>
        @endif
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
