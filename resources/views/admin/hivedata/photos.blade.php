@extends('layouts.app')

@section('content')


@php
  $hive_id = session('hive_id');
@endphp


@include('datanavbar')

<link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
<div class="container mx-auto px-4 relative">
    <div class="alime-portfolio-area">
        <div class="container mx-auto px-10 md:px-5 lg:px-5 sm:px-5">
            <div class="row alime-portfolio relative">
                @foreach($photos as $photo)
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item {{$photo->category}} mb-30 wow fadeInUp" data-wow-delay="{{$loop->index * 200}}ms">
                    <div class="single-portfolio-content relative">
                        <a href="{{ URL("hiveimage/" . $photo->path) }}" data-lightbox="hive-images" data-title="{{ $photo->name ?? 'Hive Image' }}">
                            <img class="w-full transition-transform duration-500 transform hover:scale-125" src="{{ URL("hiveimage/" . $photo->path) }}" alt="{{ $photo->name ?? 'Hive Image' }}">
                            <button title="Previous" type="button" class="mfp-arrow mfp-arrow-left mfp-prevent-close absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-4 py-2 rounded-l-md focus:outline-none"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
    <button title="Next" type="button" class="mfp-arrow mfp-arrow-right mfp-prevent-close absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-4 py-2 rounded-r-md focus:outline-none"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    
</div>

{{-- <script src="{{ asset('js/lightbox-plus-jquery.js') }}"></script> --}}
<script>
    
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });

    
    document.querySelector('.mfp-arrow-left').addEventListener('click', function() {
        lightbox.prev(); 
    });

    document.querySelector('.mfp-arrow-right').addEventListener('click', function() {
        lightbox.next();   
    });
</script>
@endsection
@section('page_scripts')

@endsection
