<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            background-color: #000000;
            color: #e0e0e0;
            margin: 0; /* Reset margin for body */
            font-family: 'figtree', sans-serif; /* Apply custom font */
        }
        .custome-footer {
            background-color: #1f2937;
            text-align: center;
            padding: 20px 0; /* Adjust padding for better spacing */
        }
        .btn-footer {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 5px; /* Adjust margin for button spacing */
            background-color: #1f2937;
            color: white;
            border: 1px solid #ffffff;
            text-decoration: none;
            border-radius: 20px;
        }
        .btn-footer:hover {
            background-color: white;
            color: #1f2937;
            text-decoration: none;
        }
        .footer {
            color: white;
            text-align: center;
            margin-top: 20px; /* Add margin for better separation */
            font-size: 14px;
            align-items: center;
        }
        .name{
            font-size: 28px;
            color: #47a2ed;
        }
        .social-media-links {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0; /* Add margin for better spacing */
        }
        .social-media-links img {
            width: 40px; /* Adjust width as needed */
            height: auto;
            margin: 0 10px; /* Add margin between icons */
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FlickTalks') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <div class="container mt-5">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="custome-footer">
        <div class="footer">
            <p class="name">FlickTalks</p>
            <p>FlickTalks is an interactive platform for reading, rating, and sharing movie reviews.<br>
            Explore movie recommendations that suit your tastes on FlickTalks!</p>
            <div class="social-media-links">
                <a href="https://www.instagram.com/" target="_blank"><img src="/storage/images/instagram.PNG" alt="Instagram"></a>
                <a href="https://www.facebook.com/?locale=id_ID" target="_blank"><img src="/storage/images/facebook.PNG" alt="Instagram"></a>
                <a href="https://x.com/?lang=id" target="_blank"><img src="/storage/images/twitter.PNG" alt="Instagram"></a>
            </div>
            <a href="{{ route('dashboard') }}" class="btn-footer">Home</a>
            <a href="{{ route('movie') }}" class="btn-footer">Movie</a>
            <a href="{{ route('review') }}" class="btn-footer">Review</a>
            <br><br>
            &copy; {{ date('Y') }} Flick Talks. All rights reserved.
        </div>
    </footer>

</body>
</html>