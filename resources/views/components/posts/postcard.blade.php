@props(['post'])

<div class="bg-white rounded-xl shadow-sm p-4 flex flex-col h-full">
    <a href="#">
        <img class="w-full rounded-xl mb-3" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
    </a>

    <div class="flex items-center mb-2 gap-x-2">
        @if ($category = $post->categories()->first())
            <x-badge wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}" :textColor="$category->text_color"
                :bgColor="$category->bg_color">
                {{ $category->title }}
            </x-badge>
        @endif
        <p class="text-gray-500 text-sm">{{ $post->published_at->format('d.m.Y') }}</p>
    </div>

    <a href="#" class="text-lg font-bold text-gray-900 hover:underline">
        {{ $post->title }}
    </a>
</div>
