<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        {{-- <h1 class="logo me-auto"><a href="/">AdEMNEA</a></h1> --}}
        <img class="logo me-auto" src="{{asset('dash/logo2.png')}}" alt="AdEMNEA">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li class="dropdown"><a href="#"><span>Work Packages</span> <i class="bi bi-chevron-down"></i></a>
                    
                        
                    
                    <ul>
                        @foreach ($workpackages as $workpackage)
                        <li><a href="#">{{ $workpackage->abbreviation }}</a></li>
                        @endforeach
                    </ul>
                    
                </li>
                <li class="dropdown"><a href="#"><span>Scholarships</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Masters</a></li>
                        <li><a href="#">PhD</a></li>
                    </ul>
                </li>

                <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="/displaynewsletter">Newsletters</a></li>
                <li><a class="nav-link scrollto" href="/displaypublication">Publications</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="nav-link scrollto" href="login">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
