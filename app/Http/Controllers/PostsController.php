<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //追記

class PostsController extends Controller
{
    //
    public function createForm()
    {
        return view('posts.createForm');
    }

    public function create(Request $request)

    {

        $request->validate([
            'newName' => 'required|max:100',
            'newPost' => 'required|max:100',
        ]);

        $name = $request->input('newName');
        $contents = $request->input('newPost');


        DB::table('posts')->insert([
            'user_name' => $name,
            'contents' => $contents

        ]);

        return redirect('home');
    }

    // public function updateForm()

    // {

    //     $post = DB::table('posts')

    //         ->where('id', 1)

    //         ->first();

    //     return view('posts.updateForm', compact('post'));
    // }

    public function updateForm($id)

    {

        $post = DB::table('posts')

            ->where('id', $id)

            ->first();

        return view('posts.updateForm', ['post' => $post]);
    }

    public function update(Request $request)

    {

        $request->validate([
            'upName' => 'required|max:100',
            'upPost' => 'required|max:100',
        ]);

        $id = $request->input('id');

        $up_name = $request->input('upName');

        $up_post = $request->input('upPost');

        DB::table('posts')

            ->where('id', $id)

            ->update(

                [
                    'contents' => $up_post,
                    'user_name' => $up_name
                ],


            );

        return redirect('home');
    }

    public function delete($id)

    {

        DB::table('posts')

            ->where('id', $id)

            ->delete();



        return redirect('home');
    }


    // public function search(request $request)
    // {
    //     $search = $request->input('search');

    //     $posts = Post::where('contents', 'like', '%{$request->search}%')
    //         ->orWhere('user_name', 'like', '%{$request->search}%')
    //         ->paginate(5);
    //     // ->get();

    //     return view('home', ['posts' => $posts]);
    //     // return view('home', compact('post'));
    //     // return view('home', ['list' => $posts]);
    //     // dd($request->search);
    // }

    public function search(request $request)
    {


        $search = $request->input('search');

        $query = Post::query();


        if ($search == "") {
            $query->where('contents', 'LIKE', "%{$search}%")
                ->orWhere('user_name', 'LIKE', "%{$search}%");
            $posts = $query->get();
            return view('home', compact('posts', 'search'));
            // } elseif ($search == 0) {
            //     return view('home', compact('posts', 'search'));
        } else {
            $query->where('contents', 'LIKE', "%{$search}%")
                ->orWhere('user_name', 'LIKE', "%{$search}%");
            $posts = $query->get();

            return view('home', compact('posts', 'search'));
        }

        // if (!empty($search)) {
        //     $query->where('contents', 'LIKE', "%{$search}%")
        //         ->orWhere('user_name', 'LIKE', "%{$search}%");
        // }
        // $posts = $query->get();

        // return view('home', compact('posts', 'search'));

    }
}
