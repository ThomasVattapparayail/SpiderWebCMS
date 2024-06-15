@extends('layouts.app')

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5"></div>  
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-7 ">
                <div class="p-5 card offset-md-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Task</h1>
                    </div>
                    <form class="card-body" action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $task->title }}" >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Discription:</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $task->description }}" >
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">status:</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="{{$task->status?'pending':'completed'}}" {{ $task->status == "pending"? 'selected' : '' }}>{{$task->status?'pending':'completed'}}</option>
                                <option value="{{$task->status?'completed':'pending'}}" {{ $task->status == "completed"? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update task</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
   

@endsection
