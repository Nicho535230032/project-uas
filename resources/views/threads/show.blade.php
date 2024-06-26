<div class="container mt-5">
    <h1 class="mb-4">{{ $thread->title }}</h1>
    <p>{{ $thread->body }}</p>
    <h2 class="mt-5">Replies</h2>
    <ul class="list-group mb-4">
        @foreach($thread->replies as $reply)
            <li class="list-group-item">{{ $reply->body }}</li>
        @endforeach
    </ul>
    <form action="{{ route('replies.store', $thread) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="body">Reply</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">