<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block">Título</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full px-3 py-2 rounded">
                        </div>

                        <div class="mb-6">
                            <label for="content" class="block">Contenido</label>
                            <textarea id="content" hidden name="content">{{ old('content', $post->content) }}</textarea>
                            <trix-editor input="content"></trix-editor>
                        </div>

                        <div class="mb-4">
                            <label for="thumbnail" class="block">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="w-full">
                            <img id="thumbnail-preview" src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" class="w-1/4 mt-2">
                        </div>

                        <div class="mb-4">
                            <label for="plataforma" class="block">Plataforma</label>
                            <input type="text" id="plataforma" name="plataforma" value="{{ old('plataforma', $post->plataforma) }}" class="w-full px-3 py-2 rounded">
                        </div>

                        <div class="mb-4">
                            <label for="puntaje" class="block">Puntaje</label>
                            <input type="number" id="puntaje" name="puntaje" step="0.1" min="0" max="10" value="{{ old('puntaje', $post->puntaje) }}" class="w-full px-3 py-2 rounded">
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block">Autor</label>
                            <select name="user_id" id="user_id" class="w-full px-3 py-2 rounded">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="categories" class="block">Categorías</label>
                            @foreach($categories as $category)
                                <div class="mt-2">
                                    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
                                    <label for="category_{{ $category->id }}" class="ml-2">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-4 flex gap-2">
                            <label for="is_published">Visible?</label>
                            <input type="checkbox" id="is_published" name="is_published" value="1" {{ $post->is_published ? 'checked' : '' }}>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
