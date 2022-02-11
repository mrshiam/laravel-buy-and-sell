<x-master-layout>
    <x-form-container-card>
        <x-slot name="title">
            What do you want to sell today?
        </x-slot>
        @if ($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/product" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="title" class="text-sm text-gray-500">Product Title</label>
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full" type="text" id="title" name="title">
            </div>

            <div class="mt-2">
                <label for="desc-sm" class="text-sm text-gray-500">Add short description of the product</label>
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full" type="text" id="desc-sm" name="desc-sm">
            </div>

            <div class="mt-2">
                <label for="desc-full" class="text-sm text-gray-500">Add full description of the product</label>
                <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full" type="text" id="desc-full" name="desc-full"></textarea>
            </div>

            <div class="mt-2">
                <label for="price" class="text-sm text-gray-500">Product Price</label>
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full" type="text" id="price" name="price">
            </div>

            <div class="mt-2">
                <label for="img" class="text-sm text-gray-500">Product Image</label>
                <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full" type="file" id="img" name="img">
            </div>

            <x-button class="mt-4 w-full justify-center">
                Post the Ad
            </x-button>
        </form>
    </x-form-container-card>
</x-master-layout>
