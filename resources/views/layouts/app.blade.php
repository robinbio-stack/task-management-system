<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h4>Task Manager</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('tasks.index') }}">Tasks</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('tasks.create') }}">Create Task</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
</body>
</html>
