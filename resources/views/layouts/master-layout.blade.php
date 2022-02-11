<html>
<head>
    <title>Buy and Sell</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="border-gray-50">
<!-- Header -->
<nav>
    <div class="flex justify-between p-6 items-center">
        <div>
            <img src="{{asset('/images/logo.png')}}" alt="" class="w-full h-20">
            Buy & Sell
        </div>
        <div>
            @if (Route::has('login'))
                <div>
                    <a href="{{ url('/sell') }}" class="text-sm text-gray-700 dark:text-gray-500 underline mr-4">Sell</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
<!-- Main Content -->
{{$slot}}
<!-- Footer -->
<footer>
    <div class="p-4 flex justify-center">
        <p>Created with <a href="https://laravel.com/" class="text-red-700" target="_blank">Laravel</a> & <a href="https://tailwindcss.com/" class="text-blue-400" target="_blank">Tailwind</a>. Developed By @<a href="https://mrshiam.github.io/mrshiam-portfolio/" class="text-lime-600" target="_blank">mrshiam</a> </p>
    </div>
</footer>
</body>
</html>
