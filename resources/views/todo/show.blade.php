@extends('todo.layout')
@section('content')
    <div class="card">
        <div class="card-header">TODO List</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Title : {{ $todo->title }} {!! $todo->badge[0] !!}</h5>
                <p class="card-text">Description : {{ $todo->description }}</p>
                <p class="card-text">Priority : {{ $todo->priority }}</p>
                <p class="card-text">Date created : {{ date('d F Y H:i:s', strtotime($todo->created_at)) }}</p>
            </div>

            <hr>
            <a href="{{ url('/todo/' . $todo->id . '/edit') }}" title="Edit"><button class="btn btn-primary small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            <a href="{{ route('todo.index') }}" class="btn btn-secondary">Go Back</a>

        </div>
    </div>
@endsection
