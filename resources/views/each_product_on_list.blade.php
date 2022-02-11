<a href="product/{{$product->id}}">
    <div class="bg-white rounded shadow overflow-hidden">
        <img src="{{$product->image_url}}" alt="" class="h-72 object-cover w-full">
        <div class="p-4">
            <div class="text-sm font-semibold">{{$product->title}}</div>
            <div class="text-xs text-gray-500 h-8">{{$product->short_desc}}</div>
        </div>
        <div class="border-t px-4 py-2 font-bold text-sm">${{$product->price}}</div>
    </div>
</a>
