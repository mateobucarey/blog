<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function indexAdmin()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function index(Request $request)
    {
        $categoryId = $request->get('category_id');
        $posts = Post::when($categoryId, function ($query, $categoryId) {
            return $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            });
        })->get();
    
        $categories = Category::all();
    
        return view('welcome', compact('posts', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

   
    public function store(StorePostRequest $request)
    {
      
    
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->is_published = $request->is_published? true : false;
        $post->plataforma = $request->plataforma;
        $post->puntaje = $request->puntaje;


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('storage/thumbnails'), $filename);
            $post->thumbnail = $filename;
        }

        $post->user_id = auth()->id();
        $post->save();
       
        foreach ($request->categories as $categoryId) {
            $post->categories()->attach($categoryId);
        }

     
    
        return redirect()->route('posts.index');
    }

    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

     
    public function update(UpdatePostRequest $request, Post $post)
    {
      
    
        $data = $request->only('title', 'content', 'is_published', 'plataforma', 'puntaje');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('storage/thumbnails'), $filename);
            $data['thumbnail'] = $filename;
        }
    
        $post->update($data);
    
        $post->categories()->sync($request->categories);
    
        return redirect()->route('posts.index');
    }

    
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
