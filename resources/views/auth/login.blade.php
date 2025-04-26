<html lang="en">
 <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
     Login Page
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
    <div class="absolute inset-0 overflow-hidden">
     <img alt="Abstract background with blue shapes" class="w-full h-full object-cover opacity-20" src="/images/m4-bgrn.jpg"/>
    </div>
    <div class="relative bg-white bg-opacity-10 backdrop-blur-md rounded-lg shadow-lg p-8 w-full max-w-md text-center">
    <img src="/images/Logo VeloRent (1).png" alt="VeloRent Logo" class="mx-auto mb-4 w-auto h-24">
     <h2 class="text-white text-lg mb-6">
        Login
     </h2>
     <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4 text-left">
                        <label for="email" class="text-white block mb-1">
                         Email
                        </label>
                        <x-text-input id="email" class="block w-full p-2 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>
                
                <div class="mb-4 text-left">
                        <label for="password" class="text-white block mb-1">
                         Password
                        </label>
                        <x-text-input id="password" class="block w-full p-2 rounded-md" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                 Sign in
                </button>
                @if (Route::has('password.request'))
                <div class="mt-4">
                        <a href="{{ route('password.request') }}" class="text-white underline">
                                {{ __('Forgot your password?') }}
                        </a>
                </div>
                @endif
     </form>
     <div class="mt-6 text-white">
        Don't have an account yet?
        <a href="{{ route('register') }}" class="underline">
        Register for free
        </a>
     </div>
    </div>
 </body>
</html>
