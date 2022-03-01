<x-master-layout>
        <form action="{{route('place.order')}}" method="POST">
            @csrf
            <div class="grid-cols-8">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                <input type="text" value="{{old('first_name')}}" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('first_name')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                <input type="text" value="{{old('last_name')}}" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('last_name')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                                <input type="text" value="{{old('email_address')}}" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('email_address')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                <input type="text" value="{{old('phone')}}" name="phone" id="phone" autocomplete="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('phone')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="">Please Select a Country</option>
                                                    <option @if(old('country') == 'Bangladesh') selected @endif value="Bangladesh">Bangladesh</option>
                                                    <option @if(old('country') == 'United States') selected @endif value="United States">United States</option>
                                                    <option @if(old('country') == 'Canada') selected @endif value="Canada">Canada</option>
                                                    <option @if(old('country') == 'Mexico') selected @endif value="Mexico">Mexico</option>
                                                </select>
                                                @error('country')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6">
                                                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                                                <input type="text" value="{{old('street_address')}}" name="street_address" id="street_address" autocomplete="street_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('street_address')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                <input type="text" value="{{old('city')}}" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('city')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                                <input type="text" value="{{old('postal_code')}}" name="postal_code" id="postal_code" autocomplete="postal_code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                @error('postal_code')
                                                <div class="text-rose-700">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="md:col-span-1">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cart Item</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $sub_total = 0;
                                    if(session()->has('cart')){
                                        foreach(session('cart') as $cart){
                                            $sub_total += $cart['price'];
                                        }
                                    }
                                    @endphp
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-black">Subtotal</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$ {{number_format($sub_total,2)}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-black">Delivery</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$ 0.00</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-black">Discount</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$ 0.00</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-black">Total</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-bold">$ {{number_format($sub_total,2)}}</div>
                                    </td>

                                </tr>

                                <!-- More people... -->
                                </tbody>
                            </table>
                            <div class="col-span-6 sm:col-span-3 mt-10">
                                <p class="block text-lg font-bold text-gray-700">Select Payment type</p>
                                <div>
                                    <input class="m-1.5" type="radio" id="card" @if(old('payment_type') == 'card') checked @endif name="payment_type" value="card">
                                    <label class="p-0.5 font-semibold" for="card">Card</label>
                                </div>

                                <div>
                                    <input class="m-1.5" type="radio" id="cod" @if(old('payment_type') == 'cod') checked @endif name="payment_type" value="cod">
                                    <label class="p-0.5 font-semibold" for="cod">Cash On Delivery</label>
                                </div>
                                @error('payment_type')
                                <div class="text-rose-700">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 bg-gray-50 sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Place Order</button>
            </div>

</x-master-layout>
