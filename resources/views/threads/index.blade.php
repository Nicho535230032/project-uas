<div class="container">
        <h1>Threads</h1>
        <a href="{{ route('threads.create') }}" class="btn btn-primary">Create New Thread</a>
        <ul>
            @foreach($threads as $thread)
                <li>
                    <a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a>
                    <p>{{ $thread->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>