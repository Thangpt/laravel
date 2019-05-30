<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/home',['new_product'=> \App\Group::all(),'man_product'=>\App\Category::where('category_parent','8')->get(),
        'woman_product'=>\App\Category::where('category_parent',9)->get(),'all_product'=>\App\Product::all(), 'all_category'=>\App\Category::all()]);
});
Route::get('/product/{id}',function($id){
    return view('frontend/product',['current_product'=>\App\Group::find($id),'all_product'=>\App\Product::all()]);
});
Route::get('master', function () {
    return view('master');
});
Route::get('home', function () {
    return view('home');
});
Route::get('testcontroller/{name}', 'TestController@getName')->where(['name' => '[a-zA-Z]+']);
//Route::get('add',function(){
//    DB::table('users')->insert(
//        ['email' => 'john@example.com', 'votes' => 0]
//    );
//});
Route::get('product', 'TestController@getProduct');

Route::get('category', 'TestController@getCategory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('loginuser', 'HomeController@check');
Route::get('/admin',function(){
    if(\Illuminate\Support\Facades\Auth::check() &&\Illuminate\Support\Facades\Auth::user()->level==2){
        return redirect('admin/dashboard');
    }
    else
    return view('adminhtml/login');
});
Route::post('loginadmin','HomeController@checkAdmin');
Route::get('product', function(){
    return view('frontend/product');
});


Route::group(['prefix' => '/admin', 'middleware' => 'Checklevel'], function () {
//    Route::get('/', 'AdminController@admin');
    Route::get('dashboard',function(){
        return view('admin');
    })->name('dashboard');

    //Product
    Route::get('product/add', function () {
        return view('adminhtml/add_product', ['group' => \App\Group::all(),'colors'=>\App\Color::all(),'sizes'=>\App\Size::all()]);
    });
    Route::post('product/add', 'AdminController@addProduct');
    Route::get('product', function () {
        return view('adminhtml/product', ['product' => \App\Product::simplePaginate(10)]);
    })->name('product');
    Route::get('product/edit/{id}', function ($id) {
        return view('adminhtml/edit_product', ['products' => \App\Product::where('product_id', $id)->get(), 'groups' => \App\Group::all(),
            'colors'=>\App\Color::all(),'sizes'=>\App\Size::all()]);
    });
    Route::post('product/edit', 'AdminController@editProduct');
    Route::get('product/delete/{id}', function ($id) {
        \App\Product::find($id)->delete();
        foreach ( \App\ProductRepository::where('product_id',$id) as $item){
            $item->delete();
        }
        return redirect('admin/product');
    });
    Route::get('product/quantity/{id}', function ($id) {
        return view('adminhtml/add_quantity', ['product' => \App\Product::find($id),
            'product_repository' => \App\ProductRepository::where('product_id', $id)->get(), "repository" => \App\Reposi::all()]);
    });
    Route::post('product/quantity', 'AdminController@addProductQuantity');


    //Repository
    Route::get('repository', function () {
        return view('adminhtml/reposi', ['repository' => \App\Reposi::simplePaginate(10)]);
    })->name('repository');
    Route::get('repository/add', function () {

        return view('adminhtml/add_repository', ['city' => \App\City::all()]);
    });
    Route::post('repository/add', 'AdminController@addRepo');
    Route::get('repository/edit/{id}', function ($id) {
        return view('adminhtml/edit_reposi', ['repository' => \App\Reposi::find($id), 'city' => \App\City::all()]);
    });
    Route::post('repository/edit', 'AdminController@editRepo');
    Route::get('repository/delete/{id}', function ($id) {
        $model = \App\Reposi::find($id);
        $model->delete();
        $product_repository = \App\ProductRepository::where('repository_id', $id)->get();
        foreach ($product_repository as $item) {
            $item->delete();
        }
        return redirect('admin/repository');
    });


    //City
    Route::get('city/add', function () {
        return view('adminhtml/add_city');
    });
    Route::post('city/add', 'AdminController@addCity');
    Route::get('city', function () {
        return view('adminhtml/city');
    });


    //Product Repository
    Route::get('product_repository',function(){
        return view('adminhtml/product_repository',['product_repository'=>\App\ProductRepository::simplePaginate(10)]);
    })->name('product_repository');
    Route::get('product_repository/edit/{repository}/{product}',function($repository,$product){
       $model=\App\ProductRepository::where('repository_id',$repository)->where('product_id',$product)->get();
       return view('adminhtml/edit_product_repository',['model'=>$model]);
    });
    Route::post('product_repository/edit','AdminController@editProductRepository');


    //Category
    Route::get('category',function(){
        return view('adminhtml/category',['category'=> \App\Category::simplePaginate(10),'model'=>\App\Category::all()]);
    })->name('category');
    Route::get('category/add',function(){
        return view('adminhtml/add_category',['category'=>\App\Category::all()]);
    });
    Route::post('category/add','AdminController@addCategory');
    Route::get('category/edit/{id}',function($id){
        return view('adminhtml/edit_category',['item'=>\App\Category::find($id),'category'=>\App\Category::all()]);
    });
    Route::post('category/edit','AdminController@editCategory');
    Route::get('category/delete/{id}',function($id){
        $model=\App\Category::find($id);
        $model->delete();
        return redirect('admin/category');
    });
    //Group Product
    Route::get('group',function(){
        return view('adminhtml/group',['groups' => \App\Group::simplePaginate(10),
            'category'=>\App\Category::all()
            ]);

    })->name('product_group');
    Route::get('group/add',function(){
       return view('adminhtml/add_group',['category'=>\App\Category::all()]);
    });
    Route::post('group/add','AdminController@addGroup');
    Route::get('group/edit/{id}',function($id){
        return view('adminhtml/edit_group',['group'=>\App\Group::find($id),'category'=>\App\Category::all()]);
    });
    Route::post('group/edit','AdminController@editGroup');
    Route::get('group/delete/{id}',function($id){
        $model=\App\Group::find($id);
        $model->delete();
        return redirect('admin/group');
    });

    //Users
    Route::get('user',function(){
        return view('adminhtml/user',['users' => \App\User::simplePaginate(5)]);
    })->name('user');
    Route::get('user/add',function(){
        return view('adminhtml/add_user');
    });
    Route::post('user/add','AdminController@addUser');
    Route::get('user/edit/{id}',function($id){
        return view('adminhtml/edit_user',['user'=>\App\User::find($id)]);
    });
    Route::post('user/edit','AdminController@editUser');
    Route::get('user/delete/{id}',function($id){
        $model = \App\User::find($id);
        $model->delete();
        return redirect('admin/product');
    });

    //Shipping
    Route::get('shipping',function (){
        return view('adminhtml/shipping',['ship'=> \App\ShippingFee::simplePaginate(10)]);
    })->name('shipping');
    Route::get('shipping/add',function(){
        return view('adminhtml/add_shipping',['repository'=>\App\Reposi::all(),'city'=>\App\City::all()]);
    });
    Route::post('shipping/add','AdminController@addShipping');
    Route::get('shipping/edit/{repository}/{city}','AdminController@editFee');
    Route::get('shipping/delete/{repository}/{city}',function($repository,$city){
        $model= \App\ShippingFee::all()->where('ship_from',$repository)->where('ship_to',$city);
        foreach($model as $item){
            $item->delete();
        }
        return redirect('admin/shipping');
    });
    Route::get('profile',function (){
        return view('adminhtml/profile');
    })->name('profile');


    //Order
    Route::get('order',function(){
        return view('adminhtml/order',['order'=>\App\Order::simplePaginate(10)]);
    })->name('order');
    Route::get('order/details/{id}',function($id){
        return view('adminhtml/order_details',['order'=>\App\Order::find($id)]);
    });
    Route::get('order/prepare/{id}',function($id){
        $model=\App\Order::find($id);
        $model->is_send= Carbon\Carbon::now()->toDateTimeString();
        $model->save();
        return redirect('admin/order')->with('success', ['Prepared']);
    });
    Route::get('order/new',function(){
        return view('adminhtml/new_order',['order'=>\App\Order::all()->where('is_send',null)]);
    })->name('new_order');

    Route::get('cart',function(){
        return view('adminhtml/cart',['user'=>\App\User::all(),'cart'=>\App\UserCart::all()]);
    });
    Route::get('cart/add',function(){
        $model= new \App\UserCart();
        $model->user_id=2;
        $model->product_id=1;
        $model->quantity=2;
        $model->save();
        return view('adminhtml/cart',['cart'=>\App\User::find(1)->AllCart()]);
    });
});

Route::group(['prefix' => '/user', 'middleware' => 'Checklogin'], function () {
    Route::get('/', 'TestController@profile');
    Route::get('/profile', 'TestController@profile');
    Route::get('/home', 'TestController@profile');
    Route::post('/update_cart','UserController@UpdateCart')->name('update_cart');
    Route::get('/delivery_info','UserController@DeliveryInfo');
    Route::post('/order_info','UserController@OrderInfo');
    Route::post('/order_create','UserController@OrderCreate');
    Route::get('/order',function(){
        return view('frontend/order',['order'=>\App\Order::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->simplePaginate(10)]);
    });
    Route::get('/order/detail/{id}',function($id){
       return view('frontend/order_details',['order'=>\App\Order::find($id)]);
    });
    Route::get('/order/received/{id}',function($id){
        $model = \App\Order::find($id);
        $model->is_received= Carbon\Carbon::now()->toDateTimeString();
        $model->save();
        return redirect('user/order/detail/'.$model->order_id);
    });
    Route::get('/cart',function(){
        return view('frontend/cart',['cart'=> \App\UserCart::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get()]);
    });
});
