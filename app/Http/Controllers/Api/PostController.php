<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 15);
        if ($per_page < 1 || $per_page > 100) {
            return response()->json(['success' => false], 400);
        }

        $posts = Post::with('user')->with('category')->with('tags')->paginate($per_page);

        return response()->json([
            'success'   => true,
            'result'  => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'tags'])->where('slug', $slug)->first();

        if ($post) {
            return response()->json([
                'success'   => true,
                'result'    => $post
            ]);
        } else {
            return response()->json([
                'success'   => false,
            ]);
        }
    }

    // Restituisce 9 post random per la homepage in Vue
    public function random()
    {
        $sql = Post::with(['user', 'category', 'tags'])->limit(9)->inRandomOrder();
        $posts = $sql->get();

        return response()->json([
            // 'sql'       => $sql->toSql(), // solo per debugging
            'success'   => true,
            'result'    => $posts,
        ]);
    }
}
