@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">ToDo. List</h4>
            <form action="{{ route('tasks.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" value="{{ $search }}" class="form-control me-2" placeholder="Search tasks...">
                <button class="btn btn-light btn-sm">Search</button>
            </form>
        </div>
        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">+ Add New Task</a>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <span class="badge bg-{{ $task->status == 'pending' ? 'warning' : 'success' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    <p class="text-center text-white ">IDN BOARDING SCHOOL SOLO</p>
@endsection
