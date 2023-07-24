@extends('layouts.app')
@section('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


@php
    $hive_id = session('hive_id');
@endphp

@include('datanavbar')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                  Hive ID
                </th>
                <th scope="col" class="px-6 py-3">
                CO<sub>2</sub> (ppm)
                </th>
                <th scope="col" class="px-6 py-3">
                Date
                </th>
            </tr>
        </thead>
        <tbody>
        @php
            $count =  1
            @endphp
        @foreach($carbondioxide as $carbondioxide)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $count }}
                </th>
                <td class="px-6 py-4">
                {{ $carbondioxide->hive_id }}
                </td>
                <td class="px-6 py-4">
                {{ $carbondioxide->record }}
                </td>
                <td class="px-6 py-4">
                {{ $carbondioxide->created_at }}
                </td>
            </tr>
            @php
                $count = $count + 1
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!-- added pagination and search-->
@section('page_scripts')
<!-- Include DataTables JS file -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
  $(document).ready(function() {
   $('#myTable').DataTable({
      responsive: true
   });
});
</script>
@endsection