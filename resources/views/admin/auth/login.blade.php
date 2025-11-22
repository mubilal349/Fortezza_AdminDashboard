<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FortezzaQuartz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex items-center justify-center h-screen">
    <div class="bg-gray-900 shadow-md rounded-lg p-8 w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Admin Login</h2>

        @if(session('error'))
            <div class="bg-red-900 text-red-200 p-3 mb-4 rounded border border-red-800">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-300 mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       required>
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-300 mb-2" for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full p-2 border border-gray-700 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       required>
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                Login
            </button>
        </form>
    </div>
</body>
</html>