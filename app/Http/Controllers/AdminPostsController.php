<?php

use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Http\Requests\postcreaterequest ;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Catogery;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catogery = Catogery::pluck('name','id')->all();
        return view('admin.posts.create',compact('catogery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postcreaterequest $request)
    {


        $input = $request->all();
        $user = Auth::user();
        if($file= $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }

        $user->posts()->create($input);
        \Session::flash('create_post','The Post has been Created!!');
        return redirect('admin/posts');
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
    public function edit($id)
    {
        $post = Post::find($id);
        $catogery = Catogery::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','catogery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token', '_method' ]);
        if($file= $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        Auth::user()->posts()->whereId($id)->update($input);
        \Session::flash('Post_update','Updated successfully!!');
        return redirect('/admin/posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        unlink( public_path()."/images/" . $post->photo->file);
        $post->delete();
        \Session::flash('deleted_post','The Post has been deleted successfully!!');
        return redirect('admin/posts');
    }
}
