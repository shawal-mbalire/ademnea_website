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
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($tasm->name) ? $task->name : ''}}" required >
       {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('team_leader') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Team Leader' }}</label>
    <input class="form-control" name="team_leader" type="text" id="team_leader" value="{{ isset($task->team_leader) ? $task->team_leader : ''}}" required >
       {!! $errors->first('team_leader', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('work_package_id') ? 'has-error' : ''}}" hidden>
    <label for="work_package_id" class="control-label">{{ 'Work Package ID' }}</label>
    <input class="form-control" name="work_package_id" type="text" id="work_package_id" value="{{$workpackage->id}}" required>
    {!! $errors->first('work_package_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <label for="duration" class="control-label">{{ 'Duration' }}</label>
    <input class="form-control" name="duration" type="text" id="duration" value="{{ isset($tast->duration) ? $task->duration : ''}}" required>
    {!! $errors->first('abbreviation', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($task->description) ? $task->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('partners') ? 'has-error' : ''}}">
    <label for="partners" class="control-label">{{ 'Partners' }}</label>
    <textarea class="form-control" rows="5" name="partners" type="textarea" id="partners" required>{{ isset($task->partners) ? $task->partners : ''}}</textarea>
    {!! $errors->first('partners', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('potential_innovations') ? 'has-error' : ''}}">
    <label for="potential_innovations" class="control-label">{{ 'Potential Innovations' }}</label>
    <textarea class="form-control" rows="5" name="potential_innovations" type="textarea" id="potential_innovations" required>{{ isset($task->potential_innovations) ? $task->potential_innovations : ''}}</textarea>
    {!! $errors->first('potential_innovations', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('deliverables') ? 'has-error' : ''}}">
    <label for="deliverables" class="control-label">{{ 'Deliverables' }}</label>
    <textarea class="form-control" rows="5" name="deliverables" type="textarea" id="deliverables" required>{{ isset($task->deliverabls) ? $task->deliverables : ''}}</textarea>
    {!! $errors->first('deliverables', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('interdependence') ? 'has-error' : ''}}">
    <label for="interdependence" class="control-label">{{ 'Interdependence' }}</label>
    <textarea class="form-control" rows="5" name="interdependence" type="textarea" id="interdependence" required>{{ isset($task->interdependence) ? $task->interdependence : ''}}</textarea>
    {!! $errors->first('interdependence', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('resource_requirements') ? 'has-error' : ''}}">
    <label for="resource_requirements" class="control-label">{{ 'Resource requirements' }}</label>
    <textarea class="form-control" rows="5" name="resource_requirements" type="textarea" id="resource_requirements" required>{{ isset($task->resource_requirements) ? $task->resource_requirements : ''}}</textarea>
    {!! $errors->first('resource_requirements', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'deliverables' );
CKEDITOR.replace( 'description' );
CKEDITOR.replace( 'description' );
</script>