<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('add customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <x-validation-errors class="mb-4" :errors="$errors" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <form action="{{url('update-customer/'.$customer->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-label for="name" :value="__('customer name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$customer->name" autofocus />
                </div>
                <div>
                    <x-label for="email" :value="__('customer email')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$customer->email" autofocus />
                </div>
                <div>
                    <x-label for="password" :value="__('customer password')" />
    
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="$customer->password" autofocus />
                </div>
                <div>
                    <x-label for="phone" :value="__('customer phone')" />
    
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$customer->phone" autofocus />
                </div>
                <x-button class="ml-3">
                    {{ __('Update') }}
                </x-button>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
