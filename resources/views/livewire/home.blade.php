<div class="grid xl:grid-cols-3 mt-4 gap-4">
    @foreach($posts as $post)
        <div class="flex flex-col justify-between border border-gray-500/30 rounded p-4 bg-gray-50">
            <a href="{{ route('details_post', ['id' => $post->id]) }}"><h1 class="text-xl font-bold text-gray-600">{{ $post->title }}</h1></a>
            <p class="text-gray-500 my-2">{{ $post->description }}</p>
            <div class="flex justify-between items-center">
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
    @endforeach
</div>
