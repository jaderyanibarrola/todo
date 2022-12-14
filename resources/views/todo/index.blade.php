@extends('todo.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>My TODO list</h2>
                    </div>
                    <div class="card-body col-sm-12 col-md-10 offset-md-1">
                        <a href="{{ url('/todo/create') }}" class="btn btn-success btn-sm" title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-sm" title="Cancel">
                            <i class="fa fa-close" aria-hidden="true"></i> Go Back
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($todo as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
 
                                        <td>
                                            <a href="{{ url('/todo/' . $item->id) }}" title="View"><button class="btn btn-info btn-sm small"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/todo/' . $item->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm small"><i class="fa-solid fa-pencil" aria-hidden="true"></i></button></a>
 
                                            <form method="POST" action="{{ url('/todo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm small" title="Delete" onclick="return confirm(&quot;Confirm delete of '{{$item->title}}'?&quot;)"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection