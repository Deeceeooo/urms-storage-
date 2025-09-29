<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
        /* Background gradient with smooth animation */
        .animated-bg {
            background: linear-gradient(120deg, #520000, #8f0002, #ffc107, #f9f5db);
            background-size: 300% 300%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        /* Glass effect card */
        .glass {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }
        /* Fade in animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fadeUp { animation: fadeUp 1s ease forwards; }
        /* Buttons */
        .btn {
            padding: 0.9rem 2.2rem;
            font-size: 1.1rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.07);
        }
    </style>
</head>
<body class="animated-bg min-h-screen flex flex-col items-center justify-center text-white">

    <!-- Main Center Card -->
    <div class="glass rounded-2xl shadow-xl max-w-4xl w-full mx-6 p-10 text-center fadeUp">

        <!-- Hero Section -->
        <section class="mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="System Logo" class="w-24 h-24 mx-auto mb-4">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-6">
                {{ config('app.name', 'Laravel') }}
            </h1>

            <!-- Buttons -->
            @if (Route::has('login'))
                <div class="flex flex-wrap justify-center gap-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                            class="btn bg-yellow-400 text-[#520000] shadow-lg hover:bg-yellow-300">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                            class="btn glass text-white shadow-lg hover:bg-white/30">
                            Log In
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                                class="btn glass text-white shadow-lg hover:bg-white/30">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </section>

        <!-- System Overview -->
        <section>
            <h2 class="text-2xl sm:text-3xl font-bold mb-4">System Overview</h2>
            <p class="text-base sm:text-lg opacity-95 leading-relaxed">
                {{ config('app.name', 'Laravel') }} is designed to streamline workflows and 
                provide a secure, user-friendly environment for managing information. 
                Built with modern web technologies, it ensures fast performance, reliable 
                access, and an interface that adapts seamlessly across devices.  
                Whether you’re an admin, staff, or student, the system empowers you with 
                tools to simplify tasks and stay connected.
                is designed to streamline workflows and 
                provide a secure, user-friendly environment for managing information. 
                Built with modern web technologies, it ensures fast performance, reliable 
                access, and an interface that adapts seamlessly across devices.  
                Whether you’re an admin, staff, or student, the system empowers you with 
                tools to simplify tasks and stay connected.
            </p>
            <p> is designed to streamline workflows and 
                provide a secure, user-friendly environment for managing information. 
                Built with modern web technologies, it ensures fast performance, reliable 
                access, and an interface that adapts seamlessly across devices.  
                Whether you’re an admin, staff, or student, the system empowers you with 
                tools to simplify tasks and stay connected.
            </p>
        </section>

    </div>

    <!-- Footer -->
    <footer class="py-6 text-center text-sm opacity-80">
        © {{ date('Y') }} {{ config('app.name', 'Laravel') }} | Developed by SpiceGirls
    </footer>
</body>
</html>
