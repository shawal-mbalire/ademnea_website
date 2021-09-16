<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Album Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($album->name) ? $album->name : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Album Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="longText" id="description" >{{ isset($album->description) ? $album->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Cover Image' }}</label>
    <input class="form-control" name="cover_image" type="file" id="image" value="{{ isset($album->cover_image) ? $album->cover_image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    {{--    <input class="form-control" name="images[]" type="file" id="image" value="{{ isset($gallery->image) ? $gallery->image : ''}}" multiple>--}}
    {{--    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}--}}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
