<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \DB::table('users')->orderBy('id','desc')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|max:100',
            'age'=>'required|numeric|min:0|max:100',
            'address'=>'required|max:300',

        ],[
            'name.required'=>'Type name product please',
            'name.max'=>'Name product maximum 100 digit',
            'age.required'=>'Type price product please',
            'age.numeric'=>'Price product is number',
            'age.max'=>'Price product maximum 10 digit',
            'address.required'=>'Type description product please',
            'address.max'=>'Description maximum 300 digit',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->address = $request->address;

        if($request->hasFile('file')){
            $file  = $request->file;
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $user->link = $file->getClientOriginalName();
            $user->save();
        }
        else {
            $user->link = 'No_image.jpg';
            $user->save();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->age = $request->age;
        $user->address = $request->address;
        if($request->hasFile('file')){
            $file  = $request->file;
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $user->link = $file->getClientOriginalName();
            $user->save();
        }
        else {
            $user->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
