@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Cadastro de Santo do Dia</h2>

        {{-- Formulário de Cadastro --}}
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('saints.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf

            <!-- Nome do Santo -->
            <div class="mb-3">
                <label for="nome_santo" class="block text-sm font-medium">Nome do Santo:</label>
                <input type="text" id="nome_santo" name="nome_santo" required class="w-full border rounded p-2">
                @error('nome_santo')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dia -->
            <div class="mb-3">
                <label for="dia" class="block text-sm font-medium">Dia:</label>
                <input type="date" id="dia" name="dia" required class="w-full border rounded p-2"
                    max="12-31">
                @error('dia')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <!-- Frase -->
            <div class="mb-3">
                <label for="frase" class="block text-sm font-medium">Frase:</label>
                <input type="text" id="frase" name="frase" required class="w-full border rounded p-2">
                @error('frase')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Imagem -->
            <div class="mb-3">
                <label for="imagem" class="block text-sm font-medium">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="w-full border rounded p-2">
                @error('imagem')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Envio -->
            <div class="mt-4">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Cadastrar
                    Santo</button>
            </div>
        </form>

        {{-- Tabela com os registros --}}
        <h3 class="text-xl font-semibold mb-4">Santos Cadastrados</h3>
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nome</th>
                    <th class="border p-2">Dia</th>
                    <th class="border p-2">Frase</th>
                    <th class="border p-2">Imagem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($santos as $santo)
                    <tr class="hover:bg-gray-100">
                        <td class="border p-2">{{ $santo->id }}</td>
                        <td class="border p-2">{{ $santo->nome_santo }}</td>
                        <td class="border p-2">{{ \Carbon\Carbon::parse($santo->dia)->format('d/m/Y') }}</td>
                        <td class="border p-2">{{ $santo->frase }}</td>
                        <td class="border p-2">
                            @if ($santo->imagem)
                                <img src="{{ asset('storage/' . $santo->imagem) }}" alt="Imagem do Santo"
                                    class="h-16 w-auto">
                            @else
                                <span class="text-gray-500">Sem imagem</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border p-4 text-center text-gray-500">Nenhum santo cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
