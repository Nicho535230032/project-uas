<div class="container">
        <h1>{{ $thread->title }}</h1>
        <p>{{ $thread->body }}</p>
        <h2>Replies</h2>
        <ul>
            @foreach($thread->replies as $reply)
                <li>{{ $reply->body }}</li>
            @endforeach
        </ul>
        <form action="{{ route('replies.store', $thread) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Reply</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>