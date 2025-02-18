@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 min-h-screen flex items-center justify-center">
    <article class="w-full max-w-2xl">
        <!-- Hero Section com Imagem -->
        <div class="relative h-80 mb-8 rounded-2xl overflow-hidden">
            <img 
                src="{{ asset('storage/' . $santo->imagem) }}" 
                alt="{{ $santo->nome_santo }}" 
                class="w-full h-full object-fit"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            
            <!-- Nome do Santo sobreposto à imagem -->
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <h1 class="text-3xl font-medium text-white mb-2">
                    {{ $santo->nome_santo }}
                </h1>
                <p class="text-white/80 text-sm">
                    {{ \Carbon\Carbon::parse($santo->dia)->locale('pt_BR')->isoFormat('D [de] MMMM') }}
                </p>
            </div>
        </div>

        <!-- Frase do Santo -->
        <div class="space-y-6 px-4">
            <blockquote class="text-xl text-gray-700 leading-relaxed">
                "{{ $santo->frase }}"
            </blockquote>

            <!-- Botão Voltar -->
            <div class="pt-8">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
    </article>
</div>
@endsection