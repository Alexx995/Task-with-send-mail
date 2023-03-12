<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New task added</title>
</head>
<body>
<h1>New task added</h1>

<p>A new task has been added to your application:</p>

<ul>
    <li><strong>Task:</strong> {{ $task->name }}</li>
    <li><strong>User:</strong> {{ $user->name }}</li>

    <li><strong>Due date:</strong> {{ $task->created_at }}</li>
</ul>

<p>Thank you for using our application!</p>
</body>
</html>
