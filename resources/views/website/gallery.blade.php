<style>
#displayImage{
    height: 500px;
    width: 500px;
    border-color: white;
}
</style>

<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });

    });
</script>

{{--<style>--}}
{{--    #owl-demo .item {--}}
{{--        margin: 3px;--}}
{{--    }--}}

{{--    #owl-demo .item img {--}}
{{--        display: block;--}}
{{--        width: 100%;--}}
{{--        height: auto;--}}
{{--    }--}}
{{--</style>--}}

<section id="gallery" class="gallery">
    <div class="container">

        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        @if($gallery->count())
            <div class="row">
                <div class="clients-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">
                @foreach($gallery as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


                                <div class="member">
                                    <style>
                                        img {
                                            border-radius: 8px;
                                        }
                                    </style>
                                    <figure><div id="owl-demo">
                                        <img src="{{asset('gallery/' .$item->image_url)}}" alt="No image">
                                        <figcaption
                                            style="text-align:center; font-color:grey; font-style:italic">{{$item->title}}
                                        </figcaption> </div>
                                    </figure>

                            </div>
                    </div>
                @endforeach
                    </div>
                </div>
                @else
                    <p style="text-align:center; font-style: italic; color:grey;">[Gallery will be updated soon!]</p>
                @endif

            </div>
    </div>
</section>
