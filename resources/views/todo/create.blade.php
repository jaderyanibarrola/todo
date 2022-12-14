@extends('todo.layout')
@section('content')
    <div class="card row">
        <div class="card-header">Add a to do list</div>
        <div class="card-body col-sm-12 col-md-6 offset-md-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('todo') }}" method="post">
                {!! csrf_field() !!}
                <div class="row mb-3">
                    <div class="col">
                        <label>Title</label>
                    </div>
                    <div class="col">
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Description</label>
                    </div>
                    <div class="col">
                        <textarea name="description" id="description" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Priority</label>
                    </div>
                    <div class="col">
                        <input type="number" name="priority" id="priority" max="1" min="0" class="form-control" value="{{ old('priority') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="submit" value="Save" class="btn btn-success">
                        <a href="{{ route('todo.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
