<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($publication->name) ? $publication->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($publication->title) ? $publication->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('publisher') ? 'has-error' : ''}}">
    <label for="publisher" class="control-label">{{ 'Publisher' }}</label>
    <input class="form-control" name="publisher" type="text" id="publisher" value="{{ isset($publication->publisher) ? $publication->publisher : ''}}" >
    {!! $errors->first('publisher', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">
    <label for="attachment" class="control-label">{{ 'Attachment' }}</label>
    <input class="form-control" name="attachment" type="file" id="attachment" value="{{ isset($publication->attachment) ? $publication->attachment : ''}}" >
    {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
