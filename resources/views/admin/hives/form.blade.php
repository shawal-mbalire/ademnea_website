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
    <label for="latitude" class="control-label">{{ 'Latitude:' }}</label>
    <input class="form-control @error('latitude') is-invalid @enderror" value="{{old('latitude')}}" name="latitude" type="text" id="latitude" value="{{ isset($hive->latitude) ? $hive->latitude : ''}}" >
    @error('latitude')
        <div class="invalid-feedback text-sm alert">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="longitude" class="control-label">{{ 'Longitude:' }}</label>
    <input class="form-control @error('longitude') is-invalid @enderror" value="{{old('longitude')}}" name="longitude" type="text" id="longitude" value="{{ isset($hive->longitude) ? $hive->longitude : ''}}" >
  
</div>
<div class="form-group">
    <input value="{{old('farm_id')}}" name="farm_id" type="hidden" value="1" >
  
</div>

<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Save' }}">
</div>
