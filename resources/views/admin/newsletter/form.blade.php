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
    <label for="title" class="control-label">{{ 'Article Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($newsletter->title) ? $newsletter->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Article description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($newsletter->description) ? $newsletter->description : ''}}" required>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="article" class="control-label">{{ 'Work Package Details' }}</label>
    <textarea class="form-control @error('article') is-invalid @enderror" rows="5" name="article" type="textarea" id="article" >{{old('article')}}{{ isset($newsletter->article) ? $newsletter->article : ''}}</textarea>
    @error('article')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>


<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    
 CKEDITOR.replace('article', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        "extraPlugins" : 'imagebrowser',
		"imageBrowser_listUrl" : "/images_list.json"
    })
</script>
