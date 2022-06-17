<style>
  .image1{
    width: 30vw;
    height: 30vh;
  }
  .image2{
    margin:20px;
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

  <div class="row no-gutters">
  @foreach($gallery as $item)

  <div class="col-lg-4 col-md-6 col-sm-12 image2">

  <div class="title">
    <h5 class="card-title">{{$item -> title}}</h5>
  </div>

  <div class="box">
  <img
      src="{{asset('image/' . explode('|', $item->image)[0])}}"  alt="gallery description" class="w-100 shadow-1-strong rounded mb-4"
      >
  </div>
  <a href="/gallery">View Album</a>
  </div>
  <br>
@endforeach

<!-- close container1 -->
</div>
</div>
</section>
