<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controll1er;
use App\Post;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store everything that is return from the database to the variable
        $posts = Post::orderBy('id','desc')->paginate(8);
        //Create a view that contains the created variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //i am validating the data before submitting it

        $this->validate($request, array(

            'title' => 'required|max:255',
            'body' => 'required'

        ));

        $post = new POST;
        $post->id = $request->id;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        //Sending flash message after storing data successfully
        Session::flash('success', 'Your blog post message was successful!');

        //Redirecting
        return redirect()->route('posts.show', $post->id);


        // store the data after validating


        //After successfully storing the data redirect the user to another page
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the post in the database and store it as a variable
        $post = Post::find($id);


        //return the view
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //firstly validate the data
        //i am validating the data before submitting it

        $this->validate($request, array(

            'title' => 'required|max:255',
            'body' => 'required'

        ));

        //Store the data
        // update the existing field
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        //set flash with a success message
        Session::flash('success','Post update was successfully saved');

        //Redirect with flash data to the post list page
        return redirect()-> route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the id of the item to be deleted

        $post = Post::find($id);

        //Delete the item from the database
        $post -> delete();

        //Route back to the view page
        Session::flash('success', 'The post has successfully been deleted');
        return  redirect()-> route('posts.index');

    }
}
