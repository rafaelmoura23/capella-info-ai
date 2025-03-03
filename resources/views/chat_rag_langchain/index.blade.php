@extends('layouts.app')

@section('title', 'ChatRag')

@section('content')
<div class="min-h-screen pt-20"> <!-- Padding-top para evitar sobreposição do header -->
    <!-- Fundo Estelar -->
    <div class="star-field">
        <div class="nebula" style="top: 10%; left: 20%;"></div>
        <div class="nebula" style="top: 60%; left: 70%;"></div>
        <script>
            for (let i = 0; i < 100; i++) {
                let star = document.createElement('div');
                star.className = 'star';
                star.style.width = `${Math.random() * 2 + 1}px`;
                star.style.height = star.style.width;
                star.style.top = `${Math.random() * 100}%`;
                star.style.left = `${Math.random() * 100}%`;
                star.style.animationDelay = `${Math.random() * 5}s`;
                document.querySelector('.star-field').appendChild(star);
            }
        </script>
    </div>

    <!-- Main Content -->
    <main class="p-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <header class="mb-8 text-center" data-aos="fade-up" data-aos-duration="800">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500" style="font-family: 'Orbitron', sans-serif;">
                    ChatRag Estelar
                </h1>
                <p class="text-sm text-gray-400 mt-2">Converse com a inteligência cósmica e gerencie seus arquivos estelares</p>
            </header>

            <!-- Grid Principal -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Chat Section (3/4 width) -->
                <div class="md:col-span-3">
                    <div class="glass-effect rounded-xl h-[calc(100vh-8rem)] flex flex-col shadow-lg" data-aos="fade-up" data-aos-delay="100">
                        <!-- Chat Header -->
                        <div class="p-4 border-b border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-300" style="font-family: 'Orbitron', sans-serif;">Chat Cósmico</h2>
                        </div>

                        <!-- Chat Messages Container -->
                        <div class="flex-1 overflow-y-auto p-6 custom-scrollbar" id="chat-container">
                            <div id="response" class="space-y-6">
                                @foreach ($messages as $message)
                                    <!-- Pergunta do Usuário -->
                                    <div class="flex justify-end" data-aos="fade-left" data-aos-delay="200">
                                        <div class="bg-gradient-to-r from-blue-600 to-purple-700 text-white rounded-lg px-4 py-2 max-w-[70%] shadow-md transform hover:scale-105 transition-all duration-200">
                                            {{ $message->question }}
                                        </div>
                                    </div>
                                    <!-- Resposta do Chatbot -->
                                    <div class="flex justify-start" data-aos="fade-right" data-aos-delay="300">
                                        <div class="bg-gray-800/70 text-gray-200 rounded-lg px-4 py-2 max-w-[70%] shadow-md transform hover:scale-105 transition-all duration-200">
                                            {{ $message->response }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Input Area -->
                        <div class="p-4 border-t border-gray-700">
                            <div class="flex space-x-3 items-center backdrop-blur-md">
                                <input type="text" id="question"
                                    class="flex-1 rounded-full bg-gray-900/50 border border-gray-700 px-6 py-3 text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200"
                                    placeholder="Pergunte ao cosmos...">
                                <button onclick="askQuestion()"
                                    class="px-5 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M22 2L11 13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Upload Section (1/4 width) -->
                <div class="md:col-span-1 flex flex-col space-y-6">
                    <!-- Upload Card -->
                    <div class="glass-effect rounded-xl p-6 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-xl font-semibold text-gray-300 mb-4" style="font-family: 'Orbitron', sans-serif;">Upload Estelar</h2>

                        @if (session('message'))
                            <div class="mb-4 p-3 bg-green-900/50 border border-green-800 rounded-lg shadow-sm">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-sm text-green-300">{{ session('message') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('chat_rag.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4" id="upload-form">
                            @csrf
                            <div class="relative">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer bg-gray-800/40 hover:bg-gray-800/60 transition-all duration-200">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-xs text-gray-400 font-medium">PDF, TXT, DOC (MAX. 10MB)</p>
                                    </div>
                                    <input type="file" name="file" class="hidden" id="file-input" required>
                                    <span class="absolute bottom-2 text-xs text-gray-500" id="file-name">Selecione um arquivo</span>
                                </label>
                            </div>
                            <button type="submit"
                                class="w-full px-5 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 text-sm font-medium">
                                Enviar ao Cosmos
                            </button>
                        </form>
                    </div>

                    <!-- Uploaded Files Card -->
                    <div class="glass-effect rounded-xl p-6 shadow-lg flex-1" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-xl font-semibold text-gray-300 mb-4" style="font-family: 'Orbitron', sans-serif;">Arquivos em Órbita</h3>
                        @if ($documents->isEmpty())
                            <p class="text-sm text-gray-500">Nenhum arquivo em órbita ainda.</p>
                        @else
                            <ul class="space-y-3 max-h-[calc(100vh-20rem)] overflow-y-auto custom-scrollbar">
                                @foreach ($documents as $document)
                                    <li class="flex justify-between items-center bg-gray-800/50 p-3 rounded-lg shadow-sm hover:bg-gray-800/70 transition-all duration-200">
                                        <span class="text-sm text-gray-200 truncate max-w-[60%]">{{ $document->name }}</span>
                                        <div class="flex gap-2">
                                            <a href="{{ route('chat_rag.download', $document->id) }}"
                                                class="text-blue-400 hover:text-blue-500 transition-colors">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v4h16v-4M12 4v12m-6-6l6 6 6-6" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('chat_rag.delete', $document->id) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-500 transition-colors">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
<script>
    let isLoading = false;

    function askQuestion() {
        if (isLoading) return;

        const question = document.getElementById("question").value;
        if (!question.trim()) return;

        isLoading = true;
        const responseDiv = document.getElementById("response");

        const userMessage = document.createElement("div");
        userMessage.className = "flex justify-end mb-6 message-appear";
        userMessage.innerHTML = `
            <div class="bg-gradient-to-r from-blue-600 to-purple-700 text-white rounded-lg px-4 py-2 max-w-[70%] shadow-md">
                ${question}
            </div>
        `;
        responseDiv.appendChild(userMessage);

        const loadingDiv = document.createElement("div");
        loadingDiv.className = "flex justify-start mb-6 message-appear";
        loadingDiv.innerHTML = `
            <div class="bg-gray-800/70 rounded-lg px-4 py-2 max-w-[70%] shadow-md flex items-center space-x-2">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
            </div>
        `;
        responseDiv.appendChild(loadingDiv);

        const container = document.getElementById("chat-container");
        container.scrollTop = container.scrollHeight;

        axios.post('{{ route('chat_rag.ask') }}', { query: question })
            .then(response => {
                loadingDiv.remove();
                const botMessage = document.createElement("div");
                botMessage.className = "flex justify-start mb-6 message-appear";
                botMessage.innerHTML = `
                    <div class="bg-gray-800/70 text-gray-200 rounded-lg px-4 py-2 max-w-[70%] shadow-md">
                        ${response.data.response}
                    </div>
                `;
                responseDiv.appendChild(botMessage);
                container.scrollTop = container.scrollHeight;
            })
            .catch(error => {
                loadingDiv.remove();
                const errorMessage = document.createElement("div");
                errorMessage.className = "flex justify-start mb-6 message-appear";
                errorMessage.innerHTML = `
                    <div class="bg-red-900/50 text-red-300 rounded-lg px-4 py-2 max-w-[70%] shadow-md">
                        Erro ao buscar resposta.
                    </div>
                `;
                responseDiv.appendChild(errorMessage);
                container.scrollTop = container.scrollHeight;
            })
            .finally(() => {
                isLoading = false;
                document.getElementById("question").value = "";
            });
    }

    document.getElementById("question").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            askQuestion();
        }
    });

    document.getElementById("file-input").addEventListener("change", function(e) {
        const fileName = e.target.files[0]?.name || "Selecione um arquivo";
        document.getElementById("file-name").textContent = fileName;
    });

    document.getElementById("upload-form").addEventListener("submit", function() {
        const button = this.querySelector("button[type=submit]");
        button.innerHTML = `
            <div class="flex items-center justify-center">
                <svg class="animate-spin h-4 w-4 mr-2" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Enviando...</span>
            </div>
        `;
        button.disabled = true;
    });
</script>

<style>
    .star-field {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        background: radial-gradient(circle, rgba(10, 14, 26, 1) 0%, rgba(0, 0, 0, 1) 100%);
    }
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
    .nebula {
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(147, 51, 234, 0.2) 0%, rgba(10, 14, 26, 0) 70%);
        filter: blur(50px);
        animation: drift 20s infinite linear;
    }
    @keyframes drift {
        0% { transform: translate(0, 0); }
        50% { transform: translate(100px, 50px); }
        100% { transform: translate(0, 0); }
    }
    .glass-effect {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #3b82f6, #9333ea);
        border-radius: 3px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #2563eb, #7e22ce);
    }
    .message-appear {
        animation: messageAppear 0.3s ease-out forwards;
    }
    @keyframes messageAppear {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection