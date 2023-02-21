<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\Admin\CustomerController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
        // return view('dashboard');
    }
    public function create(){
        
        // $url=url('/customer');
        // $title="register";
        // $customer="customer";
        // $data=compact('url','title',);
        return view('admin.customer');//->with($data);
    }
    // public function customer(){
    //     return ($id);      
    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required|max:50|min:5',
                'email'=>'required|email',
                'password'=>'required',
                'password_confir'=>'required|same:password',
                'gender'=>'required',
                'address'=>'required',
                'state'=>'required',
                'phone'=>'required'


            ]
        );

        // echo"<pre>";
        // print_r($request->all());
        $customer=new Customer;
        $customer->name=$request['name'];
        $customer->email=$request['email'];
        $customer->password=$request['password'];
        $customer->gender=$request['gender'];
        $customer->address=$request['address'];
        $customer->state=$request['state'];
        $customer->phone=$request['phone'];
        $customer->save();
        // $customer->order()->create([
        //     'order'=>$request->order,
        //     'amount'=>$request->amount,

        // ]);

        return redirect('admin.dashboard')->with('status','customer data inserted sucessfully!!');
    }
    public function view(){
        // $customers=customer::all();
        $customers=Customer::paginate(5);
        // echo"<pre>";
        // print_r($customers->toArray());
        // die;
        $data=compact('customers');
        return view('dashboard')->with($data);

    }
    public function delete($id){
       $customer=Customer::find($id);
       if(!is_null($customer)){
        $customer->delete();
       }
    //    return redirect()->back();
    return redirect('dashboard')->with('status','customer data deleted sucessfully!!');;
    //    echo"<pre>";
    //    print_r($customer);
    }
    public function edit($id){
      
        $customer=Customer::find($id);
        if(is_null($customer)){
            return redirect('dashboard');
        }
        else{
            // $title="update";
            // return view('edit');
            $url=url('/customer/update') ."/". $id;
            $data=compact('customer','url');
        //     return view('customer')->with($data);
        // }
        return view('edit',['customer'=>$customer])->with($data);

        }
    }

    public function update(Request $request,$id){
        $customer=Customer::find($id);
        $customer->name=$request['name'];
        $customer->email=$request['email'];
        $customer->password=$request['password'];
        $customer->gender=$request['gender'];
        $customer->address=$request['address'];
        $customer->state=$request['state'];
        $customer->phone=$request['phone'];
        $customer->save(); 
        return redirect('/dashboard')->with('status','customer data updated sucessfully!!');

    }
    public function Order(){
        $products = Product::all();
        return view('order',compact('products'));
        // return customer::with('group')->get();

    }
    public function Suborder(Request$request){
        // dd($request->all());
        // print_r($request->all());
        // $order=new Order;
        // $order->order()->create([
        //     'order'=>$request->order,
        //     'amount'=>$request->amount,

        // ]);
        // $customer=new customer;
        // $order->order=$request['order'];
        // $order->amount=$request['amount'];
        // $order->save();
        // $order=$input['amount'];
        // $order=$input['customer_id'];
        // $input['order']=implode(',','customer_id');
        // $customer->Order()->save($order);
        // // print_r($input);
        // // return redirect()->back();
        // return Order::find(1);
          // print_r($request->all());
        //   $order=new Order();
        //   $order->order=$request['order'];
        //   $order->amount=$request['amount'];
        //   $order->customer_id=$request['customer_id'];
        //   $order->save();
        //   *************************practice:
    //     $input=$request->all();
    //     $order=$input['order'];
       
    //     $input['customer_id']= $request->customer_id;      
    //     $input['order']=rand(1000,9999);
        
    //     $order = Order::create($input);
    //     // dd($order);
    //     foreach($request->order as $product_id){
    //         $order->items()->create(['product_id'=>$product_id]);
    //     }
    //     return redirect('/customer')->with('status','ordered successfully!!!');
    // }
    // ************************************//
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
            // die;
return redirect('/dashboard')->with('status','ordered successfully!!!!');



}

    public function amount(Request $request){
        // dd($request->all());
        $data=Product::select('price')->whereIn('id', $request->ids)->sum('price');
        // $data=Products::table('products')->select('price')->get();
        // $myquery->user_id;
        return round($data);
    }
    
}



