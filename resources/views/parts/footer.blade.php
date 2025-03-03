<footer class="w-full py-16 mt-auto relative" style="font-family: 'Inter', sans-serif;">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Fundo com detalhes astronômicos -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="star" style="top: 10%; left: 15%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 30%; left: 70%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 80%; left: 40%; width: 3px; height: 3px;"></div>
            <div class="orbit-line" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
            <!-- Company Info -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500" style="font-family: 'Orbitron', sans-serif;">
                        CapellaInfo
                    </h2>
                    <p class="text-sm font-light text-gray-400 leading-relaxed">
                        Conectando tecnologia e astros para criar soluções cósmicas.
                    </p>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6">
                <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wider">Contato</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm font-light">contato@capellainfo.com</span>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm font-light">+55 (19) 9999-9999</span>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm font-light">Órbita de São Paulo, SP</span>
                    </div>
                </div>
            </div>

            <!-- Links -->
            <div class="space-y-6">
                <h3 class="text-sm font-medium text-gray-300 uppercase tracking-wider">Navegação</h3>
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="block text-sm font-light text-gray-400 hover:text-blue-400 transition-colors">
                        Início
                    </a>
                    <a href="#about" class="block text-sm font-light text-gray-400 hover:text-blue-400 transition-colors">
                        Sobre
                    </a>
                    <a href="#technologies" class="block text-sm font-light text-gray-400 hover:text-blue-400 transition-colors">
                        Tecnologias
                    </a>
                    <a href="#contact" class="block text-sm font-light text-gray-400 hover:text-blue-400 transition-colors">
                        Contato
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-px bg-gray-800/50 my-12 relative z-10"></div>

        <!-- Bottom Section -->
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 relative z-10">
            <p class="text-xs font-light text-gray-500">
                © {{ date('Y') }} CapellaInfo. Explorando o universo da tecnologia.
            </p>
            <div class="flex space-x-6">
                <a href="#" class="text-xs font-light text-gray-500 hover:text-blue-400 transition-colors">
                    Política de Privacidade
                </a>
                <a href="#" class="text-xs font-light text-gray-500 hover:text-blue-400 transition-colors">
                    Termos de Uso
                </a>
            </div>
        </div>
    </div>
</footer>

<style>
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
    .orbit-line {
        position: absolute;
        width: 200px;
        height: 200px;
        border: 1px dashed rgba(147, 51, 234, 0.3);
        border-radius: 50%;
        animation: orbit 20s infinite linear;
    }
    @keyframes orbit {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
</style>