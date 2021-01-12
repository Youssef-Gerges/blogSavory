<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostCat;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return (view('admin.add_post', ['cats'=>$cats]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title'=> 'required|max:255',
            'post-trixFields' => 'required',
            'categories' => 'required',
            'cover' => 'required'
        ]);

        if($valid){
            $post= Post::create([
                'po_title' => $request->input("title"),
                'po_content' => $request->input('post-trixFields')['po_content'],
                'po_us_id' => $request->user()->id,
                'post-trixFields' => $request->input('post-trixFields')
            ]);


            foreach($request->input('categories') as $cat){
                $pc = new PostCat();
                $pc->post_id = $post->id;
                $pc->cat_id = $cat;
                $pc->save();
            }
            $path = $request->file('cover')->storeAs('images', $post->id . '.jpeg');
            Image::updateOrCreate([
                'im_path' => $path,
                'im_post_id' => $post->id
            ]);
            return redirect()->route('post', ['post'=>$post->id]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        $cats = Category::all();
        return view('admin.edit_post', ['post'=>$post, 'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $valid = $request->validate([
            'title'=> 'required|max:255',
            'post-trixFields' => 'required',
            'categories' => 'required',
            'cover' => 'required'
        ]);

        if($valid){
            $post->update([
                'po_title' => $request->input("title"),
                'po_content' => $request->input('post-trixFields')['po_content'],
                'po_us_id' => $request->user()->id,
                'post-trixFields' => $request->input('post-trixFields')
            ]);


                //error_log($request->input('categories'));
                $cats = PostCat::where('post_id', $post->id)->delete();


            foreach($request->input('categories') as $cat){
                $pc = new PostCat();
                $pc->post_id = $post->id;
                $pc->cat_id = $cat;
                $pc->save();
            }
            $path = $request->file('cover')->storeAs('images', $post->id . '.jpeg');
            Image::updateOrCreate([
                'im_path' => $path,
                'im_post_id' => $post->id
            ]);
            return redirect()->route('post', ['post'=>$post->id]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
