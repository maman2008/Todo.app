<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $tasks = tasks::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })->paginate(5);

        return view('tasks.index', compact('tasks', 'search'));
    }

  
    public function create()
    {
        return view('tasks.create');
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        tasks::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

   
    public function edit(tasks $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, tasks $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    public function destroy(tasks $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
