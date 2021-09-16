@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Upload Photo(s)</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/albums/'.$album_id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!!Form::open(['action' => 'App\Http\Controllers\Admin\PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                            {{ csrf_field() }}

                            @include ('admin.photos.form', ['formMode' => 'create'])
                        {{Form::hidden('album_id', $album_id)}}

                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


