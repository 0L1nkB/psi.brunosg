<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreador de Gatilhos | Terapia do Esquema</title>
    
    <script>
        if(localStorage.getItem('logado') !== 'sim') {
            window.location.href = "../../login.html";
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* --- RESET & BASES --- */
        * { box-sizing: border-box; }

        :root {
            --bg-color: #fdfbf7;
            --trigger-color: #e17055; /* Laranja queimado (Esquema ativo) */
            --action-color: #00b894;  /* Verde (Adulto Saudável) */
            --neutral: #636e72;
            --text: #2d3436;
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(#dcdde1 1px, transparent 1px);
            background-size: 20px 20px;
            margin: 0; padding: 20px;
            color: var(--text);
            min-height: 100vh;
            display: flex; flex-direction: column; align-items: center;
        }

        /* --- HEADER --- */
        header {
            text-align: center; margin-bottom: 30px;
            background: white; padding: 25px 40px;
            border-radius: 20px; border-top: 6px solid var(--trigger-color);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            max-width: 900px; width: 100%; position: relative;
        }

        header h1 { color: var(--trigger-color); margin: 0; font-weight: 800; font-size: 1.8rem; letter-spacing: 1px; }
        .subtitle { color: var(--neutral); font-weight: 600; margin-top: 5px; font-size: 1rem; }

        .btn-print {
            position: absolute; top: 25px; right: 30px;
            background: transparent; border: 2px solid var(--trigger-color); color: var(--trigger-color);
            padding: 8px 20px; border-radius: 30px; font-weight: 700; cursor: pointer; transition: 0.3s;
        }
        .btn-print:hover { background: var(--trigger-color); color: white; }

        /* --- SCHEMA DEFINITION --- */
        .schema-selector {
            width: 100%; max-width: 900px; background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03); margin-bottom: 20px; display: flex; align-items: center; gap: 15px;
        }
        .schema-selector input {
            border: none; border-bottom: 2px solid #ccc; font-size: 1.2rem; font-weight: 700; color: var(--text);
            flex: 1; outline: none; transition: 0.3s; padding: 5px; background: transparent;
        }
        .schema-selector input:focus { border-color: var(--trigger-color); }

        /* --- INPUT PANEL --- */
        .input-panel {
            width: 100%; max-width: 900px;
            background: white; padding: 30px; border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 40px;
            border: 1px solid #eee; position: relative; overflow: hidden;
        }
        
        /* Faixa decorativa */
        .input-panel::before {
            content: ''; position: absolute; top: 0; left: 0; width: 6px; height: 100%;
            background: linear-gradient(to bottom, var(--trigger-color), var(--action-color));
        }

        .input-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 20px;
        }

        .input-group { display: flex; flex-direction: column; gap: 8px; }
        label { font-weight: 800; color: var(--neutral); font-size: 0.9rem; display: flex; align-items: center; gap: 8px; }

        textarea, input[type="text"] {
            width: 100%; padding: 15px; border: 2px solid #dfe6e9; border-radius: 12px;
            font-family: inherit; font-size: 1rem; transition: 0.3s; background: #fdfdfd; outline: none;
            resize: vertical;
        }
        textarea:focus { border-color: var(--trigger-color); background: white; }
        
        /* Specific borders for context */
        #actionInput:focus { border-color: var(--action-color); }

        .btn-add {
            width: 100%; padding: 15px; border-radius: 50px; border: none;
            background: linear-gradient(45deg, var(--trigger-color), #fab1a0);
            color: white; font-weight: 800; font-size: 1.1rem;
            cursor: pointer; transition: 0.3s; display: flex; justify-content: center; align-items: center; gap: 10px;
        }
        .btn-add:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(225, 112, 85, 0.3); }

        /* --- LISTA DE CARDS --- */
        .trigger-list {
            width: 100%; max-width: 900px; display: flex; flex-direction: column; gap: 20px; margin-bottom: 50px;
        }

        .trigger-card {
            background: white; border-radius: 20px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #eee;
            display: grid; grid-template-columns: 40px 1fr 1fr; /* Icon | Contexto | Ação */
            animation: slideUp 0.4s ease;
        }

        .card-icon-col {
            background: #f1f2f6; display: flex; align-items: center; justify-content: center;
            color: var(--neutral); font-size: 1.2rem; border-right: 1px solid #eee;
        }

        .card-content-col { padding: 20px; display: flex; flex-direction: column; justify-content: center; }
        
        .card-trigger-section { border-right: 1px dashed #ddd; position: relative; }
        .card-action-section { background: #f0fdf4; position: relative; }

        .card-label { font-size: 0.75rem; text-transform: uppercase; font-weight: 800; margin-bottom: 8px; display: block; opacity: 0.7; }
        .card-text { font-size: 1rem; line-height: 1.5; font-weight: 600; }

        .trigger-tag { color: var(--trigger-color); }
        .action-tag { color: var(--action-color); }

        .btn-delete {
            position: absolute; top: 10px; right: 10px; background: none; border: none;
            color: #fab1a0; cursor: pointer; transition: 0.2s;
        }
        .btn-delete:hover { color: var(--trigger-color); transform: scale(1.1); }

        /* --- IMPRESSÃO --- */
        #print-header { display: none; }
        #print-table { display: none; }

        @media (max-width: 768px) {
            .input-grid { grid-template-columns: 1fr; }
            .trigger-card { grid-template-columns: 1fr; }
            .card-trigger-section { border-right: none; border-bottom: 1px dashed #ddd; }
            .card-icon-col { display: none; }
            .btn-print span { display: none; }
        }

        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        @media print {
            body { background: white; padding: 0; }
            header button, .input-panel, .btn-back-home, .trigger-list, .schema-selector { display: none !important; }
            header { border: none; box-shadow: none; margin-bottom: 10px; padding: 0; }
            
            #print-header { display: block; margin-bottom: 20px; font-family: sans-serif; font-size: 1.5rem; font-weight: bold; color: #000; }
            
            #print-table {
                display: table; width: 100%; border-collapse: collapse; font-family: sans-serif; margin-top: 10px;
            }
            #print-table th { background: #eee; padding: 10px; border: 1px solid #000; font-weight: bold; font-size: 0.9rem; text-align: left; }
            #print-table td { padding: 10px; border: 1px solid #000; vertical-align: top; font-size: 0.9rem; }
        }
    </style>
</head>
<body>

    <header data-aos="fade-down">
        <button class="btn-print" onclick="preparePrint()"><i class="fa-solid fa-print"></i> <span>Imprimir Tabela</span></button>
        <h1>Rastreador de Gatilhos</h1>
        <div class="subtitle">Anexo 1: Mapeando situações e respostas saudáveis</div>
    </header>

    <div class="schema-selector" data-aos="fade-up">
        <i class="fa-solid fa-fingerprint" style="color:var(--trigger-color); font-size:1.5rem;"></i>
        <div style="flex:1">
            <label style="margin-bottom:0; font-size:0.8rem;">ESQUEMA MONITORADO:</label>
            <input type="text" id="schemaInput" value="Abandono / Instabilidade" placeholder="Digite o nome do esquema...">
        </div>
    </div>

    <div class="input-panel" data-aos="fade-up">
        
        <div class="input-group" style="margin-bottom:20px;">
            <label><i class="fa-solid fa-location-dot"></i> A Situação (Contexto)</label>
            <input type="text" id="situationInput" placeholder="Ex: Meu parceiro saiu para trabalhar e não mandou mensagem.">
        </div>

        <div class="input-grid">
            <div class="input-group">
                <label style="color:var(--trigger-color)"><i class="fa-solid fa-bomb"></i> O Gatilho Específico</label>
                <textarea id="triggerInput" placeholder="O que ativou o esquema? (Ex: A demora em responder, o silêncio...)"></textarea>
            </div>
            <div class="input-group">
                <label style="color:var(--action-color)"><i class="fa-solid fa-shield-halved"></i> O que fazer (Ação Saudável)</label>
                <textarea id="actionInput" placeholder="Como o Adulto Saudável lidaria com isso? (Ex: Lembrar que ele está ocupado, focar no meu trabalho...)"></textarea>
            </div>
        </div>

        <button class="btn-add" onclick="addCard()">
            <i class="fa-solid fa-plus-circle"></i> Adicionar ao Mapa
        </button>
    </div>

    <div class="trigger-list" id="triggerList">
        </div>

    <div id="print-header">
        Gatilhos que ativam meu esquema de: <span id="printSchemaName"></span>
    </div>
    <table id="print-table">
        <thead>
            <tr>
                <th width="35%">Situações (Contexto)</th>
                <th width="30%">Gatilhos Presentes</th>
                <th width="35%">O que fazer (Plano de Ação)</th>
            </tr>
        </thead>
        <tbody id="printBody"></tbody>
    </table>

    <center>
        <a href="../listaferramentas.html" style="display:inline-block; margin-top:20px; color:#b2bec3; text-decoration:none; font-weight:600;" class="btn-back-home">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </center>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function addCard() {
            const situation = document.getElementById('situationInput').value.trim();
            const trigger = document.getElementById('triggerInput').value.trim();
            const action = document.getElementById('actionInput').value.trim();

            if (!situation || !trigger) {
                alert("Por favor, preencha pelo menos a Situação e o Gatilho.");
                return;
            }

            const list = document.getElementById('triggerList');
            const card = document.createElement('div');
            card.className = 'trigger-card';

            card.innerHTML = `
                <div class="card-icon-col">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="card-content-col card-trigger-section">
                    <span class="card-label"><i class="fa-solid fa-map-pin"></i> Situação</span>
                    <div class="card-text" style="margin-bottom:15px;">${situation}</div>
                    
                    <span class="card-label trigger-tag"><i class="fa-solid fa-bolt"></i> Gatilho</span>
                    <div class="card-text trigger-tag">${trigger}</div>
                </div>
                <div class="card-content-col card-action-section">
                    <button class="btn-delete" onclick="deleteCard(this)"><i class="fa-solid fa-xmark"></i></button>
                    <span class="card-label action-tag"><i class="fa-solid fa-user-shield"></i> Adulto Saudável (Ação)</span>
                    <div class="card-text" style="color:#2d3436;">${action || "---"}</div>
                </div>
            `;

            list.prepend(card);

            // Limpa campos
            document.getElementById('situationInput').value = '';
            document.getElementById('triggerInput').value = '';
            document.getElementById('actionInput').value = '';
        }

        function deleteCard(btn) {
            if(confirm("Remover este gatilho da lista?")) {
                btn.closest('.trigger-card').remove();
            }
        }

        function preparePrint() {
            const tbody = document.getElementById('printBody');
            tbody.innerHTML = '';
            
            // Atualiza Título
            document.getElementById('printSchemaName').innerText = document.getElementById('schemaInput').value;

            const cards = document.querySelectorAll('.trigger-card');
            
            if(cards.length === 0) {
                alert("Adicione pelo menos um item para imprimir.");
                return;
            }

            cards.forEach(card => {
                // Extração dos dados do card HTML para a tabela
                const situation = card.querySelector('.card-trigger-section .card-text:first-of-type').innerText;
                const trigger = card.querySelector('.card-trigger-section .trigger-tag.card-text').innerText;
                const action = card.querySelector('.card-action-section .card-text').innerText;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${situation}</td>
                    <td>${trigger}</td>
                    <td>${action}</td>
                `;
                tbody.appendChild(tr);
            });

            window.print();
        }
    </script>

</body>
</html>
