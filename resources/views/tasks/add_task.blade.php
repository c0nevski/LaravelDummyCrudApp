@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="title">Create a new task</span>
                    <a href="{{ route('show_tasks') }}" class="btn btn-sm btn-warning text-dark float-right"><i class="far fa-caret-square-left mr-1"></i> Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/tasks" method="POST">
                        @csrf
                        @include('alert-messages')
                        <div class="form-group">
                            <label for="taskTitle">Task title:</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" aria-describedby="taskTitle" placeholder="Enter the task title" value="{{ old('taskTitle') }}" required>
                            <small id="taskTitle" class="form-text text-muted">Enter the title of the task</small>
                        </div>
                        <div class="form-group">
                            <label for="taskDescription">Task description:</label>
                            <textarea name="taskDescription" id="taskDescription" class="form-control" cols="30" rows="5" placeholder="Enter the task description">{{ old('taskDescription') }}</textarea>
                            <small class="form-text text-muted">Enter the description for the new task</small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
