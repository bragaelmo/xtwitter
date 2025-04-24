@foreach($posts as $post)
    <div class="mb-4 p-4 border rounded">
        <strong>{{ $post->user->name }}</strong>
        <p>{{ $post->content }}</p>
        <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
        <form action="{{ route('posts.like', $post) }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-sm text-blue-600 hover:underline">
                {{ $post->isLikedBy(auth()->user()) ? 'Descurtir' : 'Curtir' }}
                ({{ $post->likes->count() }})
            </button>
        </form>
    </div>
@endforeach
