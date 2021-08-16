@extends('layouts.app')

@section('content')

<style>
    .card-body{
        background-color: rgb(187, 199, 187);


    }

    .card-header{
        background-color: grey;
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Abbreviation</th><th>Description</th><th>Task</th><th>Partners</th><th>Deliverables</th><th>Interdependances</th><th>Potential_innovetions</th><th>Activity</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($workpackage as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->abbreviation }}</td><td>{{ $item->description }}</td><td>{{ $item->task }}</td><td>{{ $item->partners }}</td><td>{{ $item->deliverables }}</td><td>{{ $item->interdependances }}</td><td>{{ $item->potential_innovetions  }}</td><td><img src="{{asset($item->activity)}}" alt=""></td>
                                        <td>
                                            <a href="{{ url('/admin/work-package/' . $item->id) }}" title="View WorkPackage"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/work-package/' . $item->id . '/edit') }}" title="Edit WorkPackage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <a href="{{ url('/admin/gallery') }}" class="btn btn-success btn-sm" title="Attach Activity">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add Activity
                                            </a>

                                            <form method="POST" action="{{ url('/admin/work-package' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete WorkPackage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
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
