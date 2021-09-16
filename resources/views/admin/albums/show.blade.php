@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Album ID: {{ $album->id }}</div>
                    <div class="card-body">
                        <style>
                            #photo {

                                max-width: 250px;
                                height: 150px;
                                /*background-color: powderblue;*/
                                border-radius: 5%;
                            }
                        </style>


                        <h1 style="text-transform:capitalize">{{$album->name}} Album</h1>

                        <a href="{{ url('/admin/albums') }}" title="Back" style="text-decoration:none">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>

                        <a class="btn btn-success btn-sm" href="/admin/photos/create/{{$album->id}}"
                           title="Upload Photos">
                            <i class="fa fa-plus" aria-hidden="true"></i> Upload Photos</a>
                        <hr>

                        @if(count($album->photos) >0 )

                            <div id="photos">
                                <div class="row text-center">
                                    @foreach($album->photos as $photo)

                                        <div class="col-md-3">
                                            <a href="/admin/photos/{{$photo->id}}">
                                                <img id="photo" class="thumbnail"
                                                     src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"
                                                     alt="{{$photo->title}}">
                                            </a>
                                            <br>
                                            <h4>{{$photo->title}}</h4>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <p style="font-style:italic">{{$album->name}}</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
