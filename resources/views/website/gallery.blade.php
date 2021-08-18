<style>
#displayImage{
    height: 500px;
    width: 500px;
    border-color: white;
}
</style>

<section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2>Gallery</h2>
        </div>

        @if($gallery->count())
            <div class="row">
                @foreach($gallery as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{asset('gallery/' .$item->image_url)}}" alt="No image">
                            <span>{{$item->title}}</span>
                            <p>{{$item->description}}</p>

                        </div>
                    </div>
                @endforeach
                @else
                    <p style="text-align:center; font-style: italic; color:grey;">[Gallery will be updated soon!]</p>
                @endif

            </div>
        </div>

{{--        @foreach($gallery as $item)--}}
{{--        <div>--}}
{{--            {{$item -> title}}--}}
{{--        </div>--}}

{{--        <div>--}}
{{--        <img src="{{asset('images/' . $item->image)}}" alt="" id="displayImage">--}}
{{--        </div>--}}

{{--        <div>--}}
{{--        {{$item -> description}}--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <br>--}}

{{--        @endforeach--}}
{{--        </div>--}}

    </div>
</section>
