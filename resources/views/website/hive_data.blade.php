<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Adaptive Environmental Monitoring Networks for East Africa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
   
    <style>
        #collapseExample.collapse:not(.show) {
            display: block;
            height: 3rem;
            overflow: hidden;
        }

        #collapseExample.collapsing {
            height: 3rem;
        }

    </style>
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    @include('website.links')

    <!-- =======================================================
  * Template Name: Green - v4.3.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="
    https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js
    "></script>

    
  
</head>

<body class='bg-gray-200'>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> -->
    

    
    
    <!-- ======= Top Bar ======= -->
    @include('website.top_bar')

    <!-- ======= Header ======= -->
    @include('website.header')
    <!-- End Header -->
    


    <main id="main">

    <div class='flex flex-row mx-3 space-x-4  items-center justify-between bg-white mt-2'>
          <div>
              <h1 class="text-4xl ml-3 font-extrabold leading-none tracking-tight text-gray-200 md:text-5xl lg:text-3xl dark:text-black">
                Hive Details </h1>
          </div>

          <div>
            
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="mr-2">
                    <a href="#" class="inline-block px-2 py-2 text-white bg-green-900 rounded-sm active" aria-current="page">TEMP CHART</a>
                </li>
                <li class="mr-2">
                    <a href="#"  class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">HUMIDITY vs TEMP CHART</a>
                </li>
                <li class="mr-2">
                    <a href="#" class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">WEIGHT CHART</a>
                </li>
                <li class="mr-2">
                    <a href="#" class="inline-block px-2 py-2 rounded-sm hover:text-gray-900 hover:bg-lime-200 dark:hover:bg-lime-300 dark:hover:text-black">C02 CHART</a>
                </li>
            </ul>

          </div>

          <div class='mb-2'>
            <h3 class='mx-3 font-bold py-2'>Select a date-range</h3>
                <!-- Date picker -->
            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #90EE90; width: 250px" class='mx-3'>
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
            </div>

          </div>
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
        

        <div class='bg-white mx-3 p-1 mt-2'>
    <div id="chart" style="width: 100%; height: 480px;" class='p-2'></div>
        <script>
        // JavaScript code to create and configure the chart
        var myChart = echarts.init(document.getElementById('chart'));
        myChart.setOption({
            // chart configuration options here
            title: {
        text: 'Temperature Change in August'
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
        data: ['Aug 5', 'Aug 6', 'Aug 7', 'Aug 8', 'Aug 9', 'Aug 10', 'Aug 11', 'Aug 12', 'Aug 13', 'Aug 14', 'Aug 15', 'Aug 16', 'Aug 17', 'Aug 18', 'Aug 19']
    },
    yAxis: {
        type: 'value',
        min: 15,
        max: 40,
        axisLabel: {
        formatter: '{value} °C'
        }
    },
    series: [
        {
        name: 'Exterior',
        type: 'line',
        data: [23, 21, 26, 25, 25, 24, 22, 21, 26, 25, 25, 24, 22, 24, 25],
        markPoint: {
            data: [
            { type: 'max', name: 'Max' },
            { type: 'min', name: 'Min' }
            ]
        },
        markLine: {
            data: [{ type: 'average', name: 'Avg' }]
        }
        },
        {
        name: 'Brood Section',
        type: 'line',
        data: [21, 22, 20, 23, 21, 24, 25, 22, 20, 23, 21, 24, 25, 21, 23],
        markPoint: {
            data: [
            { type: 'max', name: 'Max' },
            { type: 'min', name: 'Min' }
            ]
        },
        markLine: {
            data: [{ type: 'average', name: 'Avg' }]
        }
        },
        {
        name: 'Honey Section',
        type: 'line',
        data: [24, 23, 26, 27, 26, 28, 25, 23, 26, 27, 26, 28, 25, 26, 24,],
        markPoint: {
            data: [
            { type: 'max', name: 'Max' },
            { type: 'min', name: 'Min' }
            ]
        },
        markLine: {
            data: [{ type: 'average', name: 'Avg' }]
        }
        },
    ]
        });
        </script>
    </div>
        <!-- ======= Scholarship Section ======= -->
        <section id="scholarship" class="about">
          

      

    <!-- <div class='bg-white mx-3 p-1'>
    <div id="chart2" style="width: 100%; height: 400px;" class='p-3'></div>
    <script>
      // JavaScript code to create and configure the chart
      var myChart = echarts.init(document.getElementById('chart2'));
      myChart.setOption({
        title: {
        text: 'Temperature-Humidity change graph'
    },
        tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'cross',
      crossStyle: {
        color: '#999'
      }
    }
  },
  toolbox: {
    feature: {
      dataView: { show: false, readOnly: false },
      magicType: { show: false, type: ['line', 'line'] },
      restore: { show: false },
      saveAsImage: { show: false }
    }
  },
  legend: {
    data: [ 'Humidy', 'Temperature']
  },
  xAxis: [
    {
      type: 'category',
      data: ['Aug 5', 'Aug 6', 'Aug 7', 'Aug 8', 'Aug 9', 'Aug 10', 'Aug 11', 'Aug 12', 'Aug 13', 'Aug 14', 'Aug 15', 'Aug 16', 'Aug 17', 'Aug 18', 'Aug 19'],
      axisPointer: {
        type: 'shadow'
      }
    }
  ],
  yAxis: [
        {
      type: 'value',
      name: 'Humidity',
      min: 50,
      max: 100,
      interval: 10,
      axisLabel: {
        formatter: '{value}%'
      }
    },
    {
      type: 'value',
      name: 'Temperature',
      min: 15,
      max: 40,
      axisLabel: {
        formatter: '{value} °C'
      }
    }
  ],
  series: [
    {
      name: 'Humidity',
      type: 'line',
      showSymbol: false,
      tooltip: {
        valueFormatter: function (value) {
          return value + '%';
        }
      },
      data: [
        60, 65, 70, 75, 80, 85, 80, 75, 70, 65, 60, 55,60, 65, 70, 75, 80, 85, 80, 75, 70,
      ]
    },
    {
      name: 'Temperature',
      type: 'line',
      showSymbol: false,
      yAxisIndex: 1,
      tooltip: {
        valueFormatter: function (value) {
          return value + ' °C';
        }
      },
      data: [25, 28, 27, 26, 24,25, 28, 27, 26, 24,25, 28, 27, 26, 24,25, 28, 27, 26, 24,23,25]
    }
  ]
      });
    </script>
  </div>
            

  <div class='bg-white mx-3 p-1 my-2'>
  <div id="chart3" style="width: 100%; height: 400px;" class='p-3'></div>
    <script>
      // JavaScript code to create and configure the chart
      var myChart = echarts.init(document.getElementById('chart3'));

      // Sample data for weight of bee hive over time
    const weightData = [
    { time: '2022-01-01 12:00:00', weight: 20.5 },
    { time: '2022-01-01 12:15:00', weight: 20.2 },
    { time: '2022-01-01 12:30:00', weight: 21.0 },
    { time: '2022-01-01 12:45:00', weight: 21.2 },
    { time: '2022-01-01 13:00:00', weight: 21.5 },
    { time: '2022-01-01 13:15:00', weight: 20.8 },
    { time: '2022-01-01 13:30:00', weight: 20.2 },
    { time: '2022-01-01 13:45:00', weight: 19.7 },
    { time: '2022-01-01 14:00:00', weight: 19.5 },
    { time: '2022-01-01 14:15:00', weight: 19.3 }
    ];

    // Extract time and weight data
    const timeData = weightData.map(data => data.time);
    const weightValues = weightData.map(data => data.weight);

      myChart.setOption({
        title: {
        text: 'Bee Hive weight (kg)  graph'
    },
        xAxis: {
        type: 'category',
        data: timeData
    },
    yAxis: {
        type: 'value',
        min: 15,
        max: 25,
        interval: 1,
    },
    series: [
        {
        data: weightValues,
        type: 'line'
        }
    ]
      });
    </script>
  </div>
    


  .




  <div class='bg-white mx-3 p-1 my-2'>
  <div id="chart4" style="width: 100%; height: 400px;" class='p-3'></div>
    <script>
      // JavaScript code to create and configure the chart
      var myChart = echarts.init(document.getElementById('chart4'));
        
      myChart.setOption({
        title: {
        text: 'CO2 Concentration Over Time'
    },
    xAxis: {
        type: 'time'
    },
    yAxis: {
        type: 'value',
        name: 'CO2 Concentration (ppm)'
    },
    series: [{
        type: 'line',
        data: [
            ['2022-05-01 00:00:00', 400],
            ['2022-05-01 01:00:00', 420],
            ['2022-05-01 02:00:00', 450],
            ['2022-05-01 03:00:00', 480],
            ['2022-05-01 04:00:00', 500],
            ['2022-05-01 05:00:00', 490],
            ['2022-05-01 06:00:00', 470]
        ]
    }]
      });
    </script>
  </div>
    
 -->



            <!-- <div class="container">

   

                <div class="flex flex-row">
                    <div class="w-1/2">
                        <div class="h5 text-center container">
                            <h1>Temperature</h1>
                        {{-- <h1>{{ $newsletter->title }}</h1> --}}
                        </div>
                        {!! $Tchart->container() !!}
                    </div>

                    <div class="w-1/2">
                        <div class="h5 text-center container">
                            <h1>Humidity</h1>
                        {{-- <h1>{{ $newsletter->title }}</h1> --}}
                        </div>
                        {!! $Hchart->container() !!}
                    </div>

                </div>

                <div class="w-1/2">
                    <div class="h5 text-center container">
                        <h1>Carbondioxide levels</h1>
                    {{-- <h1>{{ $newsletter->title }}</h1> --}}
                    </div>
                    {!! $Cchart->container() !!}
                </div>

                {{-- {!! $Hchart->container() !!} --}}

                {!! $Hchart->script() !!}
                {!! $Tchart->script() !!}
                {!! $Cchart->script() !!}
                {{-- <p>{{ $newsletter->description }}</p> --}}

                {{-- {{ $newsletter->article }} --}}
                {{-- @if ($scholarships->count())--}}
                    {{-- <div class="section-title">
                    </div> --}}
                   {{-- @foreach ($scholarships as $scholarship)
                        <div class="container card text-justify">
                            <div class="icon-box">
                                <p class="description">{!! $scholarship->instructions !!}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There are currently no scholarships</p>
                @endif --}}
            </div> -->
        </section>

        <!-- End Scholarship Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('website.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('website.scripts')

 

</body>

</html>
