<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    //
    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('adminprofile', ['data' => $user]);


    }
}
