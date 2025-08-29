<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Start query (do NOT call get() yet)
        $query = Task::with('assignedUser');

        // Admin sees all tasks, user sees only their tasks
        if ($user->role !== 'admin') {
            $query->where('assigned_to', $user->id);
        }

        // Apply filters if provided
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->due_date) {
            $query->whereDate('due_date', $request->due_date);
        }

        // Paginate results (10 per page)
        $tasks = $query->latest()->paginate(10)->withQueryString();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
