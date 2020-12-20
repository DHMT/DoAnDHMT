<?php

namespace App\Http\Controllers;
use App\slide;
use App\products;
use App\type_products;
use App\Cart;
use Session;
use App\customer;
use App\bills;
use App\bill_detail;
use Illuminate\Http\Request;


class DK extends Controller
{
    public function trangchu(){
    	$slide = slide::all();
    	$newproduct = products::where('new',1)->paginate(4);
    	$topproduct = products::where('description','sản phẩm thịnh hành')->get();
    	return view('GiaoDien.trangchu',compact('slide','newproduct','topproduct'));
    }
    public function producttype($type){
        $sp_type = Products::where('id_type',$type)->get();
        $loai =type_products::all();
        $type_sp =type_products::where('id',$type)->first();
    	return view('GiaoDien.product_type',compact('sp_type','loai','type_sp'));
    }
    public function product($id){
        $sp =products::where('id',$id)->first();
        $sptt =products::where('id_type',$sp->id_type)->paginate(3);
        $sphot = products::where('description','sản phẩm thịnh hành')->paginate(6);
    	return view('GiaoDien.product',compact('sp','sptt','sphot'));
    }
    public function contact(){
    	return view('GiaoDien.contact');
    }
    public function about(){
    	return view('GiaoDien.about');
    }

    public function them(request $tmp, $id){
        $sp = products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($sp,$id);
        $tmp->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function xoa($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function dathang(){
        return view('GiaoDien.dathang');
    }

    public function mua(request $req){
        $cart = Session::get('cart');
        $customer = new customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->address;
        $customer->note = $req->note;
        $customer->save();

        $bills = new bills;
        $bills->id_customer= $customer->id;
        $bills->date_order = date('y-m-d');
        $bills->total = $cart->totalPrice;
        $bills->payment = $req->payment;
        $bills->note = $req->note;
        $bills->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new bill_detail;
            $bill_detail->id_bill = $bills->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back();
       
        

    }
}
