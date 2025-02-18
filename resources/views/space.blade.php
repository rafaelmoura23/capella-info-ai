@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen relative overflow-hidden">
    <!-- Animated Background Elements -->
    <!-- Floating Particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="particle bg-blue-400/20 w-2 h-2 rounded-full absolute top-1/4 left-1/4 animate-float"></div>
        <div class="particle bg-purple-400/20 w-3 h-3 rounded-full absolute top-1/3 right-1/3 animate-float-delayed"></div>
        <div class="particle bg-slate-400/20 w-2 h-2 rounded-full absolute bottom-1/4 right-1/4 animate-float"></div>
    </div>

    <!-- Main Content -->
    <div class="relative container mx-auto px-4 py-8">
        <!-- Welcome Card -->
        <div class="mb-8">
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-xl transition-all hover:shadow-2xl hover:scale-[1.01] duration-300">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex-1">
                        <h1 class="text-4xl font-light text-slate-800 mb-2 bg-gradient-to-r from-slate-800 to-slate-600 bg-clip-text text-transparent">
                            Olá, {{ Auth::user()->name }}
                        </h1>
                        <p class="text-slate-600 font-light">
                            Explore seus projetos de inovação
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-colors flex items-center gap-2 group">
                            <span>Novo Projeto</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Stats Card -->
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all hover:scale-[1.02] duration-300">
                <div class="relative overflow-hidden">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-slate-800">Estatísticas</h3>
                        <span class="text-sm text-slate-500">Hoje</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-600">Projetos Ativos</span>
                            <span class="text-2xl font-light text-slate-800">12</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-600">Em Progresso</span>
                            <span class="text-2xl font-light text-slate-800">5</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-600">Concluídos</span>
                            <span class="text-2xl font-light text-slate-800">7</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-12 -right-12 w-32 h-32 bg-slate-100 rounded-full opacity-50"></div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all hover:scale-[1.02] duration-300">
                <h3 class="text-lg font-medium text-slate-800 mb-4">Atividade Recente</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                        <div>
                            <p class="text-sm text-slate-600">Novo projeto IA iniciado</p>
                            <p class="text-xs text-slate-500">Há 2 horas</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        <div>
                            <p class="text-sm text-slate-600">Automação atualizada</p>
                            <p class="text-xs text-slate-500">Há 5 horas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all hover:scale-[1.02] duration-300">
                <h3 class="text-lg font-medium text-slate-800 mb-4">Ações Rápidas</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button class="p-4 bg-slate-100 rounded-xl hover:bg-slate-200 transition-colors group">
                        <div class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-600 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <span class="text-sm text-slate-600 mt-2">Nova IA</span>
                        </div>
                    </button>
                    <button class="p-4 bg-slate-100 rounded-xl hover:bg-slate-200 transition-colors group">
                        <div class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-600 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span class="text-sm text-slate-600 mt-2">Automação</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Projects List -->
        <div class="bg-white/70 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-medium text-slate-800">Seus Projetos</h2>
                <div class="flex gap-2">
                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                    </button>
                    <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="space-y-4">
                <!-- Project Card -->
                <div class="group bg-slate-50/50 rounded-xl p-4 hover:bg-slate-100/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-slate-800">Chatbot IA</h4>
                                <p class="text-xs text-slate-500">Atualizado há 2 dias</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 text-xs font-light text-purple-600 bg-purple-100 rounded-full">
                                IA
                            </span>
                            <button class="p-2 hover:bg-white rounded-lg transition-colors opacity-0 group-hover:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-float-delayed {
        animation: float 8s ease-in-out infinite;
    }
    
    .delay-700 {
        animation-delay: 700ms;
    }
</style>
@endpush