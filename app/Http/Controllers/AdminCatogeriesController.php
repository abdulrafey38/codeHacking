<?php

namespace App\Http\Controllers;
use App\Catogery;
use Illuminate\Http\Request;

class AdminCatogeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catogery = Catogery::all();
        return view('admin.categories.index',compact('catogery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cat = new Catogery();
        $cat->name = $request->name;
        $cat->save();
        \Session::flash('create_catogery','Catogery Created!!');
        return redirect('/admin/catogeries');
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
        $catogery = Catogery::findOrFail($id);
        return view('admin.categories.edit',compact('catogery'));
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
        Catogery::find($id)->update($request->all());
        \Session::flash('update_catogery','Catogery Updated!!');
        return \redirect('admin/catogeries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catogery::findOrFail($id)->delete();
        \Session::flash('deleted_catogery','The Catogery has been deleted successfully!!');
        return \redirect('admin/catogeries');
    }
}
