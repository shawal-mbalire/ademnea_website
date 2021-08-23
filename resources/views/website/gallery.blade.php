<section id="gallery" class="gallery">
    <div class="container">
      <div class="section-title">
        <h2>Gallery</h2>
      </div>
  
  <div class="row p-3">
  @foreach($gallery as $item)
  <div class="card col-sm-11 p-3 m-3 bg-success" style="width: 18rem; height: 30rem">
      <img src="{{asset('image/' . explode('|', $item->image)[0])}}" class="card-img-top w-100 h-50" alt="gallery description">
  <div class="card-body bg-light">
    <h5 class="card-title">{{$item -> title}}</h5>
    <p class="card-text">{{$item -> description}}</p>
    <a href="/gallery" class="btn btn-success">Full gallery</a>
  </div>
</div>
@endforeach
</div>    
</div>
</div>
</section>
