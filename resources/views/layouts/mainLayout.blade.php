<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-maroon-500 text-white flex flex-col shadow-lg">

            <!-- Brand -->
            <div class="px-6 py-5 border-b border-white/20">
                <h1 class="text-2xl font-bold text-gold-500">
                    Examora
                </h1>
                <p class="text-xs text-white/70">
                    Examination System
                </p>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 text-sm">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    📊 Dashboard
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    📝 Exams
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    📥 Submissions
                </a>

                <a href="{{route('users')}}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    👥 Users
                </a>
                <a href="{{route('subjects')}}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    📓 Subjects
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gold-500 hover:text-maroon-500 transition">
                    ⚙️ Settings
                </a>
            </nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-white/20 text-xs text-white/70">
                © {{ date('Y') }} Examora
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>

</html>