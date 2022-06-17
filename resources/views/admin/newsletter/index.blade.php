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
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
                @endif
                    <div class="card-header">newsletter</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/newsletter/create') }}" class="btn btn-success btn-sm" title="Add New newsletter">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/newsletter') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th class="ps-4">Title</th><th class="ps-4">Article</th><th class="ps-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($newsletter as $item)
                                    <tr>
                                        <td class="align-top">{{ $item->id }}</td>
                                        <td class="align-top ps-4"><a href="{{ url('/admin/newsletter/' . $item->id) }}" title="View newsletter" style="hover: red">{!! $item->title !!}</a></td>
                                        <td class="ps-3">
                                            <details>
                                                <summary> Article</summary>
                                                {!! $item->article !!}
                                            </details>
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/newsletter/' . $item->id) }}" title="View article"><button class="button2"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/newsletter/' . $item->id . '/edit') }}" title="Edit Newsletter"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/newsletter' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3 bg-danger" title="Delete Newsletter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $newsletter->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
