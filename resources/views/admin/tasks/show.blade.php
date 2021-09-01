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
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Task {{ $task->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/work-package') }}" title="Back"><button class="button2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/tasks/' . $task->id . '/edit') }}" title="Edit Task"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/tasks' . '/' . $task->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="button3 btn-danger" title="Delete Task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $task->id }}</td>
                                    </tr>      
                                    <tr><th> Task Name </th><td> {{ $task->name }} </td></tr>
                                    <tr><th> Team leader </th><td> {{ $task->team_leader }} </td></tr><tr><th> Duration </th><td> {{ $task->duration }} </td></tr>
                                    <tr><th> Description </th>
                                    <td> 
                                        <details>
                                            <summary> Work task</summary>
                                            {!! $task->description !!}
                                        </details>
                                    </td></tr>
                                    <tr><th> Partners </th><td> {{ $task->partners }} </td></tr>
                                    <tr><th> Potential Innovetions </th><td> {{ $task->potential_innovations }} </td></tr>
                                    <tr><th> Deliverables </th><td> {!! $task->deliverables !!} </td></tr>
                                    <tr><th> Interdependances </th><td> {{ $task->interdependence }} </td></tr>
                                    <tr><th> Resource Rquirement </th><td> {{ $task->resource_requirements }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
