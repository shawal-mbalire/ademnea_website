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

    {{-- bootstrap online --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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

    <h2>AdeMNEA Gallery And Events</h2>
<br>
        {{-- event cards begin here --}}
 
 <div class="row">
        @if($events->count())
 @foreach ($events as $event)
              
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                          {{-- send this to backend for the gallery viewing--}}
                            <a href="/gallery_view?id={{$event[0]->id}}" style=" 
                                text-decoration: none !important;
                                color: black;">

                            @if (count($event) > 0)

                            {{-- <img src="{{ asset('images/events/' . $photo->photo) }}" alt="Project Photo"> --}}
                            
                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                       
                                    @foreach ($event as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                      <img src="{{ asset('images/events/' . $photo->photo_url) }}" class="card-img-top" alt="...">
                                    </div>
                                   @endforeach

                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Next</span>
                                        </button>
                                      </div>

                         
                            @else
                            <p>No photos available for this event.</p>
                            @endif

                            {{-- <img class="img-fluid" src="images/events/{{ $event->photo }}" alt=""> --}}

                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                        </div>
                        <div class="text-center p-4">
                        <h5 class="mb-0">

                                <svg style="width: 1.5rem; height: 1.5rem; color:green;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                  </svg>
                              
                            {{ $event[0]->venue }}</h5>
                            <hr>
                        <h5 class="mb-0">{{ $event[0]->title }}</h5>

                            {{-- <small>{{ $event->description }}</small> --}}

                            <span class="collapsed-text">
                                <!-- Display only one line of text -->
                               {{ \Illuminate\Support\Str::words($event[0]->description, $words = 10, $end = '....') }}
                             </span>
            
                            <a class="" data-bs-toggle="modal" data-bs-target="#{{ $event[0]->id }}" style="cursor:pointer;">
                                More <i class="fas fa-chevron-down"></i>
                            </a>

                        <!-- Modal -->
                <div class="modal fade" id="{{ $event[0]->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $event[0]->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- {{ $team->bio }} --}}
                       <small> {!! preg_replace('/\r\n|\r|\n/', '<br>', $event[0]->description) !!}</small>
                        </div>
                        <div class="modal-footer">
                        <a href="http://{{$event[0]->article_link}}" style="cursor:pointer;" class="text-primary" >Click Here </a> to read the article
                        </div>
                    </div>
                    </div>
                </div>
          {{-- end bio popup --}}

                        </a>
                        </div>
                    </div>
                </div>
        @endforeach
          @else
          <p>No events yet</p>
          @endif

</div>
</div>
 
</section>
  </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('website.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('website.scripts')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
