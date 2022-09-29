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
    <label for="fname" class="control-label">{{ 'First Name:' }}</label>
    <input class="form-control @error('fname') is-invalid @enderror" value="{{old('fname')}}" name="fname" type="text" id="fname" value="{{ isset($farmer->fname) ? $farmer->fname : ''}}" >
    @error('fname')
        <div class="invalid-feedback text-sm alert">
            {{ $message }}
        </div>
        @enderror
</div>

<div class="form-group">
    <label for="lname" class="control-label">{{ 'Last Name:' }}</label>
    <input class="form-control @error('lname') is-invalid @enderror" value="{{old('lname')}}" name="lname" type="text" id="lname" value="{{ isset($farmer->lname) ? $farmer->lname : ''}}" >
  
</div>

<div class="form-group">
    <label for="gender" class="control-label">{{ 'Gender:' }}</label>
    <input class="form-control @error('gender') is-invalid @enderror" value="{{old('gender')}}" name="gender" type="text" id="gender" value="{{ isset($farmer->gender) ? $farmer->gender : ''}}" >
  
</div>

<div class="form-group">
    <label for="ownerid" class="control-label">{{ 'Email:' }}</label>
    <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" type="text" id="email" value="{{ isset($farm->email) ? $farm->email : ''}}" >
  
</div>

<div class="form-group">
    <label for="ownerid" class="control-label">{{ 'Telephone:' }}</label>
    <input class="form-control @error('telephone') is-invalid @enderror" value="{{old('telephone')}}" name="telephone" type="text" id="telephone" value="{{ isset($farm->telephone) ? $farm->telephone : ''}}" >
  
</div>

<div class="form-group">
    <label for="ownerid" class="control-label">{{ 'Password:' }}</label>
    <input class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="ownerId" type="text" id="password" value="{{ isset($farm->ownerid) ? $farm->ownerid : ''}}" >
  
</div>
<div class="form-group">
    <label for="description" class="control-label">{{ 'Address:' }}</label>
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
