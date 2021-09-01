@extends('layouts.app')

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
    {{-- <div class="container">
        <div class="row"> --}}
            {{-- @include('admin.sidebar') --}}

            <div class="content-wrapper">
                <div class="row">
                  <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Task</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/tasks/create') }}" class="btn btn-success btn-sm" title="Add New Task">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/tasks') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name</th><th>Team Leader</th><th>Durtion</th><th>Descrition of work</th><th>Partner</th><th>Potential innovetion</th><th>Deliverables</th><th>Interdependances</th><th>Resource requirments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($task as $item)
                                    <tr>
                                        <td>{{ $$item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->team_leader }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>
                                            <details>
                                                <summary> Work task</summary>
                                                {!! $item->descrition !!}
                                            </details>
                                        </td>
                                        <td>{{ $item->partners }}</td>
                                        <td>{{ $item->potential_innovetion }}</td>
                                        <td>{{ $item->deliverebles }}</td>
                                        <td>{{ $item->interdependence }}</td>
                                        <td>{{ $item->resource_requirements }}</td>
                                        <td>
                                            <a href="{{ url('/admin/tasks/' . $item->id) }}" title="View Task"><button class="button2"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/tasks/' . $item->id . '/edit') }}" title="Edit Task"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/tasks' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $task->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
