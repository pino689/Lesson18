<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //追記

class Post extends Model
{
    //

    public function index()

    {
        $list = DB::table('posts')->get();
        return view('home', ['list' => $list]);
    }
}
