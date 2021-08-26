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

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($publication->name) ? $publication->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($publication->title) ? $publication->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('publisher') ? 'has-error' : ''}}">
    <label for="publisher" class="control-label">{{ 'Publisher' }}</label>
    <input class="form-control" name="publisher" type="text" id="publisher" value="{{ isset($publication->publisher) ? $publication->publisher : ''}}" required>
    {!! $errors->first('publisher', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year of Publication' }}</label>
    <input class="form-control" name="year" type="text" id="datepicker" value="{{ isset($publication->year) ? $publication->year : ''}}" required>
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">
    <label for="attachment" class="control-label">{{ 'Attachment' }}(only pdf allowed)</label>
    <input class="form-control pdf_file" name="attachment" type="file" id="attachment" value="{{ isset($publication->attachment) ? $publication->attachment : ''}}" required>
    {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<script>
    $(function(){
        $("#datepicker").datepicker({dateFormat: 'yyyy'});
    });
</script>
