@extends('layouts.dashboard')

@section('content')
<div class="container">
     <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📝 Task List</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Add Task</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Form -->
    <form method="GET" class="row mb-4">
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">-- Status --</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="in-progress" {{ request('status')=='in-progress'?'selected':'' }}>In Progress</option>
                <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Completed</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="due_date" value="{{ request('due_date') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assignedUser->name ?? 'N/A' }}</td>
                    <td>
                        @if($task->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($task->status === 'in-progress')
                            <span class="badge bg-primary">In Progress</span>
                        @else
                            <span class="badge bg-success">Completed</span>
                        @endif
                    </td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        @if(Auth::user()->role === 'admin')
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
