<style>
  .image1{
    width: 25rem;
    height: 25rem;
    border-radius: 5px;
    border-color: white;
    border-style: solid;
      border-width: 10px;
  }

  /*.box{*/
  /*  border: none;*/
  /*}*/

  .container1{
    text-align: center;

    display: flex;
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

  <div class="container1">
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
