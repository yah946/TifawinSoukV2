<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Register
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-600 text-sm" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-sm" />
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">
                    Phone Number
                </label>
                <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                <x-input-error :messages="$errors->get('phone_number')" class="mt-1 text-red-600 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input id="password" type="password" name="password" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-600 text-sm" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-orange-500-400">
                    Already registered?
                </a>

                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-1">
                    Register
                </button>
            </div>

        </form>
    </div>

</body>
</html>
