@extends('layouts.app')
@section('content')
    @php
        $hive_id = session('hive_id');
    @endphp

    <div>
        <b class="text-green-600">Power Monitoring</b>
        <h3 class=' font-bold py-1 text-green-600'>Hive : <span class="font-extrabold">{{ $hive_id }}</span>
        </h3>
    </div>

    <body>
        <div>
            @include('datanavbar')


        </div>

        <div>

            <div class="row">

                <div class="m-1 graph">
                    {{-- Graph goes here --}}

                    <!-- Choose date range -->
                    <div class="flex flex-row space-x-4 items-center justify-between h-8 mb-4 bg-white">
                        <div style="width:100px;height: 100px; ">


                            <div class="" id="batteryChart" style="width:190px;height: 190px; margin-bottom:30px;">
                                Liquid Battery goes here
                            </div>
                        </div>
                        <div>
                            <h3 class='mx-2 font-bold py-1 text-green-600'>Select a date-range</h3>
                            <!-- Date range picker -->
                            <div id="reportrange" class="border-2 border-green-800 rounded-lg hover:bg-green-800"
                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 260px; ">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>

                        <script type="text/javascript">
                            // ..............The Graph........................
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
                                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                            'month').endOf('month')]
                                    }
                                }, cb);

                                cb(start, end);

                            });

                            // ...................The Battery level Donut...............
                            document.addEventListener("DOMContentLoaded", function() {
                                // Initialize ECharts instance
                                var myChart = echarts.init(document.getElementById('batteryChart'));

                                // Battery percentage (replace this value with your actual battery percentage)
                                var batteryPercentage = {{ $percentValue ?? 10 }};


                                // Color based on the battery percentage
                                var color;
                                if (batteryPercentage <= 30) {
                                    color = '#FF4500'; // Red
                                } else if (batteryPercentage >= 80) {
                                    color = '#67BE6B'; // Green
                                } else {
                                    color = '#ffa500'; // Orange
                                }

                                // Donut chart options
                                var option = {
                                    series: [{
                                        type: 'pie',
                                        radius: ['60%', '85%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                        },
                                        labelLine: {
                                            show: false,
                                        },
                                        data: [{
                                                value: batteryPercentage,
                                                itemStyle: {
                                                    color: color
                                                }
                                            },
                                            {
                                                value: 100 - batteryPercentage,
                                                itemStyle: {
                                                    color: '#E2E2E2'
                                                }
                                            }
                                        ],
                                    }, ],
                                    graphic: [{
                                        type: 'text',
                                        left: 'center',
                                        top: 'center',
                                        style: {
                                            text: 'Battery Level ' + batteryPercentage + '%',
                                            textAlign: 'center',
                                            fontSize: 12,
                                            fontWeight: 'bold',
                                            fill: color // Set color based on batteryPercentage
                                        }
                                    }]
                                };

                                // Set options and render the chart
                                myChart.setOption(option);
                            });
                        </script>
                    </div>
                </div>

    </body>


    <!-- Display the battery level graph -->
    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(1,
                'days'); //by default , just display data for the previous day or 24 hours
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
                    url: '/admin/power-monitoring/' + hiveId,
                    method: 'GET',
                    data: {
                        start: startDate,
                        end: endDate,
                        table: 'hive_battery' // name of the table you want to fetch data from
                    },
                    success: function(response) {
                        // handle the response data
                        myChart.setOption({
                            // chart configuration options here
                            title: {
                                text: 'Battery Level'
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
                                    dataView: {
                                        show: false,
                                        readOnly: false
                                    },
                                    magicType: {
                                        show: true,
                                        type: ['line', 'bar']
                                    },
                                    restore: {
                                        show: true
                                    },
                                    saveAsImage: {
                                        show: true
                                    }
                                }
                            },
                            xAxis: {
                                type: 'category',
                                boundaryGap: false,
                                data: response
                                    .dates // assuming you returned the dates under the key 'dates'
                            },
                            yAxis: {
                                type: 'value',
                                min: 10,
                                max: 100,
                                axisLabel: {
                                    formatter: '{value} '
                                },
                                splitNumber: 10
                            },
                            series: [{
                                    name: 'Voltage (V)',
                                    type: 'line',
                                    data: response.voltage,
                                    markPoint: {
                                        data: [{
                                                type: 'max',
                                                name: 'Max'
                                            },
                                            {
                                                type: 'min',
                                                name: 'Min'
                                            }
                                        ]
                                    },
                                    markLine: {
                                        data: [{
                                            type: 'average',
                                            name: 'Avg'
                                        }]
                                    },
                                    color: 'red'
                                },
                                {
                                    name: 'Percentage (%)',
                                    type: 'line',
                                    data: response.percentage,
                                    markPoint: {
                                        data: [{
                                                type: 'max',
                                                name: 'Max'
                                            },
                                            {
                                                type: 'min',
                                                name: 'Min'
                                            }
                                        ]
                                    },
                                    markLine: {
                                        data: [{
                                            type: 'average',
                                            name: 'Avg'
                                        }]
                                    },

                                    color: 'blue'

                                },

                            ]
                        });
                    }

                });
            }

            $('#reportrange').daterangepicker({
                ranges: {
                    'Today': [moment().startOf('day'), moment().endOf('day')],
                    'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days')
                        .endOf('day')
                    ],
                    'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days').startOf('day'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });
    </script>


    <div class='bg-white'>
        <div id="chart" style="height: 480px; margin-top:40px;" class='p-5'></div>
        <script>
            // JavaScript code to create and configure the chart
            var myChart = echarts.init(document.getElementById('chart'));
        </script>
    </div>
@endsection
