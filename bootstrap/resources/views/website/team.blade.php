<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Team</h2>
        </div>
        @if($teams->count())
        <div class="row">
        @foreach($teams as $team)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <img src="{{asset('images/' . $team->image_path)}}" alt="">
                    <h4>{{$team->name}}</h4>
                    <span>{{$team->title}}</span>
                    <p>{{$team->description}}</p>
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
             <p>There are no posts</p>
             @endif
        </div>

    </div>
</section>

                     