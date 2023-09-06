@extends('layouts.app')

<style>
    /* Your CSS styles for buttons go here */
</style>

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">WorkPackage {{ $workpackage->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/work-package') }}" title="Back"><button class="button2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/work-package/' . $workpackage->id . '/edit') }}" title="Edit WorkPackage"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/work-package' . '/' . $workpackage->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="button3" title="Delete WorkPackage" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $workpackage->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $workpackage->name }} </td></tr>
                                <tr><th> Partners </th><td> {{ $workpackage->partners }} </td></tr>
                                <tr><th> Duration </th><td> {{ $workpackage->duration }} </td></tr>
                                <tr><th> Work Package Details </th><td> {!! $workpackage->instructions !!} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
