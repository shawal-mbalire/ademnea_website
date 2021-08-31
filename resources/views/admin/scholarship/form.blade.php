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

<div class="form-group">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <select class="form-select @error('category') is-invalid @enderror" value="{{old('category')}}" name="category" id="category" value="{{ isset($scholarship->category) ? $scholarship->category : ''}}">
  <option value="masters">Masters</option>
  <option value="phd">Phd</option>
</select>
    @error('category')
        <div class="invalid-feedback text-sm">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="task" class="control-label">{{ 'Work Package' }}</label>
    <input class="form-control @error('task') is-invalid @enderror" value="{{old('task')}}" name="task" type="text" id="task" value="{{ isset($scholarship->task) ? $scholarship->task : ''}}" >
    @error('task')
        <div class="invalid-feedback text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="topic" class="control-label">{{ 'Topic' }}</label>
    <input class="form-control @error('topic') is-invalid @enderror" value="{{old('topic')}}" name="topic" type="text" id="topic" value="{{ isset($scholarship->topic) ? $scholarship->topic : ''}}" >
    @error('topic')
        <div class="invalid-feedback text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="deliverables" class="control-label">{{ 'Deliverables' }}</label>
    <textarea class="form-control @error('deliverables') is-invalid @enderror" rows="5" name="deliverables" type="textarea" id="deliverables" >{{old('deliverables')}}{{ isset($scholarship->deliverables) ? $scholarship->deliverables : ''}}</textarea>
    @error('deliverables')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="competence" class="control-label">{{ 'Competence' }}</label>
    <input class="form-control @error('competence') is-invalid @enderror" value="{{old('competence')}}" name="competence" type="text" id="competence" value="{{ isset($scholarship->competence) ? $scholarship->competence : ''}}" >
    @error('competence')
        <div class="invalid-feedback text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="instructions" class="control-label">{{ 'Instructions' }}</label>
    <textarea class="form-control @error('instructions') is-invalid @enderror" rows="5" name="instructions" type="textarea" id="instructions" >{{old('instructions')}}{{ isset($scholarship->instructions) ? $scholarship->instructions : ''}}</textarea>
    @error('instructions')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="positions" class="control-label">{{ 'Number Of Positions' }}</label>
    <input class="form-control @error('positions') is-invalid @enderror" value="{{old('positions')}}" name="positions" type="number" id="positions" value="{{ isset($scholarship->positions) ? $scholarship->positions : ''}}" >
    @error('positions')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
