<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function dashBoard(Request $request)
    {
        $user_id = $request->user()->id;
        $posts = Post::where('po_us_id', $user_id)->get();
        return view('admin.index', ['posts'=> $posts]);
    }
}
