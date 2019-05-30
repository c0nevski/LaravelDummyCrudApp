@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert-messages')
            <div class="card">
                <div class="card-header">
                    <span class="title">Task List</span>
                    <a href="{{ route('add_task') }}" class="btn btn-success btn-sm text-light float-right">Add Task <i class="fas fa-plus ml-1"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="task-list">
                        @if ( count($tasks) < 1 )
                            <p class="text-muted p-0 m-0">Your task-list is empty.</p>
                        @endif
                        
                        @foreach ($tasks as $task)
                            
                            <li class="task-item d-flex justify-content-between align-items-end">

                                <span class="item-title"><a href="{{ route('show_single_task', $task->id) }}">{{ $task->task_title }}</a></span>

                                <form action="{{ route('delete_task', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="submit item-delete ml-1 text-danger" type="submit">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>                                
                                </form>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
