<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>customer-view</title>
  </head>
  <body>
    <div class="card">
      <div class="card-header text-center">
       <h1>Customer data</h1>
      </div>
      <div class="card-body">
        <div class="container">
          <div  class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{('/customer/create')}}"><button class="btn btn-primary">Add Customer</button></a></div>
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
          {{-- $count = mysql_num_rows($customers);
          @if($count>0){ --}}
            @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->phone}}</td>
                <td>
                  <a href="{{route('customer.edit',['id'=>$customer->id])}}"><button class="btn btn-warning">Edit</button></a> 
                  <a href="{{route('customer.delete',['id'=>$customer->id])}}"><button class="btn btn-danger">Delete</button></a>
                  <a href="{{route('customer.order',['id'=>$customer->id])}}"><button class="btn btn-success">Add Order</button></a>
                </td>
            </tr>
            @endforeach

        </tbody>
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
      {{$customers->onEachSide(1)->links()}}
    </div>
    {{-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>