<x-master-layout>
    <div class="grid grid-cols-4 gap-4 p-4">
        @each('each_product_on_list',$products,'product')
    </div>
    <div class="p-6"></div>{{$products->links()}}
</x-master-layout>


