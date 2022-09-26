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
    <label for="name" class="control-label">{{ 'Farm Name:' }}</label>
    <input class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" type="text" id="name" value="{{ isset($farm->name) ? $farm->name : ''}}" >
    @error('farmname')
        <div class="invalid-feedback text-sm alert">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="ownerid" class="control-label">{{ 'Farm Owner:' }}</label>
    <input class="form-control @error('ownerId') is-invalid @enderror" value="{{old('ownerId')}}" name="ownerId" type="text" id="ownerId" value="{{ isset($farm->ownerid) ? $farm->ownerid : ''}}" >
  
</div>
<div class="form-group">
    <label for="description" class="control-label">{{ 'Adress:' }}</label>
    <textarea class="form-control @error('adress') is-invalid @enderror" value="{{old('adress')}}" rows="5" name="address" type="textarea" id="description" >{{ isset($farm->adress) ? $farm->adress : ''}}</textarea>
    @error('adress')
        <div class="invalid-feedback mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
</div>
<div class="form-group">
    <label for="district" class="control-label">{{ 'District:' }}</label>
    <select name="district">
          <option value="Masaka">Masaka</option>
    </select>
   
</div>

<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Save' }}">
</div>
