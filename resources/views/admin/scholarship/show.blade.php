@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Scholarship {{ $scholarship->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/scholarship') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/scholarship/' . $scholarship->id . '/edit') }}" title="Edit scholarship"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/scholarship' . '/' . $scholarship->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete scholarship" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $scholarship->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Category </th><td> {{ $scholarship->category }} </td></tr><tr><th> Task </th><td> {{ $scholarship->task }} </td></tr><tr><th> Topic </th><td> {{ $scholarship->topic }} </td>
                                </tr>
                                <tr><th> Deliverables </th><td> {{ $scholarship->deliverables }} </td></tr><tr>
                                        <th> Competence </th><td> {{ $scholarship->competence }} </td></tr>
                                        <tr>
                                        <th> Instructions </th><td> {{ $scholarship->instructions }} </td></tr>
                                        <tr>
                                        <th> Number Of Postions </th><td> {{ $scholarship->positions }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
