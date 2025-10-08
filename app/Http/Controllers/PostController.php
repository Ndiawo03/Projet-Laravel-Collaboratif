<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($q = $request->query('q')) {
            $query->where('title', 'like', "%{$q}%")
                  ->orWhere('body', 'like', "%{$q}%");
        }

        if ($tag = $request->query('tag')) {
            $query->whereJsonContains('tags', $tag);
        }

        if ($author = $request->query('author')) {
            $query->where('user_id', $author);
        }

        $perPage = (int) $request->query('per_page', 15);

        return response()->json($query->latest()->paginate($perPage));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return response()->json($post, 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }

    public function stats()
    {
        return response()->json([
            'total' => Post::count(),
            'total_views' => Post::sum('views'),
            'avg_views' => (float) Post::avg('views'),
            'top_posts' => Post::orderByDesc('views')->take(5)->get(['id','title','views']),
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->query('q', '');
        $results = Post::where('title', 'like', "%{$q}%")
            ->orWhere('body', 'like', "%{$q}%")
            ->limit(50)
            ->get();

        return response()->json($results);
    }
}