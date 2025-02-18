@if($santoDoDia)
    <div id="santoPopup" class="fixed top-4 right-4 bg-white shadow-lg rounded-xl max-w-xs w-full z-50 border border-gray-100 transition-all duration-300 transform translate-x-[calc(100%+1rem)] overflow-hidden">
        <!-- Cabeçalho com imagem e nome integrados -->
        <div class="relative">
            @if($santoDoDia->imagem)
                <div class="relative h-40 bg-gray-50">
                    <img src="{{ asset('storage/' . $santoDoDia->imagem) }}" 
                         alt="Imagem do Santo" 
                         class="w-full h-full object-cover">
                    <!-- Gradiente mais suave -->
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-white"></div>
                </div>
            @endif
            
            <!-- Nome sobreposto à imagem na parte inferior -->
            <div class="absolute bottom-0 left-0 right-0 p-4 text-center">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $santoDoDia->nome_santo }}</h3>
                <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($santoDoDia->dia)->format('d/m') }}</p>
            </div>
        </div>
        
        <!-- Frase do santo -->
        <div class="px-6 py-4 bg-white">
            <p class="text-sm text-gray-600 text-center leading-relaxed">
                "{{ $santoDoDia->frase }}"
            </p>
        </div>

        <!-- Botão Saiba Mais -->
        <div class="px-6 pb-6 pt-2 text-center">
            <a href="{{ route('santos.show', $santoDoDia->id) }}" 
               class="inline-flex items-center justify-center space-x-2 px-4 py-2 text-sm text-white bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <span>Saiba mais</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Botão Toggle com Imagem do Santo -->
    <button id="toggleSanto" class="fixed top-4 right-4 z-50 transition-all duration-200 hover:opacity-90">
        <div class="relative">
            @if($santoDoDia->imagem)
                <img src="{{ asset('storage/' . $santoDoDia->imagem) }}" 
                     alt="Toggle Santo do Dia" 
                     class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-lg">
                <div class="absolute inset-0 rounded-full hover:bg-black hover:bg-opacity-5 transition-all duration-200"></div>
            @else
                <div class="w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
            @endif
        </div>
    </button>

    <script>
        const popup = document.getElementById('santoPopup');
        const toggleBtn = document.getElementById('toggleSanto');
        let isOpen = false;

        toggleBtn.addEventListener('click', () => {
            isOpen = !isOpen;
            
            if (isOpen) {
                popup.style.transform = 'translateX(0)';
            } else {
                popup.style.transform = 'translateX(calc(100% + 1rem))';
            }
        });
    </script>
@endif