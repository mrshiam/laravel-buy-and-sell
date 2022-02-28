<x-master-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    @if(empty(session('cart')))
        <div><h1 class="text-lg flex justify-center">No Items Found in the Cart!</h1></div>
    @else
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <h1 class="text-lg underline flex justify-center">Cart Items</h1>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Short Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $total = 0;
                        @endphp
                        @foreach(session('cart') as $product_id => $cart)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{asset($cart['image'])}}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{$cart['title']}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$cart['short_desc']}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> $ {{$cart['price']}} </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{route('delete.item',$product_id)}}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </td>

                        </tr>
                            @php
                                $total = $total + $cart['price'];
                            @endphp
                        @endforeach                        <!-- More people... -->
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="p-3">Total: ${{ number_format($total,2) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h1 class="text-lg flex justify-center m-1.5"><a class="rounded-full bg-green-500 p-3 text-white no-underline" href="{{route('checkout')}}">Proceed to Checkout</a></h1>
            </div>
        </div>
    </div>
    @endif
</x-master-layout>
