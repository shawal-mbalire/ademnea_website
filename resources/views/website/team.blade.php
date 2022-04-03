<style>
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
 <!-- ======= Team Section ======= -->
 <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>AdEMNEA research team and their profiles</p>
        </div>

        @if($teams->count())
        <div class="row gy-5">

        @foreach($teams as $team)
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="{{asset('images/' . $team->image_path)}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>{{$team->name}}</h4>
                <span>{{$team->title}}</span>
                <p>{{$team->description}}</p>
              </div>
            </div>
          </div><!-- End Team Member -->
          @endforeach
            @else
             <p>There are no teams</p>
             @endif
        </div>

      </div>
    </section><!-- End Team Section -->















<!-- <section id="team" class="team section-bg">
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
</section> -->

                     