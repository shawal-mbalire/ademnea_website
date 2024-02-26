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

{{-- farmer selection dropdown starts here --}}
<div class="form-group">
    <label for="ownerid" class="control-label">{{ 'Farm Owner:' }}</label>
       <select name="farmer" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
        {{-- we will use a loop from the database here --}}
        @foreach ($farmers as $farmer )  
        <option value= "{{ $farmer->id }}"> {{ $farmer->fname }} </option>
        @endforeach
       </select>
</div>
{{-- farm owner dropdown stops here. --}}

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
          <option value="Select a district">Select a district</option>
          <option value="Abim">Abim</option>
          <option value="Adjumani">Adjumani</option>
          <option value="Agago">Agago</option>
          <option value="Amolatar">Amolatar</option>
          <option value="Amudat">Amudat</option>
          <option value="Amuru">Amuru</option>
          <option value="Apac">Apac</option>
          <option value="Arua">Arua</option>
          <option value="Budaka">Budaka</option>
          <option value="Bududa">Bududa</option>
          <option value="Bugiri">Bugiri</option>
          <option value="Buhweju">Buhweju</option>
          <option value="Buikwe">Buikwe</option>
          <option value="Bukedea">Bukedea</option>
          <option value="Bukomansimbi">Bukomansimbi</option>
          <option value="Bukwo">Bukwo</option>
          <option value="Bulambuli">Bulambuli</option>
          <option value="Buliisa">Buliisa</option>a</option>
          <option value="Bundibugyo">Bundibugyo</option>
          <option value="Bunyangabu">Bunyangabu</option>
          <option value="Bushenyi">Bushenyi</option>
          <option value="Busia">Busia</option>
          <option value="Butaleja">Butaleja</option>
          <option value="Butambala">Butambala</option>
          <option value="Butebo">Butebo</option>
          <option value="Buvuma">Buvuma</option>
          <option value="Buyende">Buyende</option>
          <option value="Dokolo">Dokolo</option>
          <option value="Gomba">Gomba</option>
          <option value="Gulu">Gulu</option>
          <option value="Hoima">Hoima</option>
          <option value="Ibanda">Ibanda</option>
          <option value="Iganga">Iganga</option>
          <option value="Isingiro">Isingiro</option>
          <option value="Jinja">Jinja</option>
          <option value="Kaabong">Kaabong</option>
          <option value="Kabale">Kabale</option>
          <option value="Kabarole">Kabarole</option>
          <option value="Kaberamaido">Kaberamaido</option>
          <option value="Kagadi">Kagadi</option>
          <option value="Kalangala">Kalangala</option>
          <option value="Kaliro">Kaliro</option>
          <option value="Kalungu">Kalungu</option>
          <option value="Kampala">Kampala</option>
          <option value="Kamuli">Kamuli</option>
          <option value="Kamwenge">Kamwenge</option>
          <option value="Kanungu">Kanungu</option>
          <option value="Kapchorwa">Kapchorwa</option>
          <option value="Kasese">Kasese</option>
          <option value="Katakwi">Katakwi</option>
          <option value="Kayunga">Kayunga</option>
          <option value="Kazo">Kazo</option>
          <option value="Kibaale">Kibaale</option>
          <option value="Kiboga">Kiboga</option>
          <option value="Kibuku">Kibuku</option>
          <option value="Kikuube">Kikuube</option>
          <option value="Kiruhura">Kiruhura</option>
          <option value="Kiryandongo">Kiryandongo</option>
          <option value="Kisoro">Kisoro</option>
          <option value="Kitagwenda">Kitagwenda</option>
          <option value="Kitgum">Kitgum</option>
          <option value="Koboko">Koboko</option>
          <option value="Kole">Kole</option>
          <option value="Kotido">Kotido</option>
          <option value="Kumi">Kumi</option>
          <option value="Kween">Kween</option>
          <option value="Kyankwanzi">Kyankwanzi</option>
          <option value="Kyegegwa">Kyegegwa</option>
          <option value="Kyenjojo">Kyenjojo</option>
          <option value="Lamwo">Lamwo</option>
          <option value="Lira">Lira</option>
          <option value="Luuka">Luuka</option>
          <option value="Luuka">Luuka</option>
          <option value="Luweero">Luweero</option>
          <option value="Lwengo">Lwengo</option>
          <option value="Lyantonde">Lyantonde</option>
          <option value="Manafwa">Manafwa</option>
          <option value="Maracha">Maracha</option>
          <option value="Masaka">Masaka</option>
          <option value="Masindi">Masindi</option>
          <option value="Mayuge">Mayuge</option>
          <option value="Mbale">Mbale</option>
          <option value="Mbarara">Mbarara</option>
          <option value="Mitooma">Mitooma</option>
          <option value="Mityana">Mityana</option>
          <option value="Moroto">Moroto</option>
          <option value="Moyo">Moyo</option>
          <option value="Mpigi">Mpigi</option>
          <option value="Mubende">Mubende</option>
          <option value="Mukono">Mukono</option>
          <option value="Nakapiripirit">Nakapiripirit</option>
          <option value="Nakaseke">Nakaseke</option>
          <option value="Nakasongolo">Nakasongolo</option>
          <option value="Namayingo">Namayingo</option>
          <option value="Namisindwa">Namisindwa</option>
          <option value="Namutumba">Namutumba</option>
          <option value="Napak">Napak</option>
          <option value="Nebbi">Nebbi</option>
          <option value="Ngora">Ngora</option>
          <option value="Ntoroko">Ntoroko</option>
          <option value="Ntungamo">Ntungamo</option>
          <option value="Nwoya">Nwoya</option>
          <option value="Omoro">Omoro</option>
          <option value="Otuke">Otuke</option>
          <option value="Oyam">Oyam</option>
          <option value="Ntoroko">Ntoroko</option>
          <option value="Ntungamo">Ntungamo</option>
          <option value="Nwoya">Nwoya</option>
          <option value="Omoro">Omoro</option>
          <option value="Otuke">Otuke</option>
          <option value="Oyam">Oyam</option>
          <option value="Pader">Pader</option>
          <option value="Pakwach">Pakwach</option>
          <option value="Pallisa">Pallisa</option>
          <option value="Rakai">Rakai</option>
          <option value="Rubanda">Rubanda</option>
          <option value="Rubirizi">Rubirizi</option>
          <option value="Rukungiri">Rukungiri</option>
          <option value="Sembabule">Sembabule</option>
          <option value="Serere">Serere</option>
          <option value="Sheema">Sheema</option>
          <option value="Sironko">Sironko</option>
          <option value="Soroti">Soroti</option>
          <option value="Terego">Terego</option>
          <option value="Tororo">Tororo</option>
          <option value="Wakiso">Wakiso</option>
          <option value="Yumbe">Yumbe</option>
          <option value="Zombo">Zombo</option>
    </select>
      
</div>

<div class="form-group">
    <input class="button4" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Save' }}">
</div>
