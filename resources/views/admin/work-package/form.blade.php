<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($workpackage->name) ? $workpackage->name : ''}}" required >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('abbreviation') ? 'has-error' : ''}}">
    <label for="abbreviation" class="control-label">{{ 'Abbreviation' }}</label>
    <input class="form-control" name="abbreviation" type="text" id="abbreviation" value="{{ isset($workpackage->abbreviation) ? $workpackage->abbreviation : ''}}" required >
    {!! $errors->first('abbreviation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
    <label for="purpose" class="control-label">{{ 'Purpose' }}</label>
    <textarea class="form-control" rows="5" name="purpose" type="textarea" id="purpose" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('purpose', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($workpackage->description) ? $workpackage->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
