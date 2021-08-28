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

    <!-- ======= Hero Section ======= -->
    {{-- @include('website.hero_section') --}}
    <!-- End Hero -->

    <main id="main">
        <div class="carousel-inner" role="listbox">
        
        
        <!-- Slide 1 -->
        <div class="carousel-item active">
           <div class="carousel-container">
               <div class="container">
                   @foreach ($workpackages as $workpackage)
                   <h2 class="animate__animated animate__fadeInDown text-center">{{ $workpackage->name }}</h2>
                   <p class="animate__animated animate__fadeInUp text-center">
                       {{ $workpackage->description }}
                   </p>
                   @endforeach 
                  <!-- <a href="#featured_services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                       More</a>-->       
               </div>
           </div>
       </div>
                  
       </div>
       <div class="container">
        <div class="card card-default"> 
                <div class="card-header"><h2 class="text-center">AdeMNEA WORKPACKAGES</h2></div>
                    <div class="card body">
                        <table class="table">
                            <thead>
                                <th>Work Package</th>
                                <th>Task</th>
                                <th>Team Leader</th>
                                 <th>Description</th> 
                                <th>Partners</th>
                                <th>Delivarables</th>
                            </thead>
                            <tbody>
                                @foreach($workpackages as $item)
                                <tr>
                                    <td rowspan="{{ $tasks->count() }}">{{$item -> abbreviation}}</td>
                                    
                                    <td>
                                    @foreach ($tasks as $task)
                                    @if($task->work_package_id === $item->id)
                                        <tr>
                                            <td>{{ $task->id }}.{{ $task->name }}</td>
                                            <td>{{ $task->team_leader }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->partners }}</td>
                                            <td>{{ $task->deliverables }}</td>
                                        </tr>
                                        @endif
                                    @endforeach 
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
        </div>

</section>

        <!-- ======= Featured Services Section ======= -->
        @include('website.featured_services')
        <!-- End Featured Services Section -->
 
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('website.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('website.scripts')

</body>

</html>
