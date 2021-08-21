@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">WorkPackage {{ $workpackage->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/work-package') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/work-package/' . $workpackage->id . '/edit') }}" title="Edit WorkPackage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/admin/work-package' . '/' . $workpackage->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete WorkPackage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $workpackage->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $workpackage->name }} </td></tr><tr><th> Abbreviation </th><td> {{ $workpackage->abbreviation }} </td></tr><tr><th> Description </th><td> {{ $workpackage->description }} </td></tr>><tr><th> Tasks </th><td> {{ $workpackage->task }} </td></tr>><tr><th> Partners </th><td> {{ $workpackage->partners }} </td></tr>><tr><th> Deliverables </th><td> {{ $workpackage->deliverables }} </td></tr>><tr><th> Interdependances </th><td> {{ $workpackage->interdependances }} </td></tr>><tr><th> Potential_innovetions </th><td> {{ $workpackage->potential_inovetions }} </td></tr><tr><th> Activity </th><td> {{ $workpackage->activity }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
