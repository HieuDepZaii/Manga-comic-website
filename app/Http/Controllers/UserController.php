<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function formDSUser(){
        $user =User::all();
        return view('admin.users.XemDSUser',['user' => $user]);
    }
    public function xoaUser($id){
        $user =User::findOrFail($id);
        $user->delete();
        return redirect(''.route('admin.formDSUser').'');
    }

}
