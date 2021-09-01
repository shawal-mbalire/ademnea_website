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
                    <div class="card-header">Research Profile</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/research-profile/create') }}" class="btn btn-success btn-sm" title="Add New research-profile">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/research-profile') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Category</th><th>Country</th><th>Description</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($profile as $item)
                                    <tr>
                                        <td class="align-top">{{ $item->id }}</td>
                                        <td class="align-top">{{ $item->category }}</td>
                                        <td class="align-top">{{ $item->country }}</td>
                                        <td><details><summary>
                                            research profile {{ $item->id }}
                                        </summary>
                                        {!! $item->description !!}                                    
                                    </details></td>
                                        <td>
                                            <a href="{{ url('/admin/research-profile/' . $item->id) }}" title="View research-profile"><button class="button2"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/research-profile/' . $item->id . '/edit') }}" title="Edit research-profile"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/research-profile' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3" title="Delete research-profile" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $profile->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
