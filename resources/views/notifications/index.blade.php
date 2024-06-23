<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Notifications</h1>
    @if($notifications->isEmpty())
        <p>No new notifications.</p>
    @else
        @foreach ($notifications as $notification)
            <div class='notification'>
                <p>{{ htmlspecialchars($notification->message) }}</p>
                <small>Posted on {{ $notification->created_at }}</small>
            </div>
            <hr>
        @endforeach
    @endif
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>
</html>
