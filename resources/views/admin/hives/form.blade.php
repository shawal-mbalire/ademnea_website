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
    <label for="longitude" class="control-label">{{ 'Longitude:' }}</label>
    <input class="form-control @error('name') is-invalid @enderror" value="{{old('longitude')}}" name="longitude" type="text" id="longitude" value="{{ isset($hive->longitude) ? $hive->longitude : ''}}" >
    @error('longitude')
        <div class="invalid-feedback text-sm alert">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="latitude" class="control-label">{{ 'Latitude:' }}</label>
    <input class="form-control @error('latitude') is-invalid @enderror" value="{{old('latitude')}}" name="latitude" type="text" id="latitude" value="{{ isset($hive->latitude) ? $hive->latitude : ''}}" >
  
</div>
{{-- <div class="form-group">
    <label for="description" class="control-label">{{ 'Adress:' }}</label>
    <textarea class="form-control @error('adress') is-invalid @enderror" value="{{old('adress')}}" rows="5" name="address" type="textarea" id="description" >{{ isset($farm->adress) ? $farm->adress : ''}}</textarea>
    @error('adress')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div> --}}

{{-- <div class="form-group">
    <label for="district" class="control-label">{{ 'District:' }}</label>
    <select name="district">
          <option value="Masaka">Masaka</option>
    </select>
   
</div> --}}

<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Save' }}">
</div>
