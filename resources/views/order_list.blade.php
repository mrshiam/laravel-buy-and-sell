<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

        <div class="px-8 py-4">
            <div class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(sizeof($products))
                        {{sizeof($products)}} products, that you are selling. (<a href="/sell" class="text-blue-500 font-bold">Sell More..</a>)
                    @else
                        Currently you are not selling anything.(<a href="/sell" class="text-blue-500 font-bold">Sell Something</a>)
                    @endif
                    <h2 class="absolute bottom-6 right-10"><a class="font-bold text-blue-500" href="{{route('order.list')}}">My Orders</a></h2>
                </div>

            </div>
        </div>

    <div class="px-8 py-4">
        <div class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-5">
                            <input class="w-full" value="{{request('client_information')}}" type="text" name="client_information" placeholder="Search with client information">
                        </div>
                        <div class="col-span-3">
                            <input class="w-full" value="{{request('order_id')}}" type="text" name="order_id" placeholder="Search with Order Id">
                        </div>
                        <div class="col-span-3">
                            <select class="w-full" name="status" id="">
                                <option value="">Select Status</option>
                                <option {{ (request('status') == \App\Models\Order::STATUS_PENDING)?'selected':null }} value="{{\App\Models\Order::STATUS_PENDING}}">{{\App\Models\Order::STATUS_PENDING}}</option>
                                <option {{ (request('status') == \App\Models\Order::STATUS_PENDING)?'selected':null }} value="{{\App\Models\Order::STATUS_PROCESSING}}">{{\App\Models\Order::STATUS_PROCESSING}}</option>
                                <option {{ (request('status') == \App\Models\Order::STATUS_SHIPPED)?'selected':null }} value="{{\App\Models\Order::STATUS_SHIPPED}}">{{\App\Models\Order::STATUS_SHIPPED}}</option>
                                <option {{ (request('status') == \App\Models\Order::STATUS_DELIVERED)?'selected':null }} value="{{\App\Models\Order::STATUS_DELIVERED}}">{{\App\Models\Order::STATUS_DELIVERED}}</option>
                                <option {{ (request('status') == \App\Models\Order::STATUS_CANCELLED)?'selected':null }} value="{{\App\Models\Order::STATUS_CANCELLED}}">{{\App\Models\Order::STATUS_CANCELLED}}</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <button type="submit" class="bg-gray-500 mt-0.5 p-2 text-white rounded">Search</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Address</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($orders as $key=>$order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$orders->firstItem() + $key}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->order_id}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->first_name . ' ' . $order->last_name}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->email}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->phone}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->street_address . ', ' . $order->city . ' - ' . $order->zip_code . ', ' . $order->country}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${{number_format($order->total_amount,2)}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> {{$order->status}} </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-white rounded-full p-2 bg-blue-800"><a href="{{route('order.show',$order->id)}}">Details</a></div>
                            </td>

                        </tr>
                        @endforeach

                        <!-- More people... -->
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
