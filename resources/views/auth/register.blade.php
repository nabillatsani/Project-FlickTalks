<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Add the CSS here */
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000; /* Black background */
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items at the top */
            height: 100%;
            margin-top: -15px; /* Move container up to remove space with heading */
        }

        form {
            background: #1f2937; /* Container background color */
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Increased container width */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        input[type="file"] {
            width: 100%; /* Keep the same width as before */
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
            padding: 20px 0; /* Add padding to the heading */
        }
    </style>
</head>
<body>
    <h1>FlickTalks</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="('Role')" />

                <select id="role" name="role" class="block mt-1 w-full form-control">
                    <option value="User">User</option>
                    <option value="Staff">Staff</option>
                </select>

                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
            <!-- Foto -->
            <div class="mt-4">
                <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                <div class="col-md-6">
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/storage/akun*">

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>