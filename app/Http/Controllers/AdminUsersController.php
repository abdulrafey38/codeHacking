<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEdit;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Auth;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\URL;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles =  Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::Create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
            $input['password'] = bcrypt($request->password);
            User::Create($input);
            Session::flash('create_user','The User has been created successfully!!');
            return redirect('/admin/users');

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
        $roles =  Role::pluck('name','id')->all();
        $user = User::find($id);

        return view('admin.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEdit $request, $id)
    {
        if(trim($request->password) == '')
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user = User::find($id);

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::Create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }

            $user->update($input);
            Session::flash('update_user','The User has been updated successfully!!');
            return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        unlink( public_path()."/images/" . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user','The User has been deleted successfully!!');
        return redirect('admin/users');
    }
}
