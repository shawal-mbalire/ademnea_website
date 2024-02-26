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
    

            /*--------------------------------------------------------------
            # Team Section
            --------------------------------------------------------------*/
            .team .team-member .member-img {
              border-radius: 8px;
              overflow: hidden;
            }
            .team .team-member .social {
              position: absolute;
              left: 0;
              top: -18px;
              right: 0;
              opacity: 0;
              transition: ease-in-out 0.3s;
              display: flex;
              align-items: center;
              justify-content: center;
            }
            .team .team-member .social a {
              transition: color 0.3s;
              color: blue;
              background: #0ea2bd;
              margin: 0 5px;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              width: 36px;
              height: 36px;
              border-radius: 50%;
              transition: 0.3s;
            }
            .team .team-member .social a i {
              line-height: 0;
              font-size: 16px;
            }
            .team .team-member .social a:hover {
              background: #1ec3e0;
            }
            .team .team-member .social i {
              font-size: 18px;
              margin: 0 2px;
            }
            .team .team-member .member-info {
              padding: 30px 15px;
              text-align: center;
              box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
              background: #ffffff;
              margin: -50px 20px 0 20px;
              position: relative;
              border-radius: 8px;
            }
            .team .team-member .member-info h4 {
              font-weight: 400;
              margin-bottom: 5px;
              font-size: 24px;
              color: #485664;
            }
            .team .team-member .member-info span {
              display: block;
              font-size: 16px;
              font-weight: 400;
              color: var(--color-gray);
            }
            .team .team-member .member-info p {
              font-style: italic;
              font-size: 14px;
              line-height: 26px;
              color: #6c757d;
            }
            .team .team-member:hover .social {
              opacity: 1;
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

    <section id="team" class="team">

<div class="container" data-aos="fade-up">

    <h2>AdeMNEA Publications</h2>
<br>
        {{-- publication cards begin here --}}
        @if($publication->count())
        <div class="row gy-5">

        @foreach($publication as $item)
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="images/publications/{{ $item->image }}" class="img-fluid" alt="image">
              </div>
              <div class="member-info">
                <h4>{{$item->name}}</h4>
                <span>{{$item->title}}</span>
                <p>{{$item->publisher}}</p>
                <p>{{$item->year}}</p>
                <p><a href=" ../documents/publications/{{ $item->attachment }}" download><i class="fa fa-download"></i>Download</a></p>
              </div>
            </div>
          </div><!-- End publication -->
        @endforeach
          @else
          <p>No publications yet</p>
          @endif

</div>
 
</section>
  </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('website.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('website.scripts')

</body>

</html>
























