@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaInfo - Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0e1a;
            color: #e2e8f0;
            overflow-x: hidden;
            position: relative;
        }
        .star-field {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            background: radial-gradient(circle, rgba(10, 14, 26, 1) 0%, rgba(0, 0, 0, 1) 100%);
        }
        .star {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            animation: twinkle 5s infinite;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }
        .nebula {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(147, 51, 234, 0.2) 0%, rgba(10, 14, 26, 0) 70%);
            filter: blur(50px);
            animation: drift 20s infinite linear;
        }
        @keyframes drift {
            0% { transform: translate(0, 0); }
            50% { transform: translate(100px, 50px); }
            100% { transform: translate(0, 0); }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-link:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <!-- Fundo Estelar -->
    <div class="star-field">
        <div class="nebula" style="top: 10%; left: 20%;"></div>
        <div class="nebula" style="top: 60%; left: 70%;"></div>
        <script>
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.className = 'star';
                star.style.width = `${Math.random() * 2 + 1}px`;
                star.style.height = star.style.width;
                star.style.top = `${Math.random() * 100}%`;
                star.style.left = `${Math.random() * 100}%`;
                star.style.animationDelay = `${Math.random() * 5}s`;
                document.querySelector('.star-field').appendChild(star);
            }
        </script>
    </div>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 glass-effect min-h-screen flex flex-col" data-aos="fade-right" data-aos-duration="800">
            <!-- Profile Section -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                        <a href="{{ route('profile') }}">
                            <span class="text-sm text-white font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </a>
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('profile') }}">
                            <h2 class="text-sm font-medium text-gray-200 truncate">{{ Auth::user()->name }}</h2>
                        </a>
                        <a href="{{ route('profile') }}">
                            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <div class="space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-blue-400 rounded-lg bg-blue-900/20 font-medium sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('chat_rag.index') }}"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        ChatRag | Langchain
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Automações
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        Duolingo
                    </a>

                    <a href="{{ route('saints.index') }}"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                        </svg>
                        Santos
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Análises
                    </a>
                </div>
            </nav>

            <!-- Bottom Section -->
            <div class="p-4 border-t border-gray-700">
                <button class="w-full flex items-center gap-3 px-3 py-2 text-sm text-gray-300 rounded-lg sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Configurações
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="max-w-5xl mx-auto">
                <!-- Header -->
                <header class="mb-8" data-aos="fade-up" data-aos-duration="800">
                    <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500" style="font-family: 'Orbitron', sans-serif;">Dashboard</h1>
                </header>

                <!-- Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Project Stats Card -->
                    <div class="p-6 glass-effect rounded-xl card-hover" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-sm font-medium text-blue-400 mb-4" style="font-family: 'Orbitron', sans-serif;">Projetos Ativos</h3>
                        <p class="text-3xl font-light text-gray-200">12</p>
                    </div>

                    <!-- Activity Card -->
                    <div class="p-6 glass-effect rounded-xl card-hover" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-sm font-medium text-purple-400 mb-4" style="font-family: 'Orbitron', sans-serif;">Automações em Execução</h3>
                        <p class="text-3xl font-light text-gray-200">5</p>
                    </div>

                    <!-- Analysis Card -->
                    <div class="p-6 glass-effect rounded-xl card-hover" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-sm font-medium text-yellow-400 mb-4" style="font-family: 'Orbitron', sans-serif;">Análises Concluídas</h3>
                        <p class="text-3xl font-light text-gray-200">8</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
@endsection