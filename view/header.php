<?php
// Define valores padrão para evitar erros se você esquecer de definir as variáveis
if (!isset($titulo)) $titulo = "Ferramenta TCC";
if (!isset($subtitulo)) $subtitulo = "Exercício Terapêutico";
// Define o caminho para a home (ajuste conforme sua estrutura de pastas)
// Se estiver usando caminhos relativos profundos, talvez precise ajustar aqui.
// Por padrão, estou assumindo que voltamos para a raiz das ferramentas.
if (!isset($link_home)) $link_home = "../../../listaferramentas.html"; 
?>

<style>
    /* CSS Específico do Header de Navegação */
    .nav-header {
        width: 100%;
        max-width: 900px;
        margin-bottom: 30px;
        /* Design System */
        background: var(--bg-card, #ffffff);
        border-radius: var(--border-radius, 20px);
        box-shadow: var(--shadow-soft, 0 10px 30px rgba(0,0,0,0.05));
        border-bottom: 5px solid var(--primary-color, #6c5ce7);
        padding: 15px 20px;
        
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    /* Área de Títulos (Centro) */
    .header-titles {
        text-align: center;
        flex: 1; /* Ocupa o espaço central */
    }
    
    .header-titles h1 {
        color: var(--primary-color, #6c5ce7);
        margin: 0;
        font-weight: 800;
        font-size: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .header-titles .subtitle {
        color: var(--text-muted, #636e72);
        font-weight: 600;
        margin-top: 5px;
        font-size: 0.9rem;
    }

    /* Botões de Ação (Laterais) */
    .nav-btn {
        background: transparent;
        border: none;
        color: var(--text-muted, #636e72);
        font-size: 1.2rem;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        text-decoration: none; /* Para links <a> */
    }

    .nav-btn:hover {
        background-color: #f1f2f6;
        color: var(--primary-color, #6c5ce7);
        transform: translateY(-2px);
    }

    /* Mobile: Ajustes */
    @media (max-width: 600px) {
        .header-titles h1 { font-size: 1.1rem; }
        .header-titles .subtitle { font-size: 0.75rem; }
        .nav-btn { width: 35px; height: 35px; font-size: 1rem; }
    }

    /* Impressão: Esconde botões, mantém título */
    @media print {
        .nav-btn { display: none !important; }
        .nav-header { 
            border: none; 
            box-shadow: none; 
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
        }
    }
</style>

<header class="nav-header" data-aos="fade-down">
    <button class="nav-btn" onclick="history.back()" title="Voltar">
        <i class="fa-solid fa-arrow-left"></i>
    </button>

    <div class="header-titles">
        <h1><?php echo $titulo; ?></h1>
        <div class="subtitle"><?php echo $subtitulo; ?></div>
    </div>

    <div style="display:flex; gap:5px;">
        <button class="nav-btn" onclick="window.print()" title="Imprimir">
            <i class="fa-solid fa-print"></i>
        </button>
        
        <a href="<?php echo $link_home; ?>" class="nav-btn" title="Lista de Ferramentas">
            <i class="fa-solid fa-house"></i>
        </a>
    </div>
</header>
