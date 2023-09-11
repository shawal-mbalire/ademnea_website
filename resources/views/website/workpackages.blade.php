<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adaptive Environmental Monitoring Networks for East Africa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
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
    <section id="scholarship" class="about pt-0">
    <div class="container card w-100">
     @if($workpackages ->count())
        <div class="section-title">
            </div>
            @foreach($workpackages  as $workpackage)
            <div class="container">
               {{-- {!! $workpackage->instructions !!} --}}
              <b>Name:</b> {{$workpackage->name}} <br>
              <b>Partners:</b>{{$workpackage->partners}}<br>
             <b> Duration: </b>{{$workpackage->duration}}<br><br>
              <b>Description</b> <br> 
               {!! preg_replace('/\r\n|\r|\n/', '<br>', $workpackage->instructions) !!}

            </div>
            @endforeach
        @else
        <p>There are currently no work packages</p>
        @endif
    </div>
   
    <div class="container pt-5">
    <div class="h5 text-center">
        Other Work Packages
    </div>
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-laptop"></i></div>
                    <h4 class="title"><a href= "/workpackages-wp1">Networks and Resilience(WP1)</a></h4>
                    <p class="description">VSensor data must be collected from both static and mobile sensors in the
                        field and then aggregated by nodes which are energy-constrained either because they rely on
                        batteries or on local power sources such as solar panels. </p>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                    <h4 class="title"><a href= "/workpackages-wp2">Sensors and signal processing(WP2) </a></h4>
                    <p class="description">These data shall be stored and integrated in digital platforms that
                        facilitate analysis of temporal and spatial species abundance and diversity, improvement of
                        insect management, reduction of pesticide usage and institution of conservation measures for
                        pollinating insects</p>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4 custom-card" style="background-color:green; border-radius=20px; height:300px" >
                <div class="card-body" style="background-color: white" >
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-graph-up"></i></div>
                    <h4 class="title"><a href= "/workpackages-wp3">Data Analytics for Environment Monitoring services(WP3)</a></h4>
                    <p class="description">Development of automated information collection for insect pollinators and
                        pests. And also for the first time combined utilization of large weather information data sets
                        in insect pollinator conservation planning and pest control method design</p>
                </div> 
                    </div>
                </div>
            </div>
            
            
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
