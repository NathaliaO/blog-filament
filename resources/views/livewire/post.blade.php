<div class="container mt-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $post->created_at->format('M d, Y') }}</p>
        <div class="prose lg:prose-xl">
            {!! $post->description !!}
        </div>
        <div class="flex justify-end mt-8">
            <div class="flex items-center space-x-4">
                <p class="flex">
                    <x-heroicon-c-heart class="w-6 h-6 text-red-500"/> {{ $post->likes }}
                </p>
                @if(!in_array($post->id, session('posts-liked', [])))
                    <button wire:click.prevent="incrementLikes({{ $post->id }})" class="flex justify-center items-center px-5 py-2 border text-gray-500 border-gray-500/30 rounded transition group hover:text-gray-700">
                        <x-heroicon-c-heart class="w-6 h-6 group-hover:text-red-500 transition"/>
                        Gostei
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
