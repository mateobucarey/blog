<x-app-layout>


    <div class="">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" text-gray-900 dark:text-gray-100">

                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-80 object-cover ">

                    <div class=" p-6">

                    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100"> {{ $post->title  }}</h1>
                       

                        <p class="text-lg mt-2">{!!$post->content !!}</p>

                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Categorías:</h3>
                            <ul>
                                @foreach($post->categories as $category)
                                <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Autor:</h3>
                            <p>{{ $post->user->name }}</p>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Plataforma:</h3>
                            <p>{{ $post->plataforma }}</p>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Puntaje:</h3>
                            <p>{{ $post->puntaje }}</p>
                        </div>


                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Fecha de publicación:</h3>
                            <p>{{ $post->created_at->format('d M, Y') }}</p>
                        </div>

                    </div>
                </div>
            </div>
</x-app-layout>