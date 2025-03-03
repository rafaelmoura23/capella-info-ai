<nav class="top-0 w-full z-50 glass-effect py-6" data-aos="fade-down" data-aos-duration="800">
    <div class="relative max-w-6xl mx-auto px-6">
        <div class="flex justify-between items-center">
            {{-- Logo Section --}}
            <div>
                <a href="{{ route('dashboard') }}"
                    class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 hover:text-blue-300 transition-colors"
                    style="font-family: 'Orbitron', sans-serif;">
                    CapellaInfo
                </a>
            </div>

            {{-- Auth Section --}}
            <div class="flex items-center space-x-8">
                @if (Auth::check())
                    <div class="flex items-center space-x-6">
                        {{-- User Greeting --}}
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-sm font-light text-gray-300">
                                Olá, {{ Auth::user()->name }}!
                            </span>
                        </div>

                        {{-- Logout Button --}}
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-sm font-light text-gray-400 hover:text-blue-400 transition-colors flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>

                        {{-- Notification Icon --}}
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400 hover:text-blue-400 transition-colors">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                            <span class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs font-bold px-1 py-0.5 rounded-full">
                                5
                            </span>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-6">
                        {{-- Login Link --}}
                        <a href="{{ route('login') }}"
                            class="text-sm font-light text-gray-400 hover:text-blue-400 transition-colors flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span>Login</span>
                        </a>

                        {{-- Register Link --}}
                        <a href="{{ route('register') }}"
                            class="text-sm font-light text-gray-400 hover:text-blue-400 transition-colors flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span>Registrar</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Adicionar AOS e estilo global no layout principal, se necessário -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>