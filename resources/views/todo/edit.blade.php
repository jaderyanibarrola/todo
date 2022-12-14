@extends('todo.layout')
@section('content')
    <div class="card">
        <div class="card-header">Edit TO DO list</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('todo/' . $todo->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $todo->id }}" id="id" />
                <div class="row mb-3">
                    <div class="col">
                        <label>Title</label>
                    </div>
                    <div class="col">
                        <input type="text" name="title" id="title" value="{{ $todo->title }}" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Description</label>
                    </div>
                    <div class="col">
                        <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Priority</label>
                    </div>
                    <div class="col">
                        <input type="text" name="priority" id="priority" value="{{ $todo->priority }}"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Update" class="btn btn-success">
                        <a href="{{ route('todo.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
