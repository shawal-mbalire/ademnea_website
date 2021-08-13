<style>
#displayImage{
    height: 500px;
    width: 500px;
    border-color: white;
}
</style>

<section id="gallery" class="gallery">
    <div class="container">

        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        
        @foreach($gallery as $item)
        <div>
        {{$item -> title}}
        </div>

        <div>
        <img src="{{asset('images/' . $item->image)}}" alt="" id="displayImage">
        </div>

        <div>
        {{$item -> description}}
        </div>
        <br>
        <br>
        
        @endforeach
        </div>

    </div>
</section>
