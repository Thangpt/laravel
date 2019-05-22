<?php

namespace App\Http\Controllers;

use App\ProductRepository;
use App\ShippingFee;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Group;
use App\City;
use App\Reposi;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
//    function __construct()
//    {
//        if (Auth::check()&& Auth::user()->level ==2) {
//            View::share()
//        }
//    }

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

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('adminprofile', ['data' => $user]);


    }

    public function admin()
    {
        $category = Category::all();
//        foreach ($category as $item){
//            echo "<p>$item->category_name</p>";
//        }
        return view('admin', ['category' => $category]);

    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_image' => 'required',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_size' => 'required',
            'product_color' => 'required',
            'product_price' => 'required|integer',
            'product_group' => 'required'
        ]);
        $model = new Product;
        $model->product_name = $request->product_name;
        $model->product_group = $request->product_group;
        $model->description = $request->product_description;
        $model->size = $request->product_size;
        $model->color = $request->product_color;
        $model->price = $request->product_price;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            foreach ($file as $item) {
                $name = $item->getClientOriginalName();
                $name = str_random('4') . "_" . $name;
                if (file_exists("upload/product")) {
                    $name = str_random('4') . "_" . $name;
                }
                $item->move("upload/product", $name);
                $model->product_image = $name;
            }
        } else $model->product_image = "";
        $model->save();

        //add quantity to repository =0
        $repository = Reposi::all();
        foreach ($repository as $item) {
            $product_repository = new ProductRepository();
            $product_repository->repository_id = $item->repository_id;
            $product_repository->product_id = $model->product_id;
            $product_repository->quantity = 0;
            $product_repository->save();
        }


        return redirect('admin/product');
//    return view('adminhtml/add_product');

    }

    public function editProduct(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_image' => 'required',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_size' => 'required',
            'product_color' => 'required',
            'product_price' => 'required|integer',
            'product_group' => 'required'
        ]);
        $model = Product::find($request->product_id);
        $model->product_name = $request->product_name;
        $model->product_group = $request->product_group;
        $model->description = $request->product_description;
        $model->size = $request->product_size;
        $model->color = $request->product_color;
        $model->price = $request->product_price;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            foreach ($file as $item) {
                $name = $item->getClientOriginalName();
                $name = str_random('4') . "_" . $name;
                if (file_exists("upload/product")) {
                    $name = str_random('4') . "_" . $name;
                }
                $item->move("upload/product", $name);
                $model->product_image = $name;
            }
        } else $model->product_image = "";
        $model->save();


        return redirect('admin/product');
//    return view('adminhtml/add_product');

    }

    public function addCity(Request $request)
    {
        $this->validate($request, [
            'city_name' => 'required|unique:city'
        ]);
        $city = new City();
        $city->city_name = $request->city_name;
        $city->save();
        return redirect('admin/city/add');

    }

    public function addRepo(Request $request)
    {
        $this->validate($request, [
            'repository_name' => 'required|unique:repository',
            'city_id' => 'required'
        ]);
        $repo = new \App\Reposi();
        $repo->repository_name = $request->repository_name;
        $repo->city_id = $request->city_id;
        $repo->save();
        $model = Product::all();
        foreach ($model as $item) {
            $product_repository = new ProductRepository();
            $product_repository->repository_id = $repo->repository_id;
            $product_repository->product_id = $item->product_id;
            $product_repository->quantity = 0;
            $product_repository->save();
        }
        return redirect('admin/repository');

    }

    public function editRepo(Request $request)
    {
        $this->validate($request, [
            'repository_name' => 'required|unique:repository',
            'city_id' => 'required'
        ]);
        $repository = Reposi::find($request->repository_id);
        $repository->repository_name = $request->repository_name;
        $repository->city_id = $request->city_id;
        $repository->save();
        return redirect('admin/repository');

    }

    public function addProductQuantity(Request $request)
    {
        $data = [];
        $model = ProductRepository::where('product_id', $request->product_id)->get();

        foreach ($model as $item) {
            $temp = ['repository' . $item->repository_id => 'required|integer|min:0'];
            $data = array_merge($data, $temp);
        }
        $this->validate($request, $data);
        foreach ($model as $item) {
            $item->quantity = $request->input('repository' . $item->repository_id);
            $item->save();
        }
        return redirect('admin/product');
    }

    public function editProductRepository(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|integer|min:0'
        ]);
        $model = ProductRepository::where('repository_id', $request->repository_id)->where('product_id', $request->product_id)->get();
        foreach ($model as $item) {
            $item->quantity = $request->quantity;
            $item->save();
            return redirect('admin/product_repository');
        }
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_parent' => 'required'
        ]);
        $model = new Category();
        $model->category_name = $request->category_name;

        $model->category_parent = $request->category_parent;

        if($request->category_parent == 0){
            $model->level=1;
        }
        else{
            $temp= Category::find($request->category_parent);
            $model->level=$temp->level+1;
        }
        $model->save();
        return redirect('admin/category');
    }

    public function editCategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_parent' => 'required'
        ]);
        $model = Category::find($request->category_id);
        $model->category_name = $request->category_name;
        $model->category_parent = $request->category_parent;
        if($request->category_parent == 0){
            $model->level=1;
        }
        else{
            $temp= Category::find($request->category_parent);
            $model->level=$temp->level+1;
        }

        $model->save();
        return redirect('admin/category');
    }

    public function addGroup(Request $request)
    {
        $this->validate($request, [
            'group_name' => 'required',
            'group_image' => 'required',
            'group_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_category' => 'required'
        ]);
        $model = new Group();
        $model->group_name = $request->group_name;
        $model->product_category = $request->product_category;
        $model->description = $request->description;

        if ($request->hasFile('group_image')) {
            $file = $request->file('group_image');
            foreach ($file as $item) {
                $name = $item->getClientOriginalName();
                $name = str_random('4') . "_" . $name;
                if (file_exists("upload/group")) {
                    $name = str_random('4') . "_" . $name;
                }
                $item->move("upload/group", $name);
                $model->image = $name;
            }
        } else $model->image = "";
        $model->save();
        return redirect('admin/group');

    }

    public function editGroup(Request $request)
    {
        $this->validate($request, [
            'group_name' => 'required',
            'group_image' => 'required',
            'group_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_category' => 'required'
        ]);
        $model = Group::find($request->group_id);
        $model->group_name = $request->group_name;
        $model->product_category = $request->product_category;
        $model->description = $request->description;

        if ($request->hasFile('group_image')) {
            $file = $request->file('group_image');
            foreach ($file as $item) {
                $name = $item->getClientOriginalName();
                $name = str_random('4') . "_" . $name;
                if (file_exists("upload/group")) {
                    $name = str_random('4') . "_" . $name;
                }
                $item->move("upload/group", $name);
                $model->image = $name;
            }
        } else $model->image = "";
        $model->save();
        return redirect('admin/group');

    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_name' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required'
        ]);
        $model = new User();
        $model->name = $request->name;
        $model->username = $request->user_name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->save();
        return redirect('admin/user');

    }

    public function editUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_name' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required'
        ]);
        $model = User::find($request->user_id);
        $model->name = $request->name;
        $model->username = $request->user_name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->save();
        return redirect('admin/user');
    }

    public function addShipping(Request $request)
    {
        $this->validate($request, [
            'ship_from' => 'required',
            'ship_to' => 'required',
            'fee' => 'required|integer|min:0'
        ]);
        $temp=ShippingFee::all();
        foreach($temp as $item){
            if($item->ship_from == $request->ship_from && $item->ship_to== $request->ship_to){
               return redirect()->back()->with('exist', ['exist record']);
            }
        }
        $model = new ShippingFee();
        $model->ship_from = $request->ship_from;
        $model->ship_to = $request->ship_to;
        $model->fee = $request->fee;
        $model->save();
        return redirect('admin/shipping/add');
    }
}
