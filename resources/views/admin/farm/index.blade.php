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
                    <div class="card-header">Farms</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/farm/create') }}" class="btn btn-success btn-sm" title="Add New Farm">
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
                                        <th>Farm ID</th><th>Farm Name</th><th>Farm Owner</th><th>Address</th><th>District</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($farm as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td> 
                                             <?php #Displaying the owner's full name for each farm 
                                              
                                                    $farmer_names = DB::select('SELECT concat(fname, " " ,lname) AS "full_name"
                                                                        FROM farms inner join farmers as farmer 
                                                                        ON farmer.id = farms.ownerId
                                                                        WHERE farmer.id = ?', [$item->ownerId]);

                                                   // echo  $farmer_names[0] -> full_name;
                                                    
                                             ?>
                                
                                         </td>
                                        
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->district }}</td>                                        
                                        <td>
                                            <a href="{{ url('/admin/farm/' . $item->id) }}" title="View Farm"><button class="button2"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/farm/' . $item->id . '/edit') }}" title="Edit Farm"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            
                                            <a href="/admin/hive" title="Display Farm Hives"><button class="button1"><i class="" aria-hidden="true"></i> Hives</button></a>
                        

                                            <form method="POST" action="{{ url('/admin/farm' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3" title="Delete Farm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $farm->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
