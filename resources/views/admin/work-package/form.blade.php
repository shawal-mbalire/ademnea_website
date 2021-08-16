<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($workpackage->name) ? $workpackage->name : ''}}" required >
       {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('abbreviation') ? 'has-error' : ''}}">
    <label for="abbreviation" class="control-label">{{ 'Abbreviation' }}</label>
    <input class="form-control" name="abbreviation" type="text" id="abbreviation" value="{{ isset($workpackage->abbreviation) ? $workpackage->abbreviation : ''}}" required>
    {!! $errors->first('abbreviation', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ isset($workpackage->description) ? $workpackage->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('task') ? 'has-error' : ''}}">
    <label for="task" class="control-label">{{ 'Tasks' }}</label>
    <textarea class="form-control" rows="5" name="task" type="textarea" id="task" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('task', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('partners') ? 'has-error' : ''}}">
    <label for="partners" class="control-label">{{ 'Partners' }}</label>
    <textarea class="form-control" rows="5" name="partners" type="textarea" id="partners" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('partners', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('deliverables') ? 'has-error' : ''}}">
    <label for="deliverables" class="control-label">{{ 'Deliverables' }}</label>
    <textarea class="form-control" rows="5" name="deliverables" type="textarea" id="deliverable" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('deliverables', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('interdependances') ? 'has-error' : ''}}">
    <label for="interdependances" class="control-label">{{ 'Interdependances' }}</label>
    <textarea class="form-control" rows="5" name="interdependances" type="textarea" id="interdependances" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('interdependances', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('potential_innovetions') ? 'has-error' : ''}}">
    <label for="potential_innovetion" class="control-label">{{ 'Potential_innovetions' }}</label>
    <textarea class="form-control" rows="5" name="potential_innovetions" type="textarea" id="potential_innovetions" required>{{ isset($workpackage->purpose) ? $workpackage->purpose : ''}}</textarea>
    {!! $errors->first('potential_innovetions', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('activity') ? 'has-error' : ''}}">
    <label for="activity" class="control-label">{{ 'Attach activity' }}</label>
    <input class="form-control" name="activity" type="file" id="activity" value="{{ isset($workpackage->activity) ? $workpackage->activity : ''}}" required>
    {!! $errors->first('activity', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
