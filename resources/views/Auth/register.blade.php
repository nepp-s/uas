<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registration Page</title>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-green-600 rounded-md shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register.save') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-600 text-sm font-medium mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full border-gray-300 rounded-md focus:ring focus:ring-blue-200 focus:border-blue-500 p-2">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        Register
                    </button>
                </div>
                <div class="mt-4 text-center text-gray-500">
                   Already have an account? <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Login here</a>.
                </div>
            </form>
        </div>
    </div>
</body>
</html>