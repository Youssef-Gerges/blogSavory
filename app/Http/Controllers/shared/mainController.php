<?php

namespace App\Http\Controllers\shared;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\View;

class mainController extends Controller
{
    public function __construct()
    {
        $cats = Category::limit(4)->get();
        View::share('cats', $cats);
    }
    public function index()
    {
        $posts = Post::paginate(10);
        return view('shared.index', ['posts'=>$posts?? []]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::where('po_title', 'like', "%$query%")->paginate(10);
        return view('shared.index',  ['posts'=>$posts?? []]);
    }

    public function category(Request $request, Category $cat)
    {
        $posts = $cat->posts()->paginate(10);
        return view('shared.index',  ['posts'=>$posts ?? []]);

    }
    public function post(Request $request, Post $post)
    {

        return view('shared.single_blog_page', ['post'=> $post]);

    }

    public function about()
    {
        return view('shared.about');
    }
    public function privacy()
    {
        return view('shared.privacy');
    }
    public function contact()
    {
        return view('shared.contact');
    }

    public function comment(Request $request)
    {
        $com = new Comment();
        $com->co_email = $request->email;
        $com->co_name = $request->name;
        $com->co_website = $request->website;
        $com->post_id = $request->id;
        $com->co_text = $request->message;
        $com->save();

        return redirect()->route('post', ['post'=>$request->id]);
    }
}
