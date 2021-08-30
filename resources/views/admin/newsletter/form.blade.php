<style>
    .button1{
        background-color: lightseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button2{
        background-color: mediumseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button3{
        background-color: seagreen;
        color: white;
        height: 34px;
        width: 85px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button4{
        background-color: lightseagreen;
        color: white;
        height: 40px;
        width: 100px;
        border-radius: 5px;
        border-color: lightseagreen;
        shadow: none;
        font-weight: bold
    }
</style>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($newsletter->title) ? $newsletter->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($newsletter->description) ? $newsletter->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
<label for="image" class="control-label">{{ 'Image' }}( only jpg, peg & png allowed)</label>
    <input class="form-control image_file"  name="image" type="file" id="image" value="{{ isset($newsletter->image) ? $newsletter->image : ''}}" required>
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group  {{ $errors->has('attachment') ? 'has-error' : ''}}">

    <label for="attachment" class="control-label">{{ 'Attachment' }}(only pdf allowed)</label>
    <input class="form-control pdf_file @error('attachment') is-invalid @enderror" name="attachment" type="file" id="attachment" value="{{ isset($newsletter->attachment) ? $newsletter->attachment : ''}}" required>
    @error('attachment')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>


<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>


