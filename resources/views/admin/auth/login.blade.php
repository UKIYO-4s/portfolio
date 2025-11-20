<!DOCTYPE html>
<html lang="ja" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-black text-white antialiased">
    <div class="min-h-full flex items-center justify-center px-6">
        <div class="w-full max-w-md">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-thin tracking-wide mb-2">Admin Login</h1>
                <p class="text-gray-400 text-sm">Portfolio Management System</p>
            </div>

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-900/20 border border-red-800 text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-2">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           required
                           autofocus
                           class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-400 mb-2">Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full px-6 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider font-medium">
                    Login
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-white transition-colors">
                    ← Back to Website
                </a>
            </div>
        </div>
    </div>
</body>
</html>
