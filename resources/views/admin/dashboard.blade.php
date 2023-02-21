<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You are welcome !!!!
                </div>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

                <div class="card">
                    <div class="card-header text-center">
                     <h1>Customer data</h1>
                    </div>
                    <div class="card-body">
                      <div class="container">
                        <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="{{route('admin.customer.create')}}"><button class="btn btn-primary">Add Customer</button></a></div>
                  @if (session()->has('status'))
                  <div class="alert alert-success">
                  {{session('status')}}  
                  </div> 
                  @endif  
                  <table class="table table-bordered table-hover mt-2">
                      {{-- <pre>
                          {{print_r($customers)}}
                      </pre> --}}
                      <thead>
                        
                              
                        
                          <tr class="table-dark">
                              <th>Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>Address</th>
                              <th>state</th>
                              <th>phone</th>
                              <th>Action</th>
                          </tr>
                       
                      </thead>
                      <tbody>
                        <td>sajda</td>
                        <td>Sadasf</td>
                        <td>addsdfsdress</td>
                        <td>sdfdf</td>
                        <td>aassdssd</td>
                        <td>12121221212</td>
                        <td>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                        {{-- $count = mysql_num_rows($customers);
                        @if($count>0){ --}} 
                        {{-- @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->gender}}</td>
                           <td>{{$customer->address}}</td>
                            <td>{{$customer->state}}</td>
                            <td>{{$customer->phone}}</td>
                            <td> --}}
                                {{-- <a href=""><button class="btn btn-warning">Edit</button></a>
                                <a href="{{route('customer.edit',['id'=>$customer->id])}}"><button class="btn btn-warning">Edit</button></a> 
                  <a href="{{route('customer.delete',['id'=>$customer->id])}}"><button class="btn btn-danger">Delete</button></a>
                  <a href="{{route('customer.order',['id'=>$customer->id])}}"><button class="btn btn-success">Add Order</button></a>
                </td>
            </tr>
            @endforeach

        </tbody> --}}
                    {{-- }
                    @else{
                      <tr>
                        <td class="text-center" colspan="10">
                            No record found.
                        </td>
              
                    </tr>
              
                    }
                    @endif --}}
                    </table>
                    </div>
                    </div>
                  </div>
                  <div class="pagination justify-content-center">
                    {{-- {{$customers->onEachSide(1)->links()}} --}}
                  </div>
                
            </div>
        </div>
    </div>
</x-admin-layout>
