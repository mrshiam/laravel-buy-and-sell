<x-master-layout>
    <div class="m-4 flex">
        <!-- Left half -->
        <div class="w-1/2 rounded shadow overflow-hidden">
            <img class="w-full object-cover" src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
        </div>
        <!-- Right half -->
        <div class="w-1/2 rounded bg-white ml-2 p-4 shadow relative">
            <div class="text-sm font-semibold">Headphone</div>
            <div class="text-sm text-gray-500">Excellent quality headphone at a low cost</div>
            <div class="text-xs text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, error.</div>

            <!-- Seller Info -->
            <div class="mt-4">
                <div class="text-xs font-semibold text-gray">Sold By:</div>
                <div class="text-sm text-gray-500">John Doe</div>
            </div>

            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Phone Number:</div>
                @auth
                    <div class="text-sm text-gray-500">01521255051</div>
                @else
                    <div class="text-sm text-gray-500">*******</div><a href="/login" class="text-xs text-blue-500">Login to View</a>
                @endauth
            </div>

            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Email:</div>
                @auth
                    <div class="text-sm text-gray-500">John@example.com</div>
                @else
                    <div class="text-sm text-gray-500">**@example.com</div><a href="/login" class="text-xs text-blue-500">Login to View</a>
                @endauth
            </div>

            <!-- Product Price -->
            <div class="absolute bottom-0 right-0 m-6 rounded-full px-4 py-2 bg-green-500">
                <div class="text-white font-bold text-sm">$20</div>
            </div>
        </div>
    </div>
</x-master-layout>
