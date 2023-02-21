<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerFormRequest;
use App\Http\Requests\OrderFormRequest;
use App\Http\Requests\ProductFormRequest;

class CustomerController extends Controller
{
    //
    public function index(){
        $customers=Customer::all();
        return view('customer.index',compact('customers'));
    }
    public function create(){
        return view('customer.create');
    }
    public function store(CustomerFormRequest $request){
       $data=$request->validated();
       $customer=Customer::create($data);
       return redirect('/customers')->with('message','customer added successfully');
    //    $customer=Customer::create([
    //     'name'=>$data['name'],
    //     'email'=>$data['email'],
    //     'password'=>$data['password'],
    //     'phone'=>$data['phone'],
    //    ]);
    }
    public function edit($customer_id){
        $customer=Customer::find($customer_id);

        return view('customer.edit',compact('customer'));
    }
    public function update(CustomerFormRequest $request ,$customer_id){
        $data=$request->validated();
        $customer= Customer::where('id',$customer_id)->update([
            'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$data['password'],
                'phone'=>$data['phone'],
        ]);
        return redirect('/customers')->with('message','customer updated successfully');

    }
    public function destroy($customer_id){
        $customer=Customer::find($customer_id);
        if(!is_null($customer)){
            $customer->delete();
           }
        
        return redirect('/customers')->with('message','customer delete successfully');

    }
   

    public function Order(){
        $products = Product::all();
        // dd($products);
        // die;
        return view('customer.order',compact('products'));
        
    }
    public function Suborder(OrderFormRequest $request){
            $input= $request->all();
            $order=$input['order'];
           
            $input['customer_id']=$request->customer_id;
           
            // $input['order']=implode('product name',$request->product name);
            $input['order']=rand(1000,9999);
            $order=Order::create($input);
            foreach($request->order as $product_id){
                $order->items()->create(['product_id'=>$product_id]);
            }
            // dd($product_id);
            // dd($product_id);
            // die;
            return redirect('/customers')->with('message','ordered successfully!!!!');



}

    public function amount(Request $request){
        // dd($request->all());
        $data=Product::select('price')->whereIn('id', $request->ids)->sum('price');
        // $data=Products::table('products')->select('price')->get();
        // dd($data);
        // $myquery->user_id;
        return round($data);
    }
    
}
