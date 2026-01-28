(function() {
    // 1. DETECTAR CAMINHO DA LOGO
    // Tenta descobrir onde está a pasta 'assets' baseando-se no script 'layout.js' ou 'print.js'
    // Se não achar, assume um padrão de 3 níveis de profundidade (../../assets)
    function getAssetsPath() {
        const scripts = document.getElementsByTagName('script');
        for (let script of scripts) {
            if (script.src.includes('assets/')) {
                return script.src.split('assets/')[0] + 'assets/';
            }
        }
        return '../../assets/'; // Fallback
    }

    const assetsPath = getAssetsPath();
    const logoPath = assetsPath + 'logo.png'; // Certifique-se que a logo se chama 'logo.png'

    // 2. CONTEÚDO DO CABEÇALHO (HTML)
    const printHeaderHTML = `
        <div id="print-header-overlay">
            <div class="ph-logo">
                <img src="${logoPath}" alt="Logo Profissional" onerror="this.style.display='none'">
            </div>
            <div class="ph-info">
                <h2>Psicólogo Clínico</h2>
                <h1>Bruno de Souza</h1>
                <div class="ph-details">
                    <strong>Psicoterapia Cognitivo Comportamental & Esquema</strong><br>
                    R. Félix Xavier da Cunha, 705 - Sala 402, Pelotas, RS<br>
                    (53) 9 91898309 • @psi.brunosg
                </div>
            </div>
        </div>
    `;

    // 3. ESTILOS DE IMPRESSÃO (CSS)
    const printStyles = `
        <style>
            /* Esconde o cabeçalho na tela normal */
            #print-header-overlay { display: none; }

            @media print {
                /* RESET BÁSICO */
                @page { margin: 0; size: auto; }
                body { 
                    background: white; 
                    margin: 1.5cm; /* Margem física do papel */
                    padding: 0;
                    -webkit-print-color-adjust: exact; 
                    print-color-adjust: exact;
                }

            

                /* AJUSTE DE CONTAINERS */
                .container, #main-content, #dashboard-view { 
                    width: 100% !important; 
                    max-width: 100% !important; 
                    box-shadow: none !important; 
                    border: none !important; 
                    padding: 0 !important; 
                    margin: 0 !important;
                    overflow: visible !important;
                }

                /* ESTILO DO CABEÇALHO INJETADO */
                #print-header-overlay {
                    display: flex !important;
                    align-items: center;
                    gap: 20px;
                    margin-bottom: 30px;
                    padding-bottom: 20px;
                    border-bottom: 2px solid #2d3436;
                    font-family: 'Arial', sans-serif;
                    color: #2d3436;
                    width: 100%;
                }

                .ph-logo img { height: 75px; width: auto; }
                
                .ph-info h2 { margin: 0; font-size: 1rem; font-weight: 400; color: #555; text-transform: none; }
                .ph-info h1 { margin: 0; font-size: 1.8rem; font-weight: 800; color: #2d3436; text-transform: none; }
                
                .ph-details { margin-top: 8px; font-size: 0.85rem; line-height: 1.4; }
                .ph-details strong { font-weight: 700; }

                /* LIMPEZA DE INPUTS E TEXTAREAS */
                textarea, input[type="text"], input[type="date"] {
                    border: none !important;
                    border-bottom: 1px solid #ccc !important;
                    resize: none !important;
                    padding: 5px 0 !important;
                    background: transparent !important;
                    box-shadow: none !important;
                }

                /* CARDS E BORDAS */
                .form-section, .result-card, .box-container {
                    box-shadow: none !important;
                    border: 1px solid #ccc !important;
                    break-inside: avoid;
                }
            }
        </style>
    `;

    // 4. INJETAR NO DOM AO CARREGAR
    document.addEventListener('DOMContentLoaded', () => {
        // Injeta CSS no Head
        document.head.insertAdjacentHTML('beforeend', printStyles);
        
        // Injeta HTML no topo do Body
        document.body.insertAdjacentHTML('afterbegin', printHeaderHTML);
    });

})();
