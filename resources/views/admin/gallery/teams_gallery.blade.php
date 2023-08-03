<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>gallery - ademnea</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
 
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
     {{-- links for the contact section --}}
     
     <!-- Libraries Stylesheet -->
     <link href="lib/animate/animate.min.css" rel="stylesheet">
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
 
     <!-- Customized Bootstrap Stylesheet -->
     {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
 
     <!-- Template Stylesheet -->
     <link href="css/style.css" rel="stylesheet">
 
     {{-- online bootstrap --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            
</head>
<body>
    
    <div class="container">
        <div class="container-xxl py-5">
            <div class="container">
                <h3>Gallery</h3>
                  <svg style="width: 1.5rem; height: 1.5rem; color:green;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="font-size: 3px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                  </svg>                
                <h4>Team</h4><br>
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    
    @foreach ($teams as $team)
        
                     <div class="row">
                        <div class="col-md-6">
                          <!-- Content for the first column goes here -->
                          <div id="carouselExampleIndicators" class="carousel slide">
        
                            <div class="carousel-inner">
        
                                    <div class="carousel-item active">
                                    <a href="{{ asset('images/' . $team->image_path) }}" target="_blank">
                                      <img src="{{ asset('images/' . $team->image_path) }}" class="d-block" style="height:500px; width:600px;" alt="...">
                                    </a>
                                    </div>
                            </div>
                          </div>  
                        </div>
                        {{-- end of first column --}}
                        <div class="col-md-6">
    
                          <!-- Content for the second column goes here -->
                          <h4>
                              <svg style="width: 1.5rem; height: 1.5rem; color:blue;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                              </svg>
                            {{$team->name}}</h4>
                            <br>
    
                             <h4>
                                Title: 
                                  <span class="badge bg-success">{{$team->title}}</span></h4>
                              <br>
    
                              {{-- <h4>
                                 role: 
                                  
                               {{$team->role}}</h4>
                              <br> --}}
    
                              <p>
                                <h4>Research Interests</h4>
                                <svg style="width: 1.5rem; height: 1.5rem; color:red;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                  </svg>
                                  
                                  {!! preg_replace('/\r\n|\r|\n/', '<br>', $team->description) !!}</p>
                        </div>
                      </div>
                      <br><br>
        @endforeach             
    
                </div>
            </div>
        </div>
        <!-- upcoming end-->
            
    </div>

</body>
</html>