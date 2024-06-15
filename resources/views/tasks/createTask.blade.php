@extends('layouts.app')

@section('content')

  
    <div class="card o-hidden border-0 shadow-lg my-5"></div>  
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-7 ">
                <div class="p-5 card offset-md-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create Task</h1>
                    </div>
                    <form class="card-body" action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control @error('description') is-invalid @enderror">
                                <option>Select Values</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                
                              </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Task</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
