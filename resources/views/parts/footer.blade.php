<!-- resources/views/components/footer.blade.php -->
<footer class="w-full bg-white font-['Inter'] py-16 mt-auto">
    <div class="max-w-6xl mx-auto px-6">
        {{-- Main Content --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            {{-- Company Info --}}
            <div class="space-y-6">
                <div class="space-y-2">
                    <h2 class="text-2xl font-light tracking-wide text-slate-800">CapellaInfo</h2>
                    <p class="text-sm font-light text-slate-600 leading-relaxed">
                        Transformando ideias em soluções digitais inovadoras
                    </p>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-6">
                <h3 class="text-sm font-medium text-slate-800 uppercase tracking-wider">Contato</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm font-light">contato@capellainfo.com</span>
                    </div>
                    <div class="flex items-center space-x-3 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm font-light">(19) 9999-9999</span>
                    </div>
                    <div class="flex items-center space-x-3 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm font-light">São Paulo, SP</span>
                    </div>
                </div>
            </div>

            {{-- Links --}}
            <div class="space-y-6">
                <h3 class="text-sm font-medium text-slate-800 uppercase tracking-wider">Links</h3>
                <div class="space-y-4">
                    <a href="" class="block text-sm font-light text-slate-600 hover:text-slate-800 transition-colors">
                        Início
                    </a>
                    <a href="" class="block text-sm font-light text-slate-600 hover:text-slate-800 transition-colors">
                        Sobre
                    </a>
                    <a href="" class="block text-sm font-light text-slate-600 hover:text-slate-800 transition-colors">
                        Serviços
                    </a>
                    <a href="" class="block text-sm font-light text-slate-600 hover:text-slate-800 transition-colors">
                        Contato
                    </a>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="h-px bg-slate-100 my-12"></div>

        {{-- Bottom Section --}}
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-xs font-light text-slate-500">
                © {{ date('Y') }} CapellaInfo. Todos os direitos reservados.
            </p>
            <div class="flex space-x-6">
                <a href="" class="text-xs font-light text-slate-500 hover:text-slate-800 transition-colors">
                    Política de Privacidade
                </a>
                <a href="" class="text-xs font-light text-slate-500 hover:text-slate-800 transition-colors">
                    Termos de Uso
                </a>
            </div>
        </div>
    </div>
</footer>