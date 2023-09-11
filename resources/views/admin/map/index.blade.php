@extends('layouts.app')
@section('content')
    <div class="btn-dark text-center mt-1 pt-1" style="width:150px; height:50px; border-radius:10px;">
        <a href="{{ url('/admin/farm') }}"  {{-- class="inline-block px-2 py-2 rounded-sm text-white bg-blue-700 hover:bg-blue-500">Back --}} <i class="fas fa-arrow-left"></i> Back         </a>
    </div>

    {{-- <h2>Hive Locations</h2> --}}
    @foreach ($farm as $farms)
        <div class="text-center bold">
            <b>HIVES IN {{ $farms->name }}</b>
        </div>
        {{-- <ul>
            {{-- {{ $hives }}  
            @foreach ($hives as $hive)
                <li><span>{{ $hive->id }}</span> {{ $hive->latitude }}, Longitude: {{ $hive->longitude }}</li>
                
            @endforeach
        </ul>  --}}
    @endforeach


    <div id="map"style="width: 800px; height:500px; margin-top:25px;">

    </div>


    <script>
        function loadMapScenario() {
            var map = new Microsoft.Maps.Map('#map', {
                credentials: 'AvvQV4ch_5cSpbgNw94ftFt3Xsy41cLVIBmOuhrd3WRvTFzKW2kLP09WeNPSfgrg',
                center: new Microsoft.Maps.Location(0.3136, 32.5811),
                zoom: 8
            });

            @foreach ($hives as $hive)
                var location = new Microsoft.Maps.Location({{ $hive->latitude }}, {{ $hive->longitude }});
                var pinOptions = {
                    text: '{{ $hive->id }}', // Hive ID displayed on the pin
                    color: 'red', // Customize the pin color
                    // anchor: new Microsoft.Maps.Point(12, 24) // Adjust the anchor point of the pin
                };
                var pin = new Microsoft.Maps.Pushpin(location, pinOptions);
                map.entities.push(pin);
            @endforeach
        }
    </script>
@endsection
