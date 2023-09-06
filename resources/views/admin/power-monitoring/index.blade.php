@extends('layouts.app')
@section('content')
    @php
        $hive_id = session('hive_id');
        $hive_battery_data = $hive_battery->pluck('battery_level')->toJson();
    @endphp
    <div>
        @include('datanavbar')


    </div>

    <div>
        <p>Battery for Hives</p>


        @foreach ($hive_battery as $battery)
            <div class="text-center bold">
                <b>BATTERY FOR HIVE: {{ $battery->hive_id }}</b>
            </div>

            <div class="row">
                <div class="col-4 m-1 donut" style="background-color: aquamarine">
                    Liquid Battery goes here
                </div>
                <div class="col-4 m-1 graph">
                    Graph goes here
                </div>
            </div>
        @endforeach
    </div>
@endsection

<!-- Add this in your <head> section or at the end of the <body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var batteryChart = echarts.init(document.getElementById('battery-chart'));
    
    var batteryData = {
        labels: ['1', '2', '3', '4', '5'],
        values: [80, 70, 60, 50, 40],
    };
    
    var option = {
        title: {
            text: 'Battery Percentage',
        },
        tooltip: {
            trigger: 'axis',
        },
        axis: {
            x: {
                type: 'category',
                data: batteryData.labels,
            },
            y: {
                type: 'value',
            },
        },
        series: [{
            name: 'Battery Percentage',
            data: batteryData.values,
            type: 'line',
        }],
    };
    
    batteryChart.setOption(option);
    </script>
{{-- 
<script>
    // Function to update the battery level chart
    function updateBatteryChart(hiveId, batteryLevel) {
        var batteryChart = echarts.init(document.getElementById('batteryChart-' + hiveId));

        var option = {
            series: [{
                type: 'liquidFill',
                data: [batteryLevel / 100], // ECharts expects a value between 0 and 1
                radius: '80%',
                outline: {
                    show: true,
                    borderDistance: 8,
                    itemStyle: {
                        borderWidth: 2,
                        borderColor: '#2975FF'
                    }
                },
                backgroundStyle: {
                    color: 'rgba(41, 117, 255, 0.2)'
                },
                label: {
                    normal: {
                        show: true,
                        textStyle: {
                            color: '#2975FF',
                            insideColor: 'rgba(41, 117, 255, 0.2)',
                            fontSize: 20
                        },
                        formatter: function (param) {
                            return batteryLevel + '%'; // Display battery level as a percentage
                        }
                    }
                }
            }]
        };

        // Set the options and update the chart
        batteryChart.setOption(option);
    }

  // Function to fetch the latest battery data from the server
  function getUpdatedBatteryDataFromServer() {
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/power-monitoring/12', // Replace with the correct URL on your server
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // If the request is successful, 'data' will contain the latest battery data
                // Here, we're assuming the response contains a property 'battery_level'
                // Loop through the hive_battery_data and update each chart with the new data
                var batteryData = JSON.parse(@json($hive_battery_data));
                for (var hiveId in batteryData) {
                    updateBatteryChart(hiveId, data.battery_level);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching battery data:', error);
            }
        });
    }

    // Call the updateBatteryChart function initially with the initial data and schedule periodic updates
    var initialBatteryData = JSON.parse(@json($hive_battery_data));
    for (var hiveId in initialBatteryData) {
        updateBatteryChart(hiveId, initialBatteryData[hiveId]);
    }

    setInterval(function () {
        getUpdatedBatteryDataFromServer(); // Fetch the updated battery data from the server
    }, 30000); // Update the chart every 30 seconds (adjust as needed)
</script> --}}
