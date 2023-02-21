<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <title>form</title>
  </head>
  <style>
     body {
    font-family: 'Courier New', Courier, monospace;
   font-size: 15px;

  }

  * {
    box-sizing: border-box;
  }

  .container {
    padding: 20px;
    background-color: #f7f7f7;
    ;
    /* position: absolute; */
    /* right: 0; */
    margin: 20px auto;
    width: 720px;
    border-radius: 20px;

  }

  input[type=text]:focus,
  input[type=email]:focus {
    background-color: #ddd;
    outline: none;
    border-radius: 2px;
  }
  .form-group {
    margin-bottom: 15px;
    border-radius: 3px;
  }

  .form-control {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-top: 3px;
  }

  .radio {
    border-radius: 80%;
  }
  .registerbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    border-radius: 5px;

  }
 
  </style>
  <body>
    {{-- <form action="{{$url}}" method="POST"> --}}
        {{-- {!! Form::open(['url'=>'/customer','method'=>'post']) !!} --}}
        {{-- {!! Form::open(['url'=>url('/order'),'method'=>'post']) !!} --}}
        {!! Form::open(['route'=>('customer.order'),'method'=>'post']) !!}

        @csrf
    <div class="container">
        {{-- <h1 class="text-center">{{$title}}</h1> --}}
        <h1 class="text-center"><b>Add orders</b> </h1>
<div class="form-group">
    <label for=""><strong>Select Product </strong> </label>
    <select name="order[]" id="order" multiple class="form-control">
      @foreach ($products as $data)
      <option value="{{$data->id}}">{{$data->product_name}}</option>
          
      @endforeach
        {{-- <option value="TV">TV</option>
        <option value="cooler">cooler</option>
        <option value="Air conditioner">Air conditioner</option>
        <option value="Iron">Iron</option>
        <option value="Torch">Torch</option>
        <option value="Fan">Fan</option> --}}
    </select>
</div>
<div class="form-group">
    <label for="amount"><strong>Amount</strong> </label>
    <input type="text" name="amount" id="amount" class="form-control">

</div>
<input type="hidden" name="customer_id" value="{{request()->get('id')}}" />
    {{-- {!! Form::model($customer, ['route' => ['customer.edit', $customer->id]])!!} --}}
    {{-- <label for="name">Name</label> 
    <input type="text" name="name" class="form-control" placeholder="Enter your name" required="" id="name"> {{--value="{{$customer->name}}"  --}}
    
<button type="submit" class="registerbtn" id="submit">Submit</button>
    </div>
    {!! Form::close() !!}
    {{-- {!! Form::close() !!} --}}
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  </body>
</html>
<script>
    // new MultiSelectTag('order')  // id

    $('#order').select2();
    $('#order').change(function(){
      var product_ids = $(this).val();
    
      $.ajax({
        url: '{{route('get.amount')}}',
        method: 'POST',
        data: {
          ids: product_ids,
          _token: '{{csrf_token()}}'
        },
        beforeSend: function(){
          // $(placeholder).addClass('loading');
        },
        success: function(data){
          console.log(data);
          $('#amount').val(data);
        }
        
      })


    });
    $("form").submit(function(){
      $.ajax({
        url:'{{route('get.amount')}}',
        method:'POST',

      })
  // alert("Submitted");
});
</script>