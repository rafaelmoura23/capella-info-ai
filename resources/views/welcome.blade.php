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
        .carousel-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .carousel-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .about-container {
            position: relative;
            overflow: hidden;
        }
        .about-galaxy {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.2), rgba(147, 51, 234, 0) 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: galaxy-spin 20s infinite linear;
            z-index: -1;
        }
        @keyframes galaxy-spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
        .about-text {
            animation: text-glow 2s infinite alternate;
        }
        @keyframes text-glow {
            0% { text-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
            100% { text-shadow: 0 0 15px rgba(147, 51, 234, 0.8); }
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

    <!-- Seção: Fundamentos do Cosmos da IA -->
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

    <!-- Seção: Projetos Estelares (Carrossel Interativo com Imagens) -->
    <section class="py-20 px-6 relative" id="projects" x-data="{ current: 0, projects: [
        { title: 'Explorador de Dados', desc: 'Visualização interativa de dados com IA e Python.', tags: ['IA', 'Python', 'Dados'], color: 'blue-400', img: 'https://cdn.pixabay.com/photo/2018/07/14/11/33/earth-3537401_1280.jpg', github: 'https://github.com/seu-github/explorador-de-dados' },
        { title: 'Chatbot Cósmico', desc: 'IA conversacional com tema astronômico.', tags: ['IA', 'NLP', 'Chat'], color: 'purple-400', img: 'https://cdn.pixabay.com/photo/2020/08/14/17/13/light-bulbs-5488573_1280.jpg', github: 'https://github.com/seu-github/chatbot-cosmico' },
        { title: 'Visão Estelar', desc: 'Deep Learning para classificar imagens astronômicas.', tags: ['Deep Learning', 'Visão', 'IA'], color: 'yellow-400', img: 'https://cdn.pixabay.com/photo/2016/10/11/21/43/geometric-1732847_1280.jpg', github: 'https://github.com/seu-github/visao-estelar' },
        { title: 'Fluxo Automático', desc: 'Automação de pipelines de dados em tempo real.', tags: ['Automação', 'Dados', 'Pipeline'], color: 'red-400', img: 'https://cdn.pixabay.com/photo/2020/02/03/00/12/fiber-4814456_1280.jpg', github: 'https://github.com/seu-github/fluxo-automatico' }
    ]}">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-12" style="font-family: 'Orbitron', sans-serif;" data-aos="fade-up">
                Projetos Estelares
            </h2>
            <div class="relative">
                <!-- Carrossel -->
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500" :style="'transform: translateX(-' + (current * 33.33) + '%)'">
                        <template x-for="(project, index) in projects" :key="index">
                            <div class="carousel-card glass-effect p-4 rounded-xl mx-2 w-1/3 flex-shrink-0" data-aos="fade-up" :data-aos-delay="index * 100">
                                <img :src="project.img" alt="Project Image" class="w-full h-32 object-cover rounded-t-lg">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold" :class="'text-' + project.color" x-text="project.title"></h3>
                                    <p class="text-sm text-gray-300 mt-1" x-text="project.desc"></p>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <template x-for="tag in project.tags" :key="tag">
                                            <span class="text-xs text-gray-400 bg-gray-800/50 px-2 py-1 rounded-full" x-text="tag"></span>
                                        </template>
                                    </div>
                                    <a :href="project.github" target="_blank" class="inline-block mt-3 text-gray-400 hover:text-purple-400 transition-colors">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- Controles -->
                <button @click="current = (current - 1 + projects.length) % projects.length" class="absolute left-0 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-400 transition-colors">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="current = (current + 1) % projects.length" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-400 transition-colors">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="section-connector" style="height: 200px; top: 100%; left: 50%; transform: translateX(-50%);"></div>
    </section>

    <!-- Seção: Sobre o Criador (Design Surpreendente) -->
    <section class="py-28 px-6 relative" id="about">
        <div class="max-w-4xl mx-auto text-center about-container">
            <div class="about-galaxy"></div>
            <h2 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-6 about-text" style="font-family: 'Orbitron', sans-serif;" data-aos="zoom-in" data-aos-duration="1000">
                Sobre o Criador
            </h2>
            <div class="glass-effect p-8 rounded-xl shadow-2xl relative z-10" data-aos="fade-up" data-aos-delay="200">
                <p class="text-lg text-gray-300 mb-6 leading-relaxed">
                    Um estudante de Ciência de Dados navegando pelo cosmos da tecnologia, com paixão por IA, Machine Learning e Deep Learning. Meu objetivo? Iluminar o desconhecido com soluções estelares.
                </p>
                <div class="flex justify-center space-x-8">
                    <a href="https://linkedin.com/in/seu-linkedin" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors transform hover:scale-110" data-aos="zoom-in" data-aos-delay="300">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.784-1.75-1.732s.784-1.732 1.75-1.732 1.75.784 1.75 1.732-.784 1.732-1.75 1.732zm13.5 12.268h-3v-5.604c0-1.337-.027-3.063-1.866-3.063-1.867 0-2.153 1.459-2.153 2.966v5.701h-3v-11h2.878v1.497h.041c.4-.755 1.378-1.551 2.836-1.551 3.03 0 3.584 1.995 3.584 4.589v6.465z"/>
                        </svg>
                    </a>
                    <a href="https://github.com/seu-github" target="_blank" class="text-gray-400 hover:text-purple-400 transition-colors transform hover:scale-110" data-aos="zoom-in" data-aos-delay="400">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
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