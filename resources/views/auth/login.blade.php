@extends('layouts.app', ['hideFooter' => true])


@section('content')
<div class="flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-sm border border-slate-100">
        {{-- Header --}}
        <div class="text-center mb-6">
            <h2 class="text-2xl font-light tracking-wide text-slate-800">Login</h2>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-100 rounded-md p-3 mb-4">
                <p class="text-sm font-light text-green-700">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="bg-red-50 border border-red-100 rounded-md p-3 mb-4">
                @foreach($errors->all() as $error)
                    <p class="text-sm font-light text-red-700">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            
            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        placeholder="E-mail" 
                        class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-lg font-light text-sm placeholder-slate-400 focus:outline-none focus:border-slate-400 transition-colors"
                        required
                    >
                </div>
            </div>

            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Senha" 
                        class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-lg font-light text-sm placeholder-slate-400 focus:outline-none focus:border-slate-400 transition-colors"
                        required
                    >
                </div>
            </div>

            <div>
                <button type="submit" class="w-full bg-slate-800 text-white px-4 py-2.5 rounded-lg text-sm font-light hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                    Entrar
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('register') }}" class="text-sm font-light text-slate-600 hover:text-slate-800 transition-colors">
                    Criar conta
                </a>
            </div>
        </form>
    </div>
</div>
@endsection