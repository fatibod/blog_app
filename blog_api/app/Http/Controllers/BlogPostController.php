<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogPosts = BlogPost::all();
        return view('blog.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blogPost = new BlogPost();
        $blogPost->title = $request->input('blogTitle'); 
        $blogPost->details = $request->input('blogDetails'); 
        $blogPost->featured_image_url = "";
        $blogPost->category_id = $request->input('Category'); 
        $blogPost->user_id = 0; 

        if($blogPost->save()){
            $photo = $request->file('featuredPhoto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(10000,50000).'.'.$ext;
                if($ext =='jpg' || $ext =='png'){
                    if($photo->move(public_path(), $fileName)){
                        $blogPost = BlogPost::find($blogPost->id);
                        $blogPost->featured_image_url = url('/').'/public/'.$fileName;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('success','Blog post information saved succesfully!!');
        } else {
            return redirect()->back()->with('failed','Blog post information could not save!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blogPost = BlogPost::find($id);
        $categories = Category::all();
        return view('blog.edit', compact('blogPost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blogPost = BlogPost::find($id);
        $blogPost->title = $request->input('blogTitle'); 
        $blogPost->details = $request->input('blogDetails'); 
        $blogPost->featured_image_url = "";
        $blogPost->category_id = $request->input('Category'); 
        $blogPost->user_id = 0; 

        if($blogPost->save()){
            $photo = $request->file('featuredPhoto');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName=rand(10000,50000).'.'.$ext;
                if($ext=='jpg' || $ext=='png'){
                    if($photo->move(public_path(), $fileName)){
                        $blogPost = BlogPost::find($blogPost->id);
                        $blogPost->featured_image_url = url('/').'/public/'.$fileName;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('success','Blog post updated succesfully!!');
        } else {
            return redirect()->back()->with('failed','Blog post could not update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(BlogPost::destroy($id)){
            return redirect()->back()->with('destroy','Blog post deleted succesfully!!');
        }
        return redirect()->back()->with('destroy-failed','Could not delete!!');
    }
}
