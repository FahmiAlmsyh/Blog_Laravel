<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Auth::check()){
            return redirect('login');
        }
        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);

        // $data = [
        //     'posts' => $posts
        // ];

        // $posts = DB::table('posts')

        $posts =
        // ->select('id','title', 'content', 'created_at', 'updated_at')
        // ::where('active', true)
        Post::Status(true)
        // ->withTrashed()
        ->get();
        $total_active = $posts->count();
        $total_nonActive = Post::Status(false)->count();
        $total_dihapus = Post::onlyTrashed()->count();
        
        

        $view_data = [
            'posts' => $posts,
            'total_active' => $total_active,
            'total_nonActive' => $total_nonActive,
            'total_dihapus' => $total_dihapus,
        ];

        return view('posts.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect('login');
        }


        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!Auth::check()){
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);

        // $new_post = [
        //     count($posts) + 1,
        //     $title,
        //     $content,
        //     date('Y-m-d H:i:s')
        // ]; 
        // $new_post = implode(',', $new_post);

        // array_push($posts, $new_post);
        // $posts = implode("\n", $posts);
        
        // // nampilin data
        // Storage::write('posts.txt', $posts);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        if(!Auth::check()){
            return redirect('login');
        }

        $selected_post = Post::where('slug', $slug)->first();
    
        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);
        // $selected_post = Array();
        // foreach($posts as $post) {
        //     $post = explode(",", $post);
        //     if($post[0] == $id) {
        //         $selected_post = $post;
        //     }
        // }

        // "SELECT ... FROM posts WHERE id = $id"
        // $post = DB::table('posts')
        // $post = Post::selectById($id)
        //             // ->select('id', 'title', 'content', 'created_at')
        //             // ->where('id', '=', $id)
        //             ->first();
        $comments = $selected_post->comments()->get();
        $total_comments = $selected_post->total_comments();

        $view_data = [
            'posts'     => $selected_post,
            'comments'  => $comments,
            'total_comments' => $total_comments
        ];
        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        if(!Auth::check()){
            return redirect('login');
        }

        // $post = DB::table('posts')
        // ->select('id', 'title', 'content', 'created_at')
        $post = Post::where('slug', $slug)
        ->first();

        $view_data = [
            'posts' => $post
        ];

        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        if(!Auth::check()){
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        // "UPDATE ... WHERE id = $id"
        // DB::table('posts')
        Post::where('slug', $slug)
            ->update([
                'title' => $title,
                'content' => $content,
                // 'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect("posts/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(!Auth::check()){
            return redirect('login');
        }

        // DB::table('posts')
        Post::selectById($id)
        ->delete();

        return redirect('posts');
    }

    public function bin() {

        if(!Auth::check()){
            return redirect('login');
        }

        $bin_item = Post::onlyTrashed()->get();
        

        $data = [
            'posts' => $bin_item
        ];

        return view('posts.recyclebin', $data);
    }
}
