@extends('layouts.app')

@section('content')
<h1>{{ isset($task) ? 'Edit Task' : 'Add Task' }}</h1>
<form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
    @csrf
    @if(isset($task))
    @method('PUT')
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $task->description ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ (old('status', $task->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ (old('status', $task->status ?? '') == 'completed') ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">{{ isset($task) ? 'Update' : 'Save' }}</button>
</form>
@endsection
