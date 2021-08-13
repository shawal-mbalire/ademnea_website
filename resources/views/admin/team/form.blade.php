<div class="form-group">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" type="text" id="name" value="{{ isset($team->name) ? $team->name : ''}}" >
    @error('name')
        <div class="invalid-feedback text-sm alert">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" type="text" id="title" value="{{ isset($team->title) ? $team->title : ''}}" >
    @error('title')
        <div class="invalid-feedback text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="description" class="control-label">{{ 'Research Interests' }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" rows="5" name="description" type="textarea" id="description" >{{ isset($team->description) ? $team->description : ''}}</textarea>
    @error('description')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="image" class="control-label">{{ 'Image' }}(jpg, peg & png only allowed)</label>
    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image">
    @error('image')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
