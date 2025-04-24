<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10">
        <form action="{{ route('posts.store') }}" method="POST" class="mb-6">
            @csrf
            <textarea name="content" class="w-full border rounded p-3" rows="3" placeholder="O que está acontecendo?" required></textarea>
            <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Postar</button>
        </form>

        <hr class="mb-4">

        @foreach($posts as $post)
            <div class="mb-4 p-4 border rounded">
                <strong>{{ $post->user->name }}</strong>
                <p>{{ $post->content }}</p>
                <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
</x-app-layout>
