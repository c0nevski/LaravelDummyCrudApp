@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="title">Task Edit</span>
                    <a href="{{ route('show_single_task', $task->id) }}" class="btn btn-sm btn-warning text-dark float-right"><i class="far fa-caret-square-left mr-1"></i> Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('alert-messages')
                    <form action="{{ route('update_task', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="taskTitle">Task title:</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" aria-describedby="taskTitle" placeholder="Enter the task title" value="{{ $task->task_title }}" required>
                            <small id="taskTitle" class="form-text text-muted">Enter the title of the task</small>
                        </div>
                        <div class="form-group">
                            <label for="taskDescription">Task description:</label>
                            <textarea name="taskDescription" id="taskDescription" class="form-control" cols="30" rows="5" placeholder="Enter the task description">{{ $task->task_description }}</textarea>
                            <small class="form-text text-muted">Enter the description for the new task</small>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
