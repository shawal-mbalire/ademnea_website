@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Task {{ $task->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/task') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/task/' . $task->id . '/edit') }}" title="Edit Task"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/task' . '/' . $task->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Blog" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $task->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $task->name }} </td></tr>
                                    <tr><th> Duration </th><td> {{ $task->duration }} </td></tr>
                                    <tr><th> Description </th><td> {{ $task->description }} </td></tr>
                                    <tr><th> Partners </th><td> {{ $task->partners }} </td></tr>
                                    <tr><th> Potential Innovations </th><td> {{ $task->potential_innovations }} </td></tr>
                                    <tr><th> Deliverables </th><td> {{ $task->deliverables }} </td></tr>
                                    <tr><th> Interdependence </th><td> {{ $task->interdependence }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
