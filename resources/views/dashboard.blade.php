<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <h1 class="text-center text-gray-700 font-bold text-3xl">Table of  Customers</h1>
    @include('customers.table',$customers)

</x-app-layout>
