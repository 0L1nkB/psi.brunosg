<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceituação Cognitiva</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* Paleta Lúdica */
            --bg-color: #f0f8ff;
            --paper: #ffffff;
            --primary: #6c5ce7;
            --secondary: #00b894;
            --accent: #fdcb6e;
            --text: #2d3436;
            --ai-btn: #a29bfe;
            --box-border: #b2bec3;
            --shadow: rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(#dfe6e9 2px, transparent 2px);
            background-size: 20px 20px;
            margin: 0; padding: 20px; color: var(--text);
            display: flex; justify-content: center;
        }

        .container {
            width: 100%; max-width: 1000px;
            background: var(--paper); padding: 40px;
            border-radius: 25px; box-shadow: 10px 10px 0 var(--shadow);
            border: 3px solid var(--text); position: relative;
        }

        /* --- CABEÇALHO DE IMPRESSÃO (NOVO) --- */
        #print-header { display: none; } /* Escondido na tela normal */

        /* CONFIG IA */
        .ai-config { position: absolute; top: 20px; right: 20px; }
        .btn-config {
            background: #2d3436; color: white; border: none; padding: 8px 15px;
            border-radius: 20px; cursor: pointer; font-size: 0.9rem; font-family: inherit;
            display: flex; align-items: center; gap: 5px;
        }
        .status-dot { width: 10px; height: 10px; border-radius: 50%; background: #ff7675; }
        .status-dot.active { background: #55efc4; box-shadow: 0 0 8px #55efc4; }

        /* CABEÇALHO DA TELA */
        header.screen-header { text-align: center; margin-bottom: 40px; position: relative; }
        header.screen-header::before {
            content: ""; position: absolute; top: -55px; left: 50%; transform: translateX(-50%) rotate(-1deg);
            width: 350px; height: 50px; background-color: rgba(108, 92, 231, 0.8);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 { margin: 0; color: var(--primary); font-size: 2.2rem; text-transform: uppercase; }
        .subtitle { font-size: 1.1rem; color: #636e72; margin-top: 10px; }

        /* INPUTS */
        .input-wrapper { position: relative; width: 100%; }
        .btn-magic {
            position: absolute; bottom: 10px; right: 10px;
            background: var(--ai-btn); color: white; border: none;
            width: 35px; height: 35px; border-radius: 50%;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 3px 5px rgba(0,0,0,0.1); transition: 0.3s; opacity: 0.6;
        }
        .btn-magic:hover { opacity: 1; transform: scale(1.1) rotate(15deg); background: var(--primary); }
        .btn-magic.loading { animation: pulse 1s infinite; cursor: wait; background: #b2bec3; }
        @keyframes pulse { 0% {transform: scale(0.9);} 50% {transform: scale(1.1);} 100% {transform: scale(0.9);} }

        /* BOXES */
        .flow-section { margin-bottom: 30px; position: relative; }
        .box-container {
            background: #fff; border: 2px solid var(--primary); border-radius: 15px; padding: 20px;
            box-shadow: 5px 5px 0 rgba(0,0,0,0.05); position: relative;
        }
        .box-title {
            position: absolute; top: -15px; left: 20px;
            background: var(--secondary); color: white; padding: 5px 15px;
            border-radius: 20px; font-weight: bold; font-size: 0.9rem; text-transform: uppercase;
            box-shadow: 2px 2px 0 rgba(0,0,0,0.1);
        }
        .arrow-down { text-align: center; font-size: 2rem; color: var(--text); margin: 10px 0; opacity: 0.5; }
        textarea {
            width: 100%; border: none; background: transparent; font-family: inherit; font-size: 1rem;
            resize: vertical; outline: none; min-height: 90px; color: #2d3436;
            background-image: linear-gradient(#dfe6e9 1px, transparent 1px);
            background-size: 100% 30px; line-height: 30px; padding-bottom: 30px;
        }

        /* GRIDS */
        .beliefs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .post-it { background: #fffce0; padding: 15px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1); transform: rotate(-1deg); border: 1px solid #e6e6e6; }
        .post-it:nth-child(2) { transform: rotate(1deg); background: #e0f7fa; }
        .cycle-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-top: 15px; }
        .cycle-col { background: #f1f2f6; padding: 15px; border-radius: 10px; border: 1px dashed #ccc; }
        .cycle-col h4 { margin: 0 0 10px 0; color: var(--primary); font-size: 0.9rem; text-align: center; }

        .btn-action {
            display: block; width: 100%; margin-top: 30px; padding: 15px;
            background-color: var(--text); color: white; border: none; border-radius: 50px;
            font-size: 1.3rem; font-weight: bold; font-family: inherit; cursor: pointer;
            box-shadow: 0 6px 0 #000; transition: transform 0.1s;
        }
        .btn-action:hover { transform: translateY(-3px); }

        /* --- ESTILOS DE IMPRESSÃO --- */
        @media print {
            /* Esconde elementos interativos */
            .btn-magic, .ai-config, .btn-action, header.screen-header { display: none !important; }
            
            /* Remove estilos de "container" da tela (sombras, bordas) */
            body { background: white; margin: 0; padding: 0; }
            .container { box-shadow: none; border: none; width: 100%; max-width: 100%; padding: 0; margin: 0; }

            /* Mostra e estiliza o Cabeçalho Profissional */
            #print-header {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 2px solid #2d3436;
                font-family: 'Arial', sans-serif; /* Fonte mais séria para o cabeçalho */
                color: #2d3436;
            }

            .ph-logo img {
                height: 80px; /* Ajuste o tamanho da logo aqui */
                width: auto;
            }

            .ph-info h2 {
                margin: 0; font-size: 1rem; font-weight: normal; color: #555;
            }
            .ph-info h1 {
                margin: 0; font-size: 1.8rem; font-weight: 800; color: #2d3436;
                text-transform: none; /* Reseta o uppercase do tema */
            }
            .ph-details {
                margin-top: 10px;
                font-size: 0.85rem;
                line-height: 1.4;
            }
            .ph-details strong { display: block; font-size: 0.95rem; margin-bottom: 2px; }

            /* Ajustes para economizar tinta e ficar sóbrio */
            .box-container { border: 1px solid #000; box-shadow: none; }
            .box-title { border: 1px solid #000; color: #000; background: #fff; top: -10px; box-shadow: none; }
            .post-it { background: #fff; border: 1px solid #ccc; transform: none !important; box-shadow: none; }
            .cycle-col { background: #fff; border: 1px solid #ccc; }
            textarea { color: #000; }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="ai-config">
            <button class="btn-config" onclick="configureKey()">
                <div class="status-dot" id="status-dot"></div>
                Configurar IA
            </button>
        </div>

        <div id="print-header">
            <div class="ph-logo">
                <img src="../../img/logo.png" alt="Logo BS"> 
            </div>
            <div class="ph-info">
                <h2>Psicólogo Clínico</h2>
                <h1>Bruno de Souza</h1>
                <div class="ph-details">
                    <strong>Psicoterapia Cognitivo Comportamental</strong>
                    R. Félix Xavier da Cunha, 705 - Sala 402, Pelotas, RS<br>
                    (53) 9 91898309<br>
                    @psi.brunosg | https://psibrunosg.github.io/site/
                </div>
            </div>
        </div>

        <header class="screen-header">
            <h1>Conceituação Cognitiva</h1>
            <p class="subtitle">O mapa para entender como sua mente funciona.</p>
        </header>

        <div class="flow-section">
            <div class="box-container">
                <div class="box-title">1. Raízes (História de Vida)</div>
                <div class="input-wrapper">
                    <textarea id="txt-historia" placeholder="Quais experiências marcantes da infância contribuíram? (Ex: Bullying, críticas, falta de afeto...)"></textarea>
                    <button class="btn-magic" onclick="improveText('txt-historia')" title="Reescrever com IA"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                </div>
            </div>
            <div class="arrow-down"><i class="fa-solid fa-arrow-down"></i></div>
        </div>

        <div class="flow-section">
            <div class="box-container" style="border-color: var(--accent);">
                <div class="box-title" style="background: var(--accent); color: var(--text);">2. Crenças Centrais</div>
                <div class="beliefs-grid">
                    <div class="post-it">
                        <strong>Sobre Mim Mesmo:</strong>
                        <div class="input-wrapper">
                            <textarea id="txt-crencas-eu" placeholder="Ex: Eu sou inadequado / fraco..."></textarea>
                            <button class="btn-magic" onclick="improveText('txt-crencas-eu')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                        </div>
                    </div>
                    <div class="post-it">
                        <strong>Sobre os Outros/Mundo:</strong>
                        <div class="input-wrapper">
                            <textarea id="txt-crencas-mundo" placeholder="Ex: O mundo é perigoso..."></textarea>
                            <button class="btn-magic" onclick="improveText('txt-crencas-mundo')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arrow-down"><i class="fa-solid fa-arrow-down"></i></div>
        </div>

        <div class="flow-section">
            <div class="box-container">
                <div class="box-title">3. Regras e Suposições</div>
                <div class="input-wrapper">
                    <textarea id="txt-regras" placeholder="Se eu... então... (Ex: Se eu não for perfeito, serei rejeitado)."></textarea>
                    <button class="btn-magic" onclick="improveText('txt-regras')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                </div>
            </div>
            <div class="arrow-down"><i class="fa-solid fa-arrow-down"></i></div>
        </div>

        <div class="flow-section">
            <div class="box-container">
                <div class="box-title">4. Estratégias Compensatórias</div>
                <div class="input-wrapper">
                    <textarea id="txt-estrategias" placeholder="O que eu faço para lidar com isso? (Ex: Evito desafios, tento agradar a todos...)"></textarea>
                    <button class="btn-magic" onclick="improveText('txt-estrategias')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                </div>
            </div>
            <div class="arrow-down"><i class="fa-solid fa-arrow-down"></i></div>
        </div>

        <div class="flow-section">
            <div class="box-container" style="border-color: var(--secondary);">
                <div class="box-title" style="background: var(--secondary);">5. O Ciclo Atual</div>
                
                <div style="margin-bottom: 15px;">
                    <strong>Situação Gatilho:</strong>
                    <div class="input-wrapper">
                        <textarea id="txt-gatilho" placeholder="O que aconteceu recentemente?" style="min-height: 50px;"></textarea>
                        <button class="btn-magic" onclick="improveText('txt-gatilho')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                    </div>
                </div>

                <div class="cycle-grid">
                    <div class="cycle-col">
                        <h4>💭 Pensamentos</h4>
                        <div class="input-wrapper">
                            <textarea id="txt-pensamentos" placeholder="O que pensei?"></textarea>
                            <button class="btn-magic" onclick="improveText('txt-pensamentos')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                        </div>
                    </div>
                    <div class="cycle-col">
                        <h4>❤️ Emoções</h4>
                        <div class="input-wrapper">
                            <textarea id="txt-emocoes" placeholder="O que senti?"></textarea>
                            <button class="btn-magic" onclick="improveText('txt-emocoes')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                        </div>
                    </div>
                    <div class="cycle-col">
                        <h4>🏃 Comportamento</h4>
                        <div class="input-wrapper">
                            <textarea id="txt-comportamento" placeholder="O que fiz?"></textarea>
                            <button class="btn-magic" onclick="improveText('txt-comportamento')"><i class="fa-solid fa-wand-magic-sparkles"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn-action" onclick="window.print()">
            <i class="fa-solid fa-print"></i> IMPRIMIR RELATÓRIO
        </button>
    </div>

    <script>
        // --- LÓGICA DA IA (GEMINI) ---
        if (localStorage.getItem('gemini_api_key')) {
            document.getElementById('status-dot').classList.add('active');
        }

        function configureKey() {
            const key = prompt("Cole sua API Key do Google Gemini aqui:\n(Ela será salva no seu navegador)");
            if (key) {
                localStorage.setItem('gemini_api_key', key.trim());
                document.getElementById('status-dot').classList.add('active');
                alert("Chave salva! Agora a varinha mágica vai funcionar.");
            }
        }

        async function improveText(elementId) {
            const textarea = document.getElementById(elementId);
            const originalText = textarea.value;
            const apiKey = localStorage.getItem('gemini_api_key');
            const btn = textarea.nextElementSibling;

            if (!originalText) { alert("Escreva algo primeiro!"); return; }
            if (!apiKey) { alert("Configure a IA primeiro no botão do topo!"); configureKey(); return; }

            const originalContent = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
            btn.classList.add('loading');

            const prompt = `
                Atue como um psicólogo clínico experiente em TCC.
                Melhore o seguinte texto para um prontuário clínico (linguagem técnica, objetiva e clara):
                "${originalText}"
            `;

            try {
                const response = await fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${apiKey}`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ contents: [{ parts: [{ text: prompt }] }] })
                });

                const data = await response.json();
                if (data.error) throw new Error(data.error.message);

                textarea.value = data.candidates[0].content.parts[0].text.trim();

            } catch (error) {
                alert("Erro na IA: " + error.message);
            } finally {
                btn.innerHTML = originalContent;
                btn.classList.remove('loading');
            }
        }
    </script>

</body>
</html>
