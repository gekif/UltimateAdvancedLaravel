<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {
            $post = Post::findOrFail($id);

        } catch (ModelNotFoundException $exception) {
            abort(404, "Page Not Found");
        }

        return view('post')->withPost($post);

    }


    public function showAllPosts()
    {
        $posts = Post::all();

        return view('posts')->with(['posts' => $posts]);

    }


    public function storePost()
    {
        $req = request();

        $this->validate($req, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => $req->title,
            'body' => $req->body
        ]);
    }

}
