<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="mb-4">Task Manager</h4>
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('tasks.index') }}">📝 Tasks</a>
       
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger w-100">🚪 Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
