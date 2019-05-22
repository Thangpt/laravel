<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    function __construct()
    {
        if(Auth::check()){
            view()->share('user',Auth::user());
        }
    }

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getName($name)
    {
        return "Your name is " . $name;
    }

    public function getCategory()
    {
        $category = Category::all();
//        foreach ($category as $item){
//            echo "<p>$item->category_name</p>";
//        }
        return view('category', ['category' => $category]);
    }

    public function getProduct()
    {
        $product = Product::all();
        return view('product', ['product' => $product]);
    }

    public function check(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $admin = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2
        ];
        if (Auth::attempt($admin)) {
            //true
            return redirect('admin');
        } else if (Auth::attempt($data)) {
            return redirect('home');
        } else {
            //false
            return view('auth/login')->withErrors('Wrong user name');
        }
    }

    public function admin()
    {
        $category = Category::all();
//        foreach ($category as $item){
//            echo "<p>$item->category_name</p>";
//        }
        return view('admin', ['category' => $category]);

    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('adminprofile', ['data' => $user]);


    }
}
