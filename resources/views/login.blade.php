@extends('layouts.loginLayout')

@section('content')
<body class="min-h-screen bg-gradient-to-br from-maroon-50 to-red-900 flex items-center justify-center px-4">

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-maroon">Examora</h1>
            <p class="text-sm text-gray-600 mt-1">
                UMDC Test Examination Monitoring System
            </p>
        </div>

        <!-- Divider -->
        <div class="flex items-center gap-2 mb-6">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="text-xs text-gray-400 uppercase">Login</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <!-- Login Form -->
        <form class="space-y-5">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Username
                </label>
                <input
                    type="text"
                    placeholder="username"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold"
                    required />
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    placeholder="••••••••"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold"
                    required />
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" class="accent-maroon">
                    Remember me
                </label>
                <a href="#" class="text-maroon hover:text-gold font-medium">
                    Forgot password?
                </a>
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="w-full bg-maroon-500 text-white font-semibold py-3 rounded-lg hover:bg-gold hover:text-maroon transition duration-300 shadow-md">
                Sign In
            </button>
        </form>

        <!-- Footer -->
        <p class="text-xs text-center text-gray-500 mt-6">
            © TEST System.
        </p>
    </div>

</body>
@endsection