<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Threads</h1>
        <a href="{{ route('threads.create') }}" class="btn btn-primary mb-4">Create New Thread</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-4">Back to Dashboard</a>
        <ul class="list-group">
            @foreach($threads as $thread)
                <li class="list-group-item">
                    <a href="{{ route('threads.show', $thread) }}" class="font-weight-bold">{{ $thread->title }}</a>
                    <p>{{ $thread->body }}</p>
                    @if($thread->has_new_reply)
                        <span class="badge badge-warning">NEW REPLY</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
