<div class="container">
        <h1>{{ $thread->title }}</h1>
        <p>{{ $thread->body }}</p>
        <h2>Replies</h2>
        <ul>
            @foreach($thread->replies as $reply)
                <li>{{ $reply->body }}</li>
            @endforeach
        </ul>
    </div>