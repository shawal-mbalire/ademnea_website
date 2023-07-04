@extends('layouts.app')
@section('content')


<div class="relative ">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>


 <div class="flex flex-row space-x-4 mt-10 items-center justify-center h-16 mb-4 rounded bg-gray-200 dark:bg-gray-800">
         
         <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Graphs <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Temperature</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Humidity</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Carbondioxide</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Weight</a>
      </li>
    </ul>
</div>

<button id="dropdownHoverButton2" data-dropdown-toggle="dropdownHover2" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Raw Data<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdownHover2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton2">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Temperature</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Humidity</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Carbondioxide</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Weight</a>
      </li>
    </ul>
</div>

<button id="dropdownHoverButton3" data-dropdown-toggle="dropdownHover3" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Media<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdownHover3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton3">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Audio</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Video</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Images</a>
      </li>
    </ul>
</div>


  </div>
 


<!-- Date range picker -->
 <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
</body>

    
  <div class='flex flex-row mx-3 space-x-4  items-center justify-between bg-red-200 mt-2'>
      <div>
        <h1 class="text-xl ml-3 font-bold leading-none tracking-tight text-gray-200 md:text-2xl lg:text-xl dark:text-black">
            Farm: <span class="font-extrabold">{{ $farm_name }}</span>
        </h1>
        <h1 class="text-xl ml-3 font-bold leading-none tracking-tight text-gray-200 md:text-2xl lg:text-xl dark:text-black mt-2">
            Hive  : <span class="font-extrabold">{{ $hive_id }}</span>
        </h1>
      </div>

          <div>
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="mr-2">
                  <a href="{{ url('/hive_data/temperature_data_default/' . $hive_id) }}" class="inline-block px-2 py-2 text-white bg-green-900 rounded-sm active" aria-current="page">Temperature</a>
                </li>
                <li class="mr-2">
                  <a href="{{ url('/hive_data/humidity_data_default/' . $hive_id) }}" class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">Humidity</a>
                </li>
                {{-- <li class="mr-2">
                  <a href="{{ url('/hive_data/weight_data_default/' . $hive_id) }}" class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">Weight</a>
                </li>
                <li class="mr-12">
                  <a href="{{ url('/hive_data/co2_data_default/' . $hive_id) }}" class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">CO<sub>2</sub> levels</a>
                </li> --}}
                <li class="mr-2">
                    <a href="{{ url('admin/hive') }}" class="inline-block px-2 py-2 rounded-sm text-white bg-blue-700 hover:bg-blue-500">Back</a>
                </li>
            </ul>          

          </div>

          <div class='mb-2'>
            <h3 class='mx-3 font-bold py-2'>Select a date-range</h3>
                <!-- Date picker -->
            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #0fc90f; width: 260px" class='mx-3'>
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
            </div>
          </div>
    </div>

    <!-- Display the temperature graph -->
    <script type="text/javascript">
$(function() {

  var start = moment().subtract(1, 'days'); //by default , just display data for the last 30 days
  var end = moment();
  var hiveId = {{ $hive_id }}; 
  var myChart = echarts.init(document.getElementById('chart'));

  function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')); 

    // Format dates for the server
    var startDate = start.format('YYYY-MM-DD HH:mm:ss');
    var endDate = end.format('YYYY-MM-DD HH:mm:ss');
    

    // Send AJAX request to server
    $.ajax({
        url: '/hive_data/temperature_data/' + hiveId,
        method: 'GET',
        data: {
            start: startDate,
            end: endDate,
            table: 'hive_temperatures' // name of the table you want to fetch data from
        },
        success: function(response) {
            // handle the response data
            myChart.setOption({
              // chart configuration options here
                title: {
                            text: 'Temperatures'
                        },
                tooltip: {
                          trigger: 'axis'
                      },
                legend: {},
                toolbox: {
                          show: true,
                          feature: {
                          dataZoom: {
                              show: false, 
                              yAxisIndex: 'none'
                          },
                          dataView: { show: false, readOnly: false },
                          magicType: { show: false, type: ['line', 'bar'] },
                          restore: { show: false },
                          saveAsImage: { show: false }
                          }
                      },
                xAxis: {
                          type: 'category',
                          boundaryGap: false,
                          data: response.dates // assuming you returned the dates under the key 'dates'
                      },
                yAxis: {
                          type: 'value',
                          min: 10,
                          max: 40,
                          axisLabel: {
                          formatter: '{value} °C'
                          },
                          splitNumber: 10
                      },
                series: [
                  {
                        name: 'Brood Section',
                        type: 'line',
                        data: response.broodSection,
                        markPoint: {
                                    data: [
                                          { type: 'max', name: 'Max' },
                                          { type: 'min', name: 'Min' }
                                          ]
                                    },
                        markLine: {
                                    data: [{ type: 'average', name: 'Avg' }]
                                   },
                                  //  color: 'red' 
                      },
                    {
                        name: 'Exterior',
                        type: 'line',
                        data: response.exterior,
                        markPoint: {
                                    data: [
                                          { type: 'max', name: 'Max' },
                                          { type: 'min', name: 'Min' }
                                          ]
                                    },
                        markLine: {
                                    data: [{ type: 'average', name: 'Avg' }]
                                   },
                        
                        // color: 'green' 
                       
                    },
                   
                      {
                        name: 'Honey Section',
                        type: 'line',
                        data: response.honeySection,
                        markPoint: {
                        data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }]
                          },
                          // color: 'blue' 
                    },
                ]
            });
        }

    });
}

$('#reportrange').daterangepicker({
    ranges: {
       'Today': [moment().startOf('day'), moment().endOf('day')],
       'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
       'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days').startOf('day'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);
});
</script>


        <div class='bg-blue-400 mx-3 p-1 mt-2'>
              <div id="chart" style="width: 100%; height: 480px;" class='p-2'></div>
                <script>
                // JavaScript code to create and configure the chart
                var myChart = echarts.init(document.getElementById('chart'));
                </script>
        </div>


</div>

@endsection