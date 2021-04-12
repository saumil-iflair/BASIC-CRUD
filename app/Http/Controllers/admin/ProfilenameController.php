<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfilenameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/profile/create');
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
    public function edit()
    {
        if(Auth::user())
        {
            $user=User::find(Auth::user()->id);

            if($user)
            {
            return view('admin.profile.create')->withUser($user);
            }
            else
            {

            }
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request)
    {

        // dd($request);

        $user= User::find(Auth::user()->id);

        if($user){

            $validate=null;

            if(Auth::user()->email === $request['email'])
            {
                $validate=$request->validate([
                    'name'=>'required|min:2',
                    'email'=>'required|email'
                ]);
            }
                else{
                    $validate=$request->validate([
                        'name'=>'required|min:2',
                        'email'=>'required|email|unique:users'
                    ]);
                }

            // $validate=$request->validate([
            //     'name'=>'required|min:2',
            //     'email'=>'required|email|unique:users'
            // ]);

                if($validate){

            $user->name=$request['name'];
            $user->email=$request['email'];

            $user->save();
            $request->session()->flash('success','Your details have now been updated..!');
            return redirect()->back();
                            }
                            else{
                               return redirect()->back();
                            }
        }
        else{
            return redirect()->back();
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
