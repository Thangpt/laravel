<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_item;
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
use App\UserCart;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {

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

    public function UpdateCart(Request $request)
    {
        $data = [];
        $model = UserCart::where('user_id', Auth::user()->id)->get();
        foreach ($model as $item) {
            if ($item->quantity > 0) {
                $temp = ['product' . $item->product_id => 'required|integer|min:0'];
                $data = array_merge($data, $temp);
            }
        }
        $this->validate($request, $data);

        if (isset($request->update)) {
            foreach ($model as $item) {
                $all_quantity=ProductRepository::where('product_id',$item->product_id)->get();
                $count=0;
                foreach ($all_quantity as $quantity){
                    $count+=$quantity->quantity;
                }
                $item->quantity = $request->input('product' . $item->product_id);
                if ($item->quantity == 0) {
                    $item->delete();
                }elseif($item->quantity >$count ){
                    $item->quantity=$count;
                    $item->save();
                }
                else {
                    $item->save();
                }
            }
            return redirect('/');
        } elseif (isset($request->buy)) {
            foreach ($model as $item) {
                $all_quantity=ProductRepository::where('product_id',$item->product_id)->get();
                $count=0;
                foreach ($all_quantity as $quantity){
                    $count+=$quantity->quantity;
                }
                $item->quantity = $request->input('product' . $item->product_id);
                if ($item->quantity == 0) {
                    $item->delete();
                }elseif($item->quantity >$count ){
                    $item->quantity=$count;
                    $item->save();
                }
                else {
                    $item->save();
                }
            }
            return redirect('user/delivery_info');
        }


    }

    public function DeliveryInfo()
    {
        return view('frontend/delivery_info', [
            'city' => City::all()]);
    }

    public function OrderInfo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|integer|min:1',
            'address' => 'required',
            'city' => 'required'


        ]);
        $fees = ShippingFee::where('ship_to', $request->city)->orderBy('fee', 'ASC')->get();
        $carts = UserCart::where('user_id', Auth::user()->id)->get();
        $data = [];
        $total_fee = 0;
        $total_bill = 0;
        foreach ($carts as $cart) {
            $count = $cart->quantity;
            $total_bill += ($cart->quantity) * ($cart->Product->price);

            $sum = 0;
            foreach ($fees as $fee) {
                //sp mua


                $repository = ProductRepository::where('product_id',$cart->product_id)->where('repository_id',$fee->ship_from)->get();
                $quantity = 0;
                foreach ($repository as $item) {
                    $quantity += $item->quantity;
                }




                if ($quantity >= $cart->quantity && $count!=0) {
                    $count=0;
                    $sum++;
                }
                elseif ($quantity < $cart->quantity && $quantity != 0) {
                    if ($count <= $quantity && $count != 0) {
                        $count = 0;
                        $sum++;

                    } elseif ($count > $quantity) {
                        $count -= $quantity;
                        $sum++;
                    }

                }
                $data[] = $sum;


            }

        }

        $temp = max($data);

        foreach ($fees as $fee) {
            if ($temp > 0) {
                $total_fee += $fee->fee;
                $temp--;
            }
        }

        return view('frontend/order_infor', [
            'city' => City::all(),
            'data' => $request,
            'cost' => [$total_bill, $total_fee],
            'cart' => UserCart::all()

        ]);


    }
    public function OrderCreate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|integer|min:1',
            'address' => 'required',
            'city' => 'required',
            'total_price'=>'required',
            'total_fee'=>'required'


        ]);
        $fees = ShippingFee::where('ship_to', $request->city)->orderBy('fee', 'ASC')->get();
        $carts = UserCart::where('user_id', Auth::user()->id)->get();
        $data = [];
        $order= new Order();
        $order->user_id= Auth::user()->id;
        $order->total_price=$request->total_price;
        $order->shipping_fee=$request->total_fee;
        $order->phone_number=$request->phone_number;
        $order->address=(City::find($request->city)->city_name)." ".$request->address;
        $order->save();

        foreach ($carts as $cart) {
            $count = $cart->quantity;
            $order_item= new Order_item();
            $order_item->order_id=$order->order_id;
            $order_item->product_id=$cart->product_id;
            $order_item->quantity=$cart->quantity;
            $order_item->save();


            foreach ($fees as $fee) {
                //sp mua


                $repository = ProductRepository::where('product_id',$cart->product_id)->where('repository_id',$fee->ship_from)->get();
                $quantity = 0;
                foreach ($repository as $item) {
                    $quantity += $item->quantity;
                }




                if ($quantity >= $cart->quantity && $count!=0) {

                    foreach ($repository as $reposi){
                        $reposi->quantity-=$cart->quantity;
                        $reposi->save();
                        $cart->delete();
                    }
                    $count=0;

                }
                elseif ($quantity < $cart->quantity && $quantity != 0) {
                    if ($count <= $quantity && $count != 0) {

                        foreach ($repository as $reposi){
                            $reposi->quantity-=$count;
                            $reposi->save();
                            $count=0;
                            $cart->delete();
                        }



                    } elseif ($count > $quantity) {
                        $count -= $quantity;
                        foreach ($repository as $reposi){
                            $reposi->quantity=0;
                            $reposi->save();

                        }


                    }

                }


            }

        }

//        return view('frontend/order_detail', [
//            'city' => City::all(),
//            'data' => $request,
//            'cart' => UserCart::all(),
//            'order'=> Order::find($order->order_id)
//
//        ]);
        if(count(Order_item::where('order_id',$order->order->id))==0){
            $order->delete();
            return redirect('user/cart');
        }
        else {
            return redirect('user/order/detail/' . $order->order_id);
        }

    }


}
