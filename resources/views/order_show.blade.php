<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 border-b leading-tight">
            {{ __('Order Details') }}
        </h2>
        <div class="grid grid-cols-2 gap-2 mt-2">
            <div>
                <div><b>Order ID:</b> {{$order->order_id}}</div>
                <div><b>Status:</b> {{$order->status}}</div>
                <div><b>Total Amount:</b> {{$order->total_amount}}</div>
                <div class="mt-1.5">
                    <a class="bg-blue-900 p-2 text-white rounded" href="{{route('order.change.status',[$order->id,'Processing'])}}">Processing</a>
                    <a class="bg-blue-500 p-2 text-white rounded" href="{{route('order.change.status',[$order->id,'Shipped'])}}">Shipped</a>
                    <a class="bg-green-600 p-2 text-white rounded" href="{{route('order.change.status',[$order->id,'Delivered'])}}">Delivered</a>
                    <a class="bg-red-600 p-2 text-white rounded" href="{{route('order.change.status',[$order->id,'Canceled'])}}">Canceled</a>
                </div>
            </div>
            <div>
                <div><b>Client Name:</b> {{$order->first_name . ' ' . $order->last_name}}</div>
                <div><b>Address:</b> {{$order->street_address . ', ' . $order->city . ' - ' . $order->zip_code . ', ' . $order->country}}</div>
                <div><b>Client Email:</b> {{$order->email}}</div>
                <div><b>Client Email:</b> {{$order->phone}}</div>
            </div>
        </div>

    </x-slot>
    <section class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mb-12 pb-12">
        <footer class="text-center lg:text-left bg-gray-100 text-gray-600">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub Amount</th>

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($order->order_details as $key=>$order_detail)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{++$key}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$order_detail->product->title}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$order_detail->quantity}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{number_format($order_detail->price,2)}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">${{number_format($order_detail->sub_total,2)}}</div>
                                        </td>


                                    </tr>
                                @endforeach

                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</x-app-layout>
