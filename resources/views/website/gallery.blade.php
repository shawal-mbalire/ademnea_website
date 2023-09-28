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
  
  .card {
  background-color: white;
  border-radius: 30px;
  height: auto;
}

.card .card-body {
  background-color: white;
}

.card .card-title {
  font-size: 20px;
  font-weight: bold;
}

.card .card-text {
  font-size: 16px;
}

.card .btn {
  background-color: #5cb874;
  border-color: #5cb874;
}

</style>

<section id="gallery" class="gallery">
  <div class="container">
      <div class="section-title">
        <h2>Gallery</h2>
      </div>

  {{-- <div class="row no-gutters"><!-- changed to cards-->
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
</div> --}}
<div class="row no-gutters">
  @foreach($gallery as $item)
      <div class="col-lg-4 col-md-6 col-sm-12 image2">
          <div class="card">
              <img src="{{ asset('image/' . explode('|', $item->image)[0]) }}" alt="gallery description" class="card-img-top">
              <div class="card-body">
                  <h5 class="card-title">{{ $item->title }}</h5>
                  <a href="/gallery" class="btn btn-primary">View Album</a>
              </div>
          </div>
      </div>
  @endforeach
</div>

</div>
</section>
