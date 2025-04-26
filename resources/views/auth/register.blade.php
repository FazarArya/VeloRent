<html lang="en">
 <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
     Register Page
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
                font-family: 'Poppins', sans-serif;
        }
    </style>
 </head>
 <body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="absolute inset-0">
     <img alt="Abstract background with blue shapes" class="w-full h-full object-cover opacity-20" src="/images/m4-bgrn.jpg"/>
    </div>
    <div class="relative bg-white bg-opacity-10 backdrop-blur-md rounded-lg shadow-lg p-8 w-full max-w-md text-center">
    <img src="/images/Logo VeloRent (1).png" alt="VeloRent Logo" class="mx-auto mb-4 w-auto h-24">
     <h2 class="text-white text-lg mb-6">
        Register
     </h2>
     <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4 text-left">
                        <label for="name" class="block text-white font-medium mb-1">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:outline-none"/>
                        @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4 text-left">
                        <label for="email" class="block text-white font-medium mb-1">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:outline-none"/>
                        @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <!-- Password -->
                <div class="mb-4 text-left">
                        <label for="password" class="block text-white font-medium mb-1">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:outline-none"/>
                        @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4 text-left">
                        <label for="password_confirmation" class="block text-white font-medium mb-1">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:outline-none"/>
                </div>

                <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:outline-none">
                                {{ __('Register') }}
                        </button>
                </div>
                <div class="mt-4 text-white">
                        <p class="text-sm">
                                {{ __('Already registered?') }}
                                <a href="{{ route('login') }}" class="text-blue-400 hover:underline">{{ __('Login') }}</a>
                        </p>
                </div>
     </form>
    </div>
 </body>
</html>
