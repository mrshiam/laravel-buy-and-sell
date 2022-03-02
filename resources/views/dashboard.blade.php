<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-8 py-4">
            <div class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(sizeof($products))
                        {{sizeof($products)}} products, that you are selling. (<a href="/sell" class="text-blue-500 font-bold">Sell More..</a>)
                    @else
                        Currently you are not selling anything.(<a href="/sell" class="text-blue-500 font-bold">Sell Something</a>)
                    @endif
                    <h2 class="absolute bottom-6 right-10"><a class="font-bold text-blue-500" href="{{route('order.list')}}">Your Orders</a></h2>
                </div>

            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 px-8 py-4">
        @each('each_product_on_list',$products,'product')
    </div>
</x-app-layout>
