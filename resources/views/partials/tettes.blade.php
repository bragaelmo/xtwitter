@foreach($posts as $post)
    <div class="mb-4 p-4 border rounded">
        <strong>{{ $post->user->name }}</strong>
        <p>{{ $post->content }}</p>
        <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
    </div>
@endforeach
