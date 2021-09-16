@extends('layouts.app')

@section('content')

    <style>
        #photo {

            max-width: 280px;
            height: 180px;
            /*background-color: powderblue;*/
            border-radius: 5%;
        }
    </style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Photo ID: {{ $photo->id }}</div>
                    <div class="card-body">

<h3>{{$photo->title}}</h3>
<p><label>{{'Description:'}}</label><i>{{' '}}{{$photo->description}}</i></p>
                        <a href="{{ url('admin/albums/'.$photo->album_id) }}" title="Back" style="text-decoration:none">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
<hr>
<img id="photo" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
     <br><br>
{!! Form::open(['action' => ['App\Http\Controllers\Admin\PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete Photo', ['class' => 'button alert']) }}
{!! Form::close() !!}
<hr>


                        <button type="button" onclick="zoomIn()">
                            Zoom-In
                        </button>

                        <button type="button" onclick="zoomOut()">
                            Zoom-Out
                        </button>

                        <hr>
<small>Size: {{$photo->size}}{{' KB'}}</small>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function zoomIn() {
            let GFG = document.getElementById("zoom");
            let currWidth = GFG.clientWidth;
            GFG.style.width = (currWidth + 100) + "px";
        }

        function zoomOut() {
            let GFG = document.getElementById("zoom");
            let currWidth = GFG.clientWidth;
            GFG.style.width = (currWidth - 100) + "px";
        }
    </script>
@endsection
