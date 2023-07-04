@extends('layouts.app')
@section('content')


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@include('datanavbar')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
    
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Hive ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Honey Section (%)
                </th>
                <th scope="col" class="px-6 py-3">
                    Brood Section (%)
                </th>
                <th scope="col" class="px-6 py-3">
                    Exterior (%)
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
        @foreach($humidity as $humidity)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $count }}
                </th>
                <td class="px-6 py-4">
                {{ $humidity->hive_id }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $humidity->record)[0] }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $humidity->record)[1] }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $humidity->record)[2] }}
                </td>
                <td class="px-6 py-4">
                {{ $humidity->created_at }}
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