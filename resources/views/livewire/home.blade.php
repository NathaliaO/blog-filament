<div class="container mx-auto py-4">
    <div class="flex items-center space-x-2">
        <img class="w-12 h-12" src="https://rockbuzz.com.br/images/site/favicon.png">

        <div class="flex-1">
            <h1 class="text-2xl font-bold text-gray-600">Bem vindo ao blog da {{ config('app.name') }}</h1>
            <p class="text-gray-500">Aproveite os melhores conteúdos para sua empresa decolar no mundo digital.</p>
        </div>

        <div class="text-gray-500 font-bold">
            @guest
                <a class="flex items-center" href="{{ \Filament\Facades\Filament::getLoginUrl() }}">
                    <x-heroicon-c-arrow-right-end-on-rectangle class="w-5 h-5 mr-1"/>
                    Login
                </a>
            @else
                <button wire:click.prevent="logout">Logout</button>
            @endguest
        </div>
    </div>


    <div class="grid xl:grid-cols-3 mt-4 gap-4">
        @foreach(\App\Models\Post::where('status', 'publicado')->get() as $post)
            <div class="flex flex-col justify-between border border-gray-500/30 rounded p-4 bg-gray-50">
                <h1 class="text-xl font-bold text-gray-600">{{ $post->title }}</h1>
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
</div>
