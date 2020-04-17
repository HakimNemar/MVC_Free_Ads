<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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

    public function show($id)
    {
        $user = DB::select('select * from users where id = ?', [$id]);
        
        if ($user) {
            return view("profile", compact("user"));
        } else {
            abort(404, 'Page not found');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $validateData = null;
            if ($user->email === $request['email'] && $user->name != $request['name']) {
                $validateData = $request->validate([
                    'name' => 'required|min:2',
                ]);
            } 
            elseif ($user->name != $request['name'] || $user->email != $request['email']) {
                $validateData = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users'
                ]);
            }

            if ($validateData) {
                $user->name = $request['name'];            
                $user->email = $request['email'];
                $user->save();
                $request->session()->flash('success', 'Your profile is updated !');
                
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function showPassword($id) 
    {
        $user = User::find($id);
        return view("changePassword", compact("user"));
    }

    public function changePassword(Request $request, $id) 
    {
        $user = User::find($id);
        $validateData = null;

        if (Hash::check($request["current-password"], $user->password)){
            if ($request['password'] === $request['password_confirmation']) {
                $validateData = $request->validate([
                    'password' => 'required|min:8',
                ]);
            } else {
                $request->session()->flash('warningnew', 'Your new password is not same !');
                return redirect()->back();
            }
        } else {
            $request->session()->flash('warning', 'Your current password is not same !');
            return redirect()->back();
        }

        if ($validateData) {
            $user->password = Hash::make($request['password']);
            $user->save();

            $request->session()->flash('success', 'Your password is updated !');
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
