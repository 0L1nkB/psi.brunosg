<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceituação Cognitiva + IA | Caderno Incrível</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #f0f8ff;
            --paper: #ffffff;
            --primary: #6c5ce7;
            --secondary: #00b894;
            --accent: #fdcb6e;
            --text: #2d3436;
            --ai-color: #a29bfe; /* Cor da IA */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            margin: 0; padding: 20px; color: var(--text);
            display: flex; justify-content: center;
        }

        .container {
            width: 100%; max-width: 1000px;
            background: var(--paper); padding: 40px;
            border-radius: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            position: relative;
        }

        /* CONFIGURAÇÃO DA IA */
        .ai-settings {
            position: absolute; top: 20px; right: 20px;
        }
        .btn-config {
            background: #333; color: white; border: none; padding: 8px 15px;
            border-radius: 20px; cursor: pointer; font-size: 0.8rem;
            display: flex; align-items: center; gap: 5px; transition: 0.2s;
        }
        .btn-config:hover { background: #555; }
        .key-status { width: 10px; height: 10px; border-radius: 50%; background: #ff7675; display: inline-block; }
        .key-status.active { background: #55efc4; box-shadow: 0 0 5px #55efc4; }

        header { text-align: center; margin-bottom: 40px; }
        h1 { color: var(--primary); margin: 0; }

        /* CAIXAS DE TEXTO COM IA */
        .input-wrapper { position: relative; margin-top: 10px; }
        
        textarea {
            width: 100%; min-height: 100px; padding: 15px;
            border: 2px solid #dfe6e9; border-radius: 10px;
            font-family: inherit; font-size: 1rem; line-height: 1.5;
            resize: vertical; transition: 0.3s; background: #fdfdfd;
            box-sizing: border-box;
        }
        textarea:focus { border-color: var(--primary); outline: none; background: #fff; }

        /* BOTÃO MÁGICO */
        .btn-magic {
            position: absolute; bottom: 10px; right: 10px;
            background: var(--ai-color); color: white;
            border: none; width: 35px; height: 35px; border-radius: 50%;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;
            opacity: 0.7;
        }
        .btn-magic:hover { opacity: 1; transform: scale(1.1) rotate(10deg); background: var(--primary); }
        .btn-magic.loading { animation: pulse 1s infinite; cursor: wait; background: #b2bec3; }

        @keyframes pulse { 0% { transform: scale(0.9); } 50% { transform: scale(1.1); } 100% { transform: scale(0.9); } }

        /* SEÇÕES */
        .section-box {
            background: #fff; border: 1px solid #e0e0e0; border-radius: 15px;
            padding: 25px; margin-bottom: 25px; border-left: 5px solid var(--primary);
        }
        .box-title { font-weight: 800; color: var(--primary); text-transform: uppercase; margin-bottom: 10px; font-size: 0.9rem; letter-spacing: 1px; }

        /* IMPRESSÃO */
        @media print {
            .btn-magic, .ai-settings, .btn-action { display: none !important; }
            body { background: white; padding: 0; }
            .container { box-shadow: none; border: none; }
            textarea { border: 1px solid #ccc; }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="ai-settings">
            <button class="btn-config" onclick="configureKey()">
                <span id="status-dot" class="key-status"></span>
                <i class="fa-solid fa-key"></i> Configurar IA
            </button>
        </div>

        <header>
            <h1><i class="fa-solid fa-brain"></i> Conceituação Clínica</h1>
            <p style="color:#666;">Preencha os campos e use a <strong>Varinha Mágica</strong> para reescrever profissionalmente.</p>
        </header>

        <div class="section-box">
            <div class="box-title">1. História de Vida Relevante</div>
            <div class="input-wrapper">
                <textarea id="txt-historia" placeholder="Digite de forma coloquial (ex: 'O pai dele bebia muito e gritava')..."></textarea>
                <button class="btn-magic" onclick="improveText('txt-historia')" title="Reescrever profissionalmente">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
            </div>
        </div>

        <div class="section-box" style="border-color: var(--secondary);">
            <div class="box-title" style="color: var(--secondary);">2. Crenças Centrais (Eu / Outros)</div>
            <div class="input-wrapper">
                <textarea id="txt-crencas" placeholder="Ex: Ele se acha burro e acha que ninguém liga pra ele..."></textarea>
                <button class="btn-magic" onclick="improveText('txt-crencas')">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
            </div>
        </div>

        <div class="section-box" style="border-color: var(--accent);">
            <div class="box-title" style="color: #d35400;">3. Estratégias Compensatórias</div>
            <div class="input-wrapper">
                <textarea id="txt-estrategias" placeholder="Ex: Ele evita falar em público pra não passar vergonha..."></textarea>
                <button class="btn-magic" onclick="improveText('txt-estrategias')">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
            </div>
        </div>

        <div class="section-box">
            <div class="box-title">4. Ciclo de Manutenção Atual</div>
            <div class="input-wrapper">
                <textarea id="txt-ciclo" placeholder="Descreva o gatilho, pensamento e reação..."></textarea>
                <button class="btn-magic" onclick="improveText('txt-ciclo')">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </button>
            </div>
        </div>

        <button class="btn-config" style="background: var(--text); width: 100%; justify-content: center; padding: 15px; font-size: 1.2rem;" onclick="window.print()">
            <i class="fa-solid fa-print"></i> IMPRIMIR RELATÓRIO
        </button>
    </div>

    <script>
        // --- LÓGICA DA IA (GEMINI) ---
        
        // 1. Verificar se já tem chave salva
        const savedKey = localStorage.getItem('gemini_api_key');
        if (savedKey) {
            document.getElementById('status-dot').classList.add('active');
        }

        // 2. Função para Configurar a Chave
        function configureKey() {
            const key = prompt("Insira sua API Key do Google Gemini:\n(Ela será salva apenas no seu navegador)");
            if (key) {
                localStorage.setItem('gemini_api_key', key.trim());
                document.getElementById('status-dot').classList.add('active');
                alert("Chave salva com sucesso! Agora você pode usar a varinha mágica.");
            }
        }

        // 3. Função Principal: Melhorar Texto
        async function improveText(elementId) {
            const textarea = document.getElementById(elementId);
            const originalText = textarea.value;
            const apiKey = localStorage.getItem('gemini_api_key');
            const btn = document.querySelector(`button[onclick="improveText('${elementId}')"]`);

            // Validações
            if (!originalText) { alert("Escreva algo primeiro!"); return; }
            if (!apiKey) { 
                alert("Você precisa configurar a chave da IA primeiro. Clique no botão 'Configurar IA' no topo.");
                configureKey();
                return;
            }

            // UI Loading
            const originalIcon = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
            btn.classList.add('loading');

            // Prompt para a IA (O "Segredo" do comando)
            const prompt = `
                Atue como um psicólogo especialista em TCC (Terapia Cognitivo-Comportamental).
                Reescreva o texto abaixo para uma linguagem CLÍNICA, PROFISSIONAL e OBJETIVA, adequada para um prontuário ou formulação de caso.
                Mantenha o sentido original, mas melhore a gramática e o tom. Seja conciso.
                
                Texto original: "${originalText}"
            `;

            try {
                // Chamada à API do Gemini (Google)
                const response = await fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${apiKey}`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: prompt }] }]
                    })
                });

                const data = await response.json();

                if (data.error) {
                    throw new Error(data.error.message);
                }

                // Extrair resposta
                const newText = data.candidates[0].content.parts[0].text;
                
                // Atualizar o campo
                textarea.value = newText.trim();

            } catch (error) {
                console.error(error);
                alert("Erro ao conectar com a IA: " + error.message);
            } finally {
                // Restaurar botão
                btn.innerHTML = originalIcon;
                btn.classList.remove('loading');
            }
        }
    </script>

</body>
</html>
