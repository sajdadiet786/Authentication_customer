<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    {{-- <form action="" method="POST"> --}}
        {{-- {!! Form::open(['url'=>'/customer','method'=>'post']) !!} --}}
        {{-- {!! Form::open(['url'=>url('/customer'),'method'=>'post']) !!} --}}
        {!! Form::open(['route'=>'admin.customer.create','method'=>'post']) !!}
        @csrf
    <div class="container">
        {{-- <h1 class="text-center">{{$title}}</h1> --}}
        <h1 class="text-center"><b> Add user</b> </h1>
<div class="form-group">
   
    {{-- {!! Form::model($customer, ['route' => ['customer.edit', $customer->id]])!!} --}}
    {{-- <label for="name">Name</label> 
    <input type="text" name="name" class="form-control" placeholder="Enter your name" required="" id="name"> {{--value="{{$customer->name}}"  --}}
    <strong>{!!Form::label('name', 'Name')!!} </strong>
    {!!Form::text('name',null,[
        'class'=>"form-control",'id'=>"name",'placeholder'=>"enter your name"
        ])!!}
    <span class="text-danger">
        @error('name')
            {{$message}}
        @enderror
    </span>
        {{-- {!!Form::model($customer, ['route' => ['customer.update', $customer->name]])!!} --}} 
    
</div>
<div class="form-group">
    <strong>{!! Form::label('email', 'E-Mail Address')!!}</strong>
    {!!Form::text('email',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your email" , 'id'=>"email"
    ])!!}
<span class="text-danger">
    @error('email')
    {{$message}}
@enderror
 </span>
    {{-- {!!Form::model($customer, ['route' => ['customer.edit', $customer->email]])!!} --}}
</div>
<div class="form-group">
    <strong>{!! Form::label('password', 'Password')!!}</strong>
    {!!Form::text('password',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your password" , 'id'=>"password"
    ])!!}
<span class="text-danger"> 
    @error('password')
    {{$message}}
@enderror
</span>
   
</div>
<div class="form-group">
    <strong>{!! Form::label('password', 'Confirm Password')!!}</strong>
    {!!Form::text('password_confir',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your confirm password" , 'id'=>"confirm_password"
    ])!!}

   <span class="text-danger"> 
    @error('password_confir')
    {{$message}}
@enderror
   </span>
</div>
<div class="form-group">
   <strong> {!! Form::label('gender', 'Gender')!!}</strong>

    {!!Form::radio('gender','male',false,['id'=>'male'])!!}
    {!! Form::label('male', 'Male')!!}
    
    {!!Form::radio('gender','female',false,['id'=>'female'])!!}
    {!! Form::label('female', 'Female')!!}
    {!!Form::radio('gender','other',false,['id'=>'other'])!!}
    {!! Form::label('other', 'Other')!!}
<span class="text-danger">
    @error('gender')
    {{$message}}
@enderror
 </span>
</div>
<div class="form-group">
    <strong>{!! Form::label('address', 'Address')!!}</strong>
    {!!Form::text('address',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your address" , 'id'=>"address"
    ])!!}
<span class="text-danger"> 
    @error('address')
    {{$message}}
@enderror
</span>
    {{-- {!!Form::model($customer, ['route' => ['customer.edit', $customer->address]])!!} --}}
</div>
<div class="form-group">
    <strong> {!! Form::label('state', 'State')!!}</strong>
    {!!Form::text('state',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your state" , 'id'=>"state"
    ])!!}
<span class="text-danger">
    @error('state')
    {{$message}}
@enderror
 </span>
    {{-- {!!Form::model($customer, ['route' => ['customer.edit', $customer->state]])!!} --}}
</div>
<div class="form-group">
    <strong>{!! Form::label('phone', 'Phone')!!}</strong>
    {!!Form::text('phone',null,[
        'class'=>"form-control", 'placeholder'=>"Enter your phone" , 'id'=>"phone"
    ])!!}
    <span class="text-danger">
        @error('phone')
        {{$message}}
    @enderror
    </span>
    {{-- {!!Form::model($customer, ['route' => ['customer.edit', $customer->phone]])!!} --}}
</div>
<button type="submit" class="registerbtn">Submit</button>
    </div>
    {!! Form::close() !!}
    {{-- {!! Form::close() !!} --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>