@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="min-h-screen bg-white">
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-light text-slate-800 mb-8">Configurações da Conta</h1>

            <!-- Profile Information -->
            <div class="bg-white border border-slate-100 rounded-lg p-6 mb-6">
                <h2 class="text-lg font-medium text-slate-800 mb-6">Informações do Perfil</h2>

                <!-- Profile Photo -->
                <div class="mb-6">
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            <div
                                class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden">
                                <!-- @if(Auth::user()->profile_photo)
                                        <img src="{{ Auth::user()->profile_photo }}" alt="Profile photo" class="w-full h-full object-cover">
                                    @else -->
                                <span class="text-2xl text-slate-400">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                <!-- @endif -->
                            </div>
                            <label
                                class="absolute -bottom-1 -right-1 w-8 h-8 bg-white rounded-full border border-slate-200 flex items-center justify-center cursor-pointer hover:bg-slate-50 transition-colors">
                                <input type="file" name="photo" class="hidden" accept="image/*">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-slate-800">Foto de Perfil</h3>
                            <p class="text-sm text-slate-500">JPG ou PNG. Máximo 1MB.</p>
                        </div>
                    </div>
                </div>

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nome</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-400 transition-colors">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-400 transition-colors">
                </div>

                <button type="submit"
                    class="bg-slate-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-slate-700 transition-colors">
                    Salvar Alterações
                </button>
            </div>

            <!-- Password Update -->
            <div class="bg-white border border-slate-100 rounded-lg p-6 mb-6">
                <h2 class="text-lg font-medium text-slate-800 mb-6">Atualizar Senha</h2>


                <div>
                    <label for="current_password" class="block text-sm font-medium text-slate-700 mb-2">Senha Atual</label>
                    <input type="password" id="current_password" name="current_password"
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-400 transition-colors">
                </div>

                <div>
                    <label for="new_password" class="block text-sm font-medium text-slate-700 mb-2">Nova Senha</label>
                    <input type="password" id="new_password" name="new_password"
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-400 transition-colors">
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirmar
                        Nova Senha</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                        class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-slate-400 transition-colors">
                </div>

                <button type="submit"
                    class="bg-slate-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-slate-700 transition-colors">
                    Atualizar Senha
                </button>
            </div>

            <!-- Two Factor Authentication -->
            <div class="bg-white border border-slate-100 rounded-lg p-6 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-medium text-slate-800">Autenticação de Dois Fatores</h2>
                        <p class="text-sm text-slate-500">Adicione segurança extra à sua conta</p>
                    </div>
                    <button
                        class="px-4 py-2 border border-slate-200 rounded-lg text-sm hover:bg-slate-50 transition-colors">
                        {{ Auth::user()->two_factor_enabled ? 'Desativar' : 'Ativar' }}
                    </button>
                </div>

                @if(!Auth::user()->two_factor_enabled)
                    <p class="text-sm text-slate-600">
                        Quando a autenticação de dois fatores estiver ativada, você precisará fornecer um código seguro
                        aleatório durante o login. Você pode obter este código do aplicativo Google Authenticator do seu
                        telefone.
                    </p>
                @endif
            </div>

            <!-- Active Sessions -->
            <div class="bg-white border border-slate-100 rounded-lg p-6 mb-6">
                <h2 class="text-lg font-medium text-slate-800 mb-6">Sessões Ativas</h2>

                <div class="space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-slate-100">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-slate-800">MacBook Pro - Chrome</p>
                                <p class="text-xs text-slate-500">São Paulo, Brasil - Última atividade há 2 minutos</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">
                            Atual
                        </span>
                    </div>
                </div>
            </div>

            <!-- Account Deletion -->
            <div class="bg-white border border-slate-100 rounded-lg p-6">
                <h2 class="text-lg font-medium text-slate-800 mb-6">Excluir Conta</h2>

                <p class="text-sm text-slate-600 mb-6">
                    Uma vez que sua conta é excluída, todos os seus recursos e dados serão permanentemente apagados. Antes
                    de excluir sua conta, por favor baixe quaisquer dados ou informações que você deseja manter.
                </p>

                <button type="button"
                    class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm hover:bg-red-100 transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    Excluir Conta
                </button>
            </div>
        </div>
    </div>
@endsection