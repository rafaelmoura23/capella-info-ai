<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-slate-50/50">
    <!-- Background Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute w-full h-full bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-900/90 to-slate-900/75 opacity-[0.03]"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
        <div class="grid grid-cols-8 h-full w-full">
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
            <div class="col-span-1 border-r border-slate-200/20"></div>
        </div>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 border-r border-slate-200 bg-white/50 backdrop-blur-xl">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-slate-200">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-slate-800 to-slate-700 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-slate-800">TechHub</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 py-6 px-4 space-y-1.5 overflow-y-auto">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-800 rounded-lg bg-slate-100/80 font-medium group relative">
                        <div class="absolute inset-0 bg-slate-800 opacity-0 group-hover:opacity-[0.03] transition-opacity"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Dashboard
                        <span class="ml-auto bg-slate-800 text-white px-2 py-0.5 rounded text-xs">5</span>
                    </a>

                    <div class="px-3 py-2">
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Projetos</p>
                    </div>

                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-100/80 group relative">
                        <div class="absolute inset-0 bg-slate-800 opacity-0 group-hover:opacity-[0.03] transition-opacity"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Inteligência Artificial
                        <div class="w-2 h-2 rounded-full bg-purple-400 ml-auto"></div>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-100/80 group relative">
                        <div class="absolute inset-0 bg-slate-800 opacity-0 group-hover:opacity-[0.03] transition-opacity"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Automações
                        <div class="w-2 h-2 rounded-full bg-blue-400 ml-auto"></div>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-100/80 group relative">
                        <div class="absolute inset-0 bg-slate-800 opacity-0 group-hover:opacity-[0.03] transition-opacity"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Análises
                        <div class="w-2 h-2 rounded-full bg-green-400 ml-auto"></div>
                    </a>

                    <div class="px-3 py-2 mt-6">
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Configurações</p>
                    </div>

                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-100/80 group relative">
                        <div class="absolute inset-0 bg-slate-800 opacity-0 group-hover:opacity-[0.03] transition-opacity"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Configurações
                    </a>
                </nav>

                <!-- User -->
                <div class="h-20 flex items-center gap-3 px-6 border-t border-slate-200">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center">
                        <span class="text-sm text-slate-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-medium text-slate-800 truncate">{{ Auth::user()->name }}</h3>
                        <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="h-16 border-b border-slate-200 bg-white/50 backdrop-blur-xl">
                <div class="h-full px-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <h1 class="text-lg font-medium text-slate-800">Workspace</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-6">
                <div class="max-w-6xl mx-auto">
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-shadow relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-purple-500/0 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-sm font-medium text-slate-800">Projetos IA</h3>
                                    <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-2xl font-semibold text-slate-800 mb-2">24</p>
                                <p class="text-sm text-slate-500">3 novos esta semana</p>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-shadow relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-blue-500/0 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-sm font-medium text-slate-800">Automações Ativas</h3>
                                    <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-2xl font-semibold text-slate-800 mb-2">156</p>
                                <p class="text-sm text-slate-500">12 executadas hoje</p>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-shadow relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-green-500/0 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-sm font-medium text-slate-800">Análises Geradas</h3>
                                    <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-2xl font-semibold text-slate-800 mb-2">832</p>
                                <p class="text-sm text-slate-500">↑ 24% este mês</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white border border-slate-200 rounded-xl">
                        <div class="px-6 py-4 border-b border-slate-200">
                            <h3 class="font-medium text-slate-800">Atividade Recente</h3>
                        </div>
                        <div class="divide-y divide-slate-200">
                            <div class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-slate-800 font-medium">Novo projeto IA iniciado</p>
                                        <p class="text-sm text-slate-500">Análise preditiva de dados</p>
                                    </div>
                                    <span class="text-sm text-slate-500">2 min atrás</span>
                                </div>
                            </div>
                            <!-- Add more activity items as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection