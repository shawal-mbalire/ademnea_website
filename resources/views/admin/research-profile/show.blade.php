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
                    <div class="card-header">Research profile {{ $profile->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/research-profile') }}" title="Back"><button class="button2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/research-profile/' . $profile->id . '/edit') }}" title="Edit Research profile"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/research-profile' . '/' . $profile->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="button3" title="Delete Research profile" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $profile->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Category </th><td> {{ $profile->category }} </td>
                                    </tr>
                                    <tr>
                                        <th> description </th><td> {!! $profile->description !!} </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
