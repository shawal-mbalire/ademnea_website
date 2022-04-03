<style>
  .image1{
    width: 15vw;
    height: 15vh;
    border-radius: 25px;
  }

  /*.box{*/
  /*  border: none;*/
  /*}*/

  .container1{
    text-align: center;
  }

  .space{
    width: 10px;
  }
</style>

<section id="gallery" class="gallery">
  <div class="container">
      <div class="section-title">
        <h2>Gallery</h2>
      </div>

  <div class="container1 d-lg-flex justify-content-center">
  @foreach($gallery as $item)

  <div>

  <div class="title">
    <h5 class="card-title">{{$item -> title}}</h5>
  </div>

  <div class="box">
  <img
      src="{{asset('image/' . explode('|', $item->image)[0])}}"  alt="gallery description" class="image1"
      >
  </div>
  <a href="/gallery">View Album</a>
  </div>

  <div class="space"></div>
  <br>
@endforeach

<!-- close container1 -->
</div>
</div>
</section>
