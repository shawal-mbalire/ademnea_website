<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Photo(s) Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($photo->title) ? $photo->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Photo(s) Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="longText" id="description" >{{ isset($photo->description) ? $photo->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo(s)' }}</label>
    <input class="form-control" name="photo[]" type="file" id="image" value="{{ isset($photo->photo) ? $photo->photo : ''}}" multiple>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
{{--        <input class="form-control" name="photo[]" type="file" id="photo" value="{{ isset($photo->photo) ? $photo->photo : ''}}" multiple>--}}
{{--        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}--}}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>





{{--<p>Upload Photo</p>--}}
{{--{!!Form::open(['action' => 'App\Http\Controllers\Admin\PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}--}}
{{--{{Form::text('title', '', ['placeholder' => 'Photo Title'])}}--}}
{{--{{Form::textarea('description', '',['placeholder' => 'Photo Description'])}}--}}
{{--{{Form::hidden('album_id', $album_id)}}--}}
{{--{{Form::file('photo')}}--}}
{{--{{Form::submit('submit')}}--}}
{{--{!!Form::close()!!}--}}
