<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000; /* Black background */
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-wrapper {
            width: 100%;
            max-width: 400px; /* Increased container width */
            padding: 20px;
            background: #1f2937; /* Container background color */
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #fff;
            border-radius: 4px;
            box-sizing: border-box;
            background: transparent;
            color: white;
        }

        label {
            margin-bottom: 5px;
            display: block;
            color: #fff;
            font-size: 0.9em; /* Smaller font size */
        }

        button {
            width: 40%;
            padding: 10px;
            background: #fff;
            color: #000;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            float: right;
        }

        button:hover {
            background: #ccc;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.9em;
        }

        .text-gray-600 {
            color: #ccc;
        }

        .text-gray-900 {
            color: #fff;
        }

        input:focus, select:focus, textarea:focus, button:focus {
            outline: none;
            box-shadow: 0 0 3px #fff;
            border: 1px solid #fff;
        }

        a {
            color: #fff;
        }

        a:hover {
            color: #ccc;
        }

        h1 {
            color: #47a2ed;
            text-align: center;
            margin: 0; /* Remove margin from heading */
            font-size: 2rem;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .ms-2 {
            margin-left: 0.5rem;
        }

        .ms-3 {
            margin-left: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-wrapper">
            <h1>FlickTalks</h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="ms-3">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>