@foreach($posts as $post)
    <div class="mb-4 p-4 border rounded">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-lg">
                {{ strtoupper(substr($post->user->name, 0, 1)) }}
            </div>
            <strong>{{ $post->user->name }}</strong>
        </div>
        <div>
            <p class="break-words text-gray-800">{{ $post->content }}</p>
        </div>
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
