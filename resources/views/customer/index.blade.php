<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('add customer') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-success-status class="mb-4" :status="session('message')" /> 
                <table class="table table-bordered table-hover mt-2">
                    <thead>
                        <tr class="table-dark">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                              <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td><a href="{{url('/edit-customer/'.$customer->id)}}" class="btn btn-primary">edit</a>
                                <a href="{{url('delete-customer/'.$customer->id)}}" class="btn btn-danger">Delete</a>
                                <a href="{{route('customer.order',['id'=>$customer->id])}}" class="btn btn-success">Add Order</a>

                            </td>
                                {{-- <form action="{{url('delete-customer/'.$customer->id)}}">
                                    @csrf
                                    {{-- @method('delete') --}}
                                {{-- <x-button class="btn btn-danger">Delete</x-button></form> --}}
                            </tr>  
                            @empty
                        <tr> 
                            <td colspan="5">No record found</td>
                        </tr>  
                            @endforelse
                        </tbody>
                </table>
    </div>
</div>
</div>
</x-app-layout>