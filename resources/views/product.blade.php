<x-master-layout>
    <div class="m-4 flex">
        <!-- Left half -->
        <div class="w-1/2 rounded shadow overflow-hidden grid content-center">
            <img class="w-full h-auto object-cover" src="{{asset($product->image_url)}}" alt="">
        </div>
        <!-- Right half -->
        <div class="w-1/2 rounded bg-white ml-2 p-4 shadow relative">
            @if(Auth::id()==$product->user->id)
                <div class="flex">
                    <a href="/edit/{{$product->id}}">
                        <div class="bg-blue-500 rounded-full px-4 py-2 shadow text-xs text-white">Edit</div>
                    </a>
                    <form action="/delete/{{$product->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-300 ml-1 rounded-full px-4 py-2 shadow text-xs text-white">Delete</button>
                    </form>




                </div>
            @endif
            <div class="text-sm font-semibold">{{$product->title}}</div>
            <div class="text-sm text-gray-500">{{$product->short_desc}}</div>
            <div class="text-xs text-gray-500 mt-2">{{$product->long_desc}}</div>

            <!-- Seller Info -->
            <div class="mt-4">
                <div class="text-xs font-semibold text-gray">Sold By:</div>
                <div class="text-sm text-gray-500">{{$product->user->name}}</div>
            </div>

            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Phone Number:</div>
                @auth
                    <div class="text-sm text-gray-500">{{$product->user->phone}}</div>
                @else
                    <div class="text-sm text-gray-500">*******</div><a href="/login" class="text-xs text-blue-500">Login to View</a>
                @endauth
            </div>

            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Email:</div>
                @auth
                    <div class="text-sm text-gray-500">{{$product->user->email}}</div>
                @else
                    <div class="text-sm text-gray-500">**@example.com</div><a href="/login" class="text-xs text-blue-500">Login to View</a>
                @endauth
            </div>

            <!-- Product Price -->
            <div class="absolute bottom-0 right-0 m-6 rounded-full px-4 py-2 bg-green-500">
                <div class="text-white font-bold text-sm">${{$product->price}}</div>
            </div>
            <div class="absolute bottom-0 left-4 m-6 px-4 py-2 rounded-full bg-teal-500">
                <a class="font-bold text-white text-sm" href="{{route('add.to.cart',$product->id)}}">Add to Cart</a>
            </div>

        </div>
    </div>
</x-master-layout>
