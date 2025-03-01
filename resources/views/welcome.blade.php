<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapellaInfo - Onde a Tecnologia Brilha</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0e1a;
            color: #e2e8f0;
            overflow-x: hidden;
            position: relative;
        }
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
        .card {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at var(--x, 50%) var(--y, 50%), rgba(59, 130, 246, 0.6), rgba(147, 51, 234, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        .card:hover::before {
            opacity: 1;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .section-connector {
            position: absolute;
            width: 2px;
            background: linear-gradient(to bottom, rgba(59, 130, 246, 0.5), rgba(147, 51, 234, 0));
            z-index: -1;
        }
        .orbit {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 1px dashed rgba(147, 51, 234, 0.5);
            border-radius: 50%;
            animation: orbit 10s infinite linear;
        }
        @keyframes orbit {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .tech-list li {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .tech-list li:hover {
            color: #93c5fd;
            transform: translateX(5px);
        }
        .tech-list li.active {
            color: #3b82f6;
            font-weight: 600;
        }
        .orbital-card {
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid rgba(147, 51, 234, 0.3);
            border-radius: 50%;
            width: 180px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            background: radial-gradient(circle, rgba(10, 14, 26, 0.8), rgba(0, 0, 0, 0.9));
        }
        .orbital-card:hover {
            transform: scale(1.1);
            border-color: rgba(59, 130, 246, 0.8);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
        .orbital-card::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border: 1px dashed rgba(147, 51, 234, 0.3);
            border-radius: 50%;
            animation: orbit 15s infinite linear;
            z-index: -1;
        }
        .chat-box {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 400px;
            background: rgba(10, 14, 26, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            display: none;
            flex-direction: column;
        }
        .chat-box.active {
            display: flex;
        }
        .chat-header {
            background: linear-gradient(to right, #3b82f6, #9333ea);
            padding: 10px;
            color: white;
            text-align: center;
        }
        .chat-messages {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            color: #e2e8f0;
        }
        .chat-input {
            display: flex;
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
        }
        .chat-input input {
            flex: 1;
            background: transparent;
            border: none;
            color: #e2e8f0;
            outline: none;
        }
        .chat-input button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .chat-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #3b82f6;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
        }
        /* Estilo para a seção acadêmica */
        .academic-card {
            position: relative;
            padding: 20px;
            border-left: 4px solid #3b82f6;
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.3s ease;
        }
        .academic-card:hover {
            border-left-color: #9333ea;
            transform: translateX(10px);
        }
        .academic-card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: -10px;
            width: 10px;
            height: 10px;
            background: #3b82f6;
            border-radius: 50%;
            transform: translateY(-50%);
            transition: background 0.3s ease;
        }
        .academic-card:hover::after {
            background: #9333ea;
        }
    </style>
</head>
<body>
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

    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 glass-effect py-4 px-6 flex justify-between items-center">
        <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500" style="font-family: 'Orbitron', sans-serif;">
            CapellaInfo
        </div>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:bg-blue-500 rounded-lg transition duration-300">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:shadow-lg transition duration-300">Cadastro</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative">
        <div class="text-center" data-aos="zoom-in" data-aos-duration="1200">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight" style="font-family: 'Orbitron', sans-serif;">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">CapellaInfo</span>
            </h1>
            <p class="text-lg md:text-2xl text-gray-300 max-w-3xl mx-auto mb-8">
                Tecnologia estelar, automação cósmica e dados que iluminam o universo. Com um toque de fé nas estrelas.
            </p>
            <a href="#explore" class="inline-block px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-full hover:shadow-lg hover:scale-105 transform transition duration-300">
                Descubra o Cosmos
            </a>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção de Destaques -->
    <section id="explore" class="py-20 px-6 relative">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card glass-effect p-6 rounded-xl" data-aos="fade-right" onmousemove="updateGradient(event, this)" onmouseleave="resetGradient(this)">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">IA Estelar</h3>
                <p class="text-gray-300">Inteligência artificial que brilha como uma supernova.</p>
            </div>
            <div class="card glass-effect p-6 rounded-xl" data-aos="fade-up" onmousemove="updateGradient(event, this)" onmouseleave="resetGradient(this)">
                <h3 class="text-2xl font-semibold text-purple-400 mb-4">Automação Cósmica</h3>
                <p class="text-gray-300">Processos que orbitam em perfeita harmonia.</p>
            </div>
            <div class="card glass-effect p-6 rounded-xl" data-aos="fade-left" onmousemove="updateGradient(event, this)" onmouseleave="resetGradient(this)">
                <h3 class="text-2xl font-semibold text-yellow-400 mb-4">Dados Celestiais</h3>
                <p class="text-gray-300">Insights profundos como constelações no céu.</p>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Modelos de IA -->
    <section class="py-20 px-6 relative" id="models">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Constelações de Inteligência
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xl font-semibold text-blue-400 mb-2">GPT</h3>
                    <p class="text-gray-300 mb-4">O pioneiro que ilumina o processamento de linguagem.</p>
                    <div class="h-2 bg-gradient-to-r from-blue-500 to-transparent rounded-full" style="width: 80%;"></div>
                </div>
                <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-semibold text-purple-400 mb-2">Llama</h3>
                    <p class="text-gray-300 mb-4">Eficiência estelar em modelos leves.</p>
                    <div class="h-2 bg-gradient-to-r from-purple-500 to-transparent rounded-full" style="width: 60%;"></div>
                </div>
                <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-xl font-semibold text-yellow-400 mb-2">DeepSeek</h3>
                    <p class="text-gray-300 mb-4">Explorações profundas no universo dos dados.</p>
                    <div class="h-2 bg-gradient-to-r from-yellow-500 to-transparent rounded-full" style="width: 70%;"></div>
                </div>
                <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-xl font-semibold text-red-400 mb-2">Grok</h3>
                    <p class="text-gray-300 mb-4">Compreensão cósmica em tempo real.</p>
                    <div class="h-2 bg-gradient-to-r from-red-500 to-transparent rounded-full" style="width: 90%;"></div>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Ciência de Dados e Algoritmos -->
    <section class="py-20 px-6 relative" id="data-science">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12 text-center" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Órbitas do Conhecimento
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="glass-effect p-8 rounded-xl" data-aos="fade-right">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">Ciência de Dados</h3>
                    <p class="text-gray-300">Mapear o universo dos dados é como traçar constelações: cada ponto revela um padrão, cada insight uma supernova de possibilidades.</p>
                </div>
                <div class="glass-effect p-8 rounded-xl" data-aos="fade-left">
                    <h3 class="text-2xl font-semibold text-purple-400 mb-4">Algoritmos & "Attention is All You Need"</h3>
                    <p class="text-gray-300">O paper que lançou os Transformers ao cosmos da IA. "Attention" é a gravidade que conecta palavras, ideias e mundos.</p>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Automações -->
    <section class="py-20 px-6 relative" id="automation">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Sistemas em Órbita
            </h2>
            <div class="relative">
                <div class="orbit" style="top: -50px; left: 20%;"></div>
                <div class="orbit" style="top: 50%; right: 10%; width: 150px; height: 150px;"></div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-right">
                        <h3 class="text-xl font-semibold text-blue-400 mb-4">Robótica Planetária</h3>
                        <p class="text-gray-300">Automações que movem mundos com precisão estelar.</p>
                    </div>
                    <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-up">
                        <h3 class="text-xl font-semibold text-purple-400 mb-4">Fluxos Cósmicos</h3>
                        <p class="text-gray-300">Pipelines que conectam dados como órbitas gravitacionais.</p>
                    </div>
                    <div class="glass-effect p-6 rounded-xl hover:shadow-xl transition duration-300" data-aos="fade-left">
                        <h3 class="text-xl font-semibold text-yellow-400 mb-4">Sistemas Autônomos</h3>
                        <p class="text-gray-300">Máquinas que aprendem e operam sob as leis do cosmos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Tecnologias -->
    <section class="py-20 px-6 relative" id="technologies">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12 text-center" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Ferramentas Estelares
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="glass-effect p-8 rounded-xl" data-aos="fade-right">
                    <ul class="tech-list space-y-4 text-lg">
                        <li onclick="showDescription('laravel')" class="active">Laravel</li>
                        <li onclick="showDescription('github')">GitHub</li>
                        <li onclick="showDescription('javascript')">JavaScript</li>
                        <li onclick="showDescription('python')">Python</li>
                        <li onclick="showDescription('ia')">IA (Dev & Data Science)</li>
                    </ul>
                </div>
                <div class="glass-effect p-8 rounded-xl" data-aos="fade-left">
                    <div id="tech-description">
                        <h3 class="text-2xl font-semibold text-blue-400 mb-4" id="tech-title">Laravel</h3>
                        <p class="text-gray-300" id="tech-text">Uma constelação de código elegante, orbitando a produtividade com sua estrutura robusta e fluida.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Nova Seção: Fundamentos do Cosmos da IA -->
    <section class="py-20 px-6 relative" id="ai-fundamentals">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12 text-center" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Fundamentos do Cosmos da IA
            </h2>
            <div class="space-y-8">
                <div class="academic-card" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-2">Aprendizado Supervisionado</h3>
                    <p class="text-gray-300">Como estrelas guiadas por constelações conhecidas, modelos aprendem a prever com base em dados rotulados, ajustando pesos em órbitas de erro mínimo.</p>
                </div>
                <div class="academic-card" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-semibold text-purple-400 mb-2">Redes Neurais & Deep Learning</h3>
                    <p class="text-gray-300">Camadas de neurônios formam galáxias de conhecimento, capturando padrões complexos através de backpropagation e ativações não-lineares.</p>
                </div>
                <div class="academic-card" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-2xl font-semibold text-yellow-400 mb-2">Transformers & Atenção</h3>
                    <p class="text-gray-300">A gravidade da IA moderna: mecanismos de atenção alinham contextos como órbitas planetárias, revolucionando NLP e visão computacional.</p>
                </div>
                <div class="academic-card" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-2xl font-semibold text-red-400 mb-2">Regularização e Otimização</h3>
                    <p class="text-gray-300">Evitar o colapso gravitacional do overfitting com técnicas como dropout e gradiente descendente, mantendo modelos em equilíbrio estelar.</p>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Nova Seção: Projetos Estelares -->
    <section class="py-20 px-6 relative" id="projects">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Projetos Estelares
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="orbital-card" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <h3 class="text-xl font-semibold text-blue-400 mb-2">Explorador de Dados</h3>
                        <p class="text-gray-300 text-sm">Uma ferramenta para visualizar constelações de dados com Python e IA.</p>
                    </div>
                </div>
                <div class="orbital-card" data-aos="zoom-in" data-aos-delay="200">
                    <div>
                        <h3 class="text-xl font-semibold text-purple-400 mb-2">Chatbot Cósmico</h3>
                        <p class="text-gray-300 text-sm">Um protótipo de IA conversacional inspirado no universo.</p>
                    </div>
                </div>
                <div class="orbital-card" data-aos="zoom-in" data-aos-delay="300">
                    <div>
                        <h3 class="text-xl font-semibold text-yellow-400 mb-2">Visão Estelar</h3>
                        <p class="text-gray-300 text-sm">Modelo de Deep Learning para classificar imagens astronômicas.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Sobre Mim -->
    <section class="py-20 px-6 relative" id="about">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Sobre o Criador
            </h2>
            <div class="glass-effect p-8 rounded-xl max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <p class="text-gray-300 mb-6">
                    Eu sou um estudante de Ciência de Dados, fascinado pelo universo e suas infinitas possibilidades. Minha jornada é guiada pela curiosidade cósmica e pela paixão por IA, onde mergulho nos fundamentos de Machine Learning e Deep Learning. Busco conectar dados, tecnologia e um toque de criatividade para explorar o desconhecido e construir soluções que iluminem o futuro.
                </p>
                <div class="flex justify-center space-x-6">
                    <a href="https://linkedin.com/in/seu-linkedin" target="_blank" class="orbital-card" data-aos="zoom-in" data-aos-delay="300">
                        <span class="text-blue-400 font-semibold">LinkedIn</span>
                    </a>
                    <a href="https://github.com/seu-github" target="_blank" class="orbital-card" data-aos="zoom-in" data-aos-delay="400">
                        <span class="text-purple-400 font-semibold">GitHub</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Minichat -->
    <div class="chat-toggle" onclick="toggleChat()">💬</div>
    <div class="chat-box" id="chat-box">
        <div class="chat-header">CapellaChat</div>
        <div class="chat-messages" id="chat-messages">
            <p>Bem-vindo ao CapellaChat! Como posso ajudar você hoje?</p>
        </div>
        <div class="chat-input">
            <input type="text" id="chat-input" placeholder="Digite sua mensagem..." onkeypress="if(event.key === 'Enter') sendMessage()">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-10 text-center text-gray-400">
        <p>© 2025 CapellaInfo. Onde a tecnologia encontra as estrelas.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // Efeito de gradiente dinâmico nos cards
        function updateGradient(event, card) {
            const rect = card.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            card.style.setProperty('--x', `${x}px`);
            card.style.setProperty('--y', `${y}px`);
        }
        function resetGradient(card) {
            card.style.setProperty('--x', '50%');
            card.style.setProperty('--y', '50%');
        }

        // Função para alternar descrições na seção de tecnologias
        const descriptions = {
            laravel: { title: 'Laravel', text: 'Uma constelação de código elegante, orbitando a produtividade com sua estrutura robusta e fluida.' },
            github: { title: 'GitHub', text: 'A galáxia colaborativa onde projetos nascem, evoluem e brilham sob controle estelar.' },
            javascript: { title: 'JavaScript', text: 'A força gravitacional da web, animando o cosmos digital com dinamismo e versatilidade.' },
            python: { title: 'Python', text: 'Uma supernova de simplicidade, iluminando desde automações até as profundezas da ciência de dados.' },
            ia: { title: 'IA (Dev & Data Science)', text: 'Estrelas gêmeas da inovação, unindo desenvolvimento e análise para explorar o universo do conhecimento.' }
        };

        function showDescription(tech) {
            const { title, text } = descriptions[tech];
            document.getElementById('tech-title').textContent = title;
            document.getElementById('tech-text').textContent = text;
            document.querySelectorAll('.tech-list li').forEach(li => li.classList.remove('active'));
            document.querySelector(`.tech-list li[onclick="showDescription('${tech}')"]`).classList.add('active');
        }

        // Funções do Minichat
        function toggleChat() {
            const chatBox = document.getElementById('chat-box');
            chatBox.classList.toggle('active');
        }

        function sendMessage() {
            const input = document.getElementById('chat-input');
            const messages = document.getElementById('chat-messages');
            const message = input.value.trim();
            if (message) {
                messages.innerHTML += `<p><strong>Você:</strong> ${message}</p>`;
                messages.scrollTop = messages.scrollHeight;
                setTimeout(() => {
                    messages.innerHTML += `<p><strong>CapellaBot:</strong> Em breve, responderei com IA estelar! Por enquanto, explore o site!</p>`;
                    messages.scrollTop = messages.scrollHeight;
                }, 1000);
                input.value = '';
            }
        }
    </script>
</body>
</html>