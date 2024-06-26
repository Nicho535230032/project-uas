<div class="container">
        <h1>Threads</h1>
        <a href="{{ route('threads.create') }}" class="btn btn-primary">Create New Thread</a>
        <ul>
            @foreach($threads as $thread)
                <li>
                    <a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a>
                    <p>{{ $thread->body }}</p>
                    @if($thread->has_new_reply)
                        <span class="badge badge-warning">NEW REPLY</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>