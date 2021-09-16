@extends('layouts.app')

@section('content')

<style>
    .card-body{
        background-color: none;


    }
    .card-header{
        background-color: none;
    }


    .button1{
        background-color: lightseagreen;
        color: white;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button2{
        background-color: mediumseagreen;
        color: white;
        height: 34px;
        width: 85px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button3{
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



<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Workpackage</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/work-package/create') }}" class="btn btn-success btn-sm" title="Add New WorkPackage">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/work-package') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <div>
                            <table>
                            
                                <thead>
                                    <tr>
                                        <th>#</th><th class="ps-4">Name</th><th class="ps-4">Work Package Details</th><th class="ps-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($workpackage as $item)
                                    <tr>
                                        <td class="align-top">{{ $item->id }}</td>
                                        <td class="align-top ps-4"><a href="{{ url('/admin/work-package/' . $item->id) }}" title="View WorkPackage" style="hover: red">{{ $item->name }}</a></td>
                                        <td class="ps-3">
                                            <details>
                                                <summary> Work description</summary>
                                                {!! $item->instructions !!}
                                            </details>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $workpackage->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
