@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert-messages')
            <div class="card">
                <div class="card-header">
                    <span class="title">Detailed Task View</span>
                    <a href="{{ route('edit_task', $task->id) }}" class="btn btn-sm btn-primary text-light float-right">Edit <i class="fa fa-edit ml-1"></i></a>
                    <a href="{{ route('show_tasks') }}" class="btn btn-sm btn-warning text-dark float-right mr-2"><i class="far fa-caret-square-left mr-1"></i> Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="task-title">{{ $task->task_title }}</h1>
                    <p class="description text-muted">{{ $task->task_description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
