<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <x-success-status class="mb-4" :status="session('message')" />
        <x-validation-errors class="mb-4" :errors="$errors" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
              {!! Form::open(['route'=>('customer.order'),'method'=>'post'])!!}
                @csrf
                @method('post')
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: center">
                  {{ __('Add order')}}
                </h2>
                <div>
                    <x-label for="name" :value="__('Select products')" />
                    <x-select class="block mt-1 w-full" id="order" name="order[]">
                      @foreach ($products as $data)
                      <option value="{{$data->id}}">{{ __($data->product_name)}}</option>
                        @endforeach    
                    {{-- <option value="TV">TV</option>
                    <option value="cooler">cooler</option>
                    <option value="Air conditioner">Air conditioner</option>
                    <option value="Iron">Iron</option>
                    <option value="Torch">Torch</option>
                    <option value="Fan">Fan</option> --}}
                    </x-select>
                    {{-- <x-select name="order[]" id="order" multiple class="block mt-1 w-full">
                        @foreach ($products as $data)
                        {{-- <option value="" selected disabled hidden>{{ __('Choose an option') }}</option> --}}
                        {{-- <option value="{{$data->id}}" selected disabled hidden>{{ __('Choose an option'),$data->product_name}}</option>
                            
                        @endforeach  
                    </x-select> --}}
                    </div>
                    <div>
                        <x-label for="amount" :value="__('Amount')" />
        
                        <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')"  autofocus />
                    </div>
                    <x-input type="hidden" name="customer_id" value="{{request()->get('id')}}" />
                           <x-button class="ml-3">
                    {{ __('order')}}
                </x-button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>

    {{-- // new MultiSelectTag('order')  // id --}}
    
    <script>
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
<script>
  // new MultiSelectTag('order')  // id
</script>
{{-- new MultiSelectTag('countries', {
  rounded: true,    // default true
  shadow: true      // default false
}) --}}