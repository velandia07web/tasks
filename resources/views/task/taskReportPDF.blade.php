<!-- resources/views/task/taskReportPDF.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Task Report</title>
</head>
<body>
    <h1>Task Report for {{ $users->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <!-- Agrega más columnas si es necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <!-- Agrega más celdas según las columnas adicionales -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>