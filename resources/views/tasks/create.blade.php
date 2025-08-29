@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">+ Add Task</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') ?? date('Y-m-d') }}" required>
        </div>

        @if(Auth::user()->role === 'admin')
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assign To</label>
                <select name="assigned_to" class="form-control">
                    <option value="">-- Select User --</option>
                    @foreach(App\Models\User::where('role','user')->get() as $user)
                        <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-success">Create Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
