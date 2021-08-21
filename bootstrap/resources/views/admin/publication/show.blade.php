@extends('layouts.app')

@section('content')

<style>
    .card{
        /* background-color: #449d5b; */
    }
</style>
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card" >
                    <div class="card-header">Publication {{ $publication->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/publication') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/publication/' . $publication->id . '/edit') }}" title="Edit Publication"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/publication' . '/' . $publication->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Publication" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $publication->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $publication->name }} </td></tr><tr><th> Title </th><td> {{ $publication->title }} </td></tr><tr><th> Publisher </th><td> {{ $publication->publisher }} </td></tr><tr><th> Year of Publication </th><td> {{ $publication->year }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection