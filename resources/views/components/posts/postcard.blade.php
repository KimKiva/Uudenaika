@props(['post'])

<div class="bg-white rounded-xl shadow-sm p-4 flex flex-col h-full">
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <img class="w-100 rounded-xl mb-3" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
    </a>

    <div class="flex items-center mb-2 gap-x-2">
        @if ($category = $post->categories->first())
            <x-posts.category-badge :category="$category" />
        @endif
        <p class="text-gray-500 text-sm">{{ $post->published_at->format('d.m.Y') }}</p>
    </div>

    <a wire:navigate href="{{ route('posts.show', $post->slug) }}"
        class="text-lg font-bold text-gray-900 hover:underline">
        {{ $post->title }}
    </a>
</div>
