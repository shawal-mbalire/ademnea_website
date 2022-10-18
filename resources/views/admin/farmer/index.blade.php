@extends('layouts.app')

<?php use Illuminate\Support\Facades\DB;?>
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
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Farmers</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/farmer/create') }}" class="btn btn-success btn-sm" title="Add New Farmer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/farm') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th><th>Name</th><th>Gender</th><th>Email</th><th>Telephone</th><th>Address</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $count = 1
                                @endphp

                                @foreach($farmer as $item)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td><a href="{{ url('/admin/farmers/' . $item->id . '/viewfarms') }}">{{ "$item->fname  $item->lname"}}</a></td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->email }}</td>   
                                        <td>{{ $item->telephone }}</td>   
                                        <td>{{ $item->address }}</td>                                        
                                        <td>
                                            <a href="{{ url('/admin/farmers/' . $item->id . '/edit') }}" title="Edit Farmer"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/admin/farm' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3 bg-danger" title="Delete Farm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $count = $count + 1
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $farmer->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
