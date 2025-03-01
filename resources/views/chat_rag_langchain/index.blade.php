@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>

    <div class="min-h-screen bg-white">
        <div class="max-w-8xl mx-auto px-4 py-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <!-- Chat Section (4/5 width) -->
                <div class="md:col-span-4">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 h-[calc(100vh-6rem)]">
                        <!-- Chat Messages Container -->
                        <div class="h-[calc(100%-100px)] overflow-y-auto p-6 custom-scrollbar" id="chat-container">
                            <div id="response" class="space-y-6">
                                <!-- Mensagens armazenadas no banco de dados -->
                                @foreach ($messages as $message)
                                    <!-- Pergunta do Usuário -->
                                    <div class="flex justify-end">
                                        <div
                                            class="bg-gradient-to-r from-purple-700 to-blue-800 text-white rounded-xl px-6 py-3 max-w-[80%] shadow-md">
                                            {{ $message->question }}
                                        </div>
                                    </div>

                                    <!-- Resposta do Chatbot -->
                                    <div class="flex justify-start">
                                        <div class="bg-gray-100 rounded-xl px-6 py-3 max-w-[80%] shadow-md">
                                            {{ $message->response }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Input Area -->
                        <div class="border-t border-gray-200 p-6 bg-white rounded-b-xl">
                            <div class="flex space-x-4">
                                <input type="text" id="question"
                                    class="flex-1 rounded-xl border border-gray-300 px-6 py-3 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-base"
                                    placeholder="Digite sua mensagem...">
                                <button onclick="askQuestion()"
                                    class="px-6 py-3 bg-gradient-to-r from-purple-700 to-blue-800 text-white rounded-xl hover:opacity-90 transition-all duration-200 transform hover:scale-105 flex items-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <path d="M22 2L11 13" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Upload Section (1/5 width) -->
                <div class="md:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold mb-6 text-gray-800">Upload de Arquivo</h2>

                        @if (session('message'))
                            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl shadow-sm">
                                <div class="flex items-center">
                                    <svg class="h-6 w-6 text-green-500 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="text-green-700 font-medium">{{ session('message') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('chat_rag.upload') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-6" id="upload-form">
                            @csrf
                            <div class="flex justify-center items-center w-full">
                                <label
                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 font-medium">Clique para upload</p>
                                        <p class="text-xs text-gray-500">PDF, TXT, DOC (MAX. 10MB)</p>
                                    </div>
                                    <input type="file" name="file" class="hidden" id="file-input" required>
                                </label>
                            </div>
                            <button type="submit"
                                class="w-full px-6 py-3 bg-gradient-to-r from-purple-700 to-blue-800 text-white rounded-xl hover:opacity-90 transition-all duration-200 transform hover:scale-105 shadow-md font-medium">
                                Enviar Arquivo
                            </button>
                        </form>
                    </div>

                    <!-- Uploaded Files List -->
                    <div class="mt-6 bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                        <h3 class="text-xl font-semibold mb-6 text-gray-800">📂 Seus Arquivos</h3>
                        @if ($documents->isEmpty())
                            <p class="text-gray-500">Nenhum arquivo enviado ainda.</p>
                        @else
                            <ul class="space-y-4">
                                @foreach ($documents as $document)
                                    <li class="flex justify-between items-center bg-gray-100 p-3 rounded-lg shadow-sm">
                                        <span class="text-gray-800">{{ $document->name }}</span>
                                        <div class="flex gap-3">
                                            <!-- Download -->
                                            <a href="{{ route('chat_rag.download', $document->id) }}"
                                                class="text-blue-600 hover:underline">📥 Baixar</a>

                                            <!-- Delete -->
                                            <form action="{{ route('chat_rag.delete', $document->id) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">🗑️
                                                    Excluir</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>


                    <style>
                        .custom-scrollbar::-webkit-scrollbar {
                            width: 8px;
                        }

                        .custom-scrollbar::-webkit-scrollbar-track {
                            background: #f1f1f1;
                            border-radius: 4px;
                        }

                        .custom-scrollbar::-webkit-scrollbar-thumb {
                            background: linear-gradient(to bottom, #6b46c1, #1e40af);
                            border-radius: 4px;
                        }

                        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                            background: linear-gradient(to bottom, #553c9a, #1e3a8a);
                        }

                        @keyframes gradient-shift {
                            0% {
                                background-position: 0% 50%;
                            }

                            50% {
                                background-position: 100% 50%;
                            }

                            100% {
                                background-position: 0% 50%;
                            }
                        }

                        .message-appear {
                            animation: messageAppear 0.3s ease-out forwards;
                        }

                        @keyframes messageAppear {
                            from {
                                opacity: 0;
                                transform: translateY(10px);
                            }

                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }
                    </style>

                    <script>
                        let isLoading = false;

                        function askQuestion() {
                            if (isLoading) return;

                            const question = document.getElementById("question").value;
                            if (!question.trim()) return;

                            isLoading = true;
                            const responseDiv = document.getElementById("response");

                            // Adiciona a mensagem do usuário
                            const userMessage = document.createElement("div");
                            userMessage.className = "flex justify-end mb-6 message-appear";
                            userMessage.innerHTML = `
            <div class="bg-gradient-to-r from-purple-700 to-blue-800 text-white rounded-xl px-6 py-3 max-w-[80%] shadow-md">
                ${question}
            </div>
        `;
                            responseDiv.appendChild(userMessage);

                            // Adiciona o indicador de loading
                            const loadingDiv = document.createElement("div");
                            loadingDiv.className = "flex items-center space-x-3 mb-6 message-appear";
                            loadingDiv.innerHTML = `
            <div class="flex space-x-2 bg-gray-100 rounded-xl px-6 py-4">
                <div class="w-3 h-3 bg-gradient-to-r from-purple-700 to-blue-800 rounded-full animate-bounce"></div>
                <div class="w-3 h-3 bg-gradient-to-r from-purple-700 to-blue-800 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                <div class="w-3 h-3 bg-gradient-to-r from-purple-700 to-blue-800 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
        `;
                            responseDiv.appendChild(loadingDiv);

                            // Scroll para o final
                            const container = document.getElementById("chat-container");
                            container.scrollTop = container.scrollHeight;

                            axios.post('{{ route('chat_rag.ask') }}', {
                                    query: question
                                })
                                .then(response => {
                                    loadingDiv.remove();

                                    const botMessage = document.createElement("div");
                                    botMessage.className = "flex mb-6 message-appear";
                                    botMessage.innerHTML = `
                    <div class="bg-gray-100 rounded-xl px-6 py-3 max-w-[80%] shadow-md">
                        ${response.data.response}
                    </div>
                `;
                                    responseDiv.appendChild(botMessage);
                                    container.scrollTop = container.scrollHeight;
                                })
                                .catch(error => {
                                    loadingDiv.remove();
                                    const errorMessage = document.createElement("div");
                                    errorMessage.className = "flex mb-6 message-appear";
                                    errorMessage.innerHTML = `
                    <div class="bg-red-100 text-red-700 rounded-xl px-6 py-3 max-w-[80%] shadow-md">
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

                        // Listener para envio com Enter
                        document.getElementById("question").addEventListener("keypress", function(event) {
                            if (event.key === "Enter") {
                                event.preventDefault();
                                askQuestion();
                            }
                        });

                        // Atualizar nome do arquivo selecionado
                        document.getElementById("file-input").addEventListener("change", function(e) {
                            const fileName = e.target.files[0]?.name;
                            if (fileName) {
                                const fileText = document.querySelector(".text-sm.text-gray-500");
                                fileText.textContent = fileName;
                            }
                        });

                        // Animação de upload
                        document.getElementById("upload-form").addEventListener("submit", function() {
                            const button = this.querySelector("button[type=submit]");
                            button.innerHTML = `
            <div class="flex items-center justify-center">
                <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Enviando...</span>
            </div>
        `;
                            button.disabled = true;
                        });

                        // Adiciona efeito hover nas mensagens
                        document.getElementById("chat-container").addEventListener("mouseover", function(e) {
                            const message = e.target.closest(".message-appear");
                            if (message) {
                                message.style.transform = "scale(1.01)";
                                message.style.transition = "transform 0.2s ease";
                            }
                        });

                        document.getElementById("chat-container").addEventListener("mouseout", function(e) {
                            const message = e.target.closest(".message-appear");
                            if (message) {
                                message.style.transform = "scale(1)";
                            }
                        });
                    </script>

                @endsection
