// Função para carregar o Header
function carregarHeader(titulo, subtitulo) {
    const headerHTML = `
    <header class="app-header" data-aos="fade-down">
        <button class="btn-print-header" onclick="history.back()" style="left: 30px; right: auto;" title="Voltar">
            <i class="fa-solid fa-arrow-left"></i>
        </button>

        <button class="btn-print-header" onclick="window.print()" title="Imprimir">
            <i class="fa-solid fa-print"></i> <span>Imprimir</span>
        </button>
        
        <h1>${titulo}</h1>
        <div class="subtitle">${subtitulo}</div>
    </header>
    `;
    
    // Injeta no início do body
    document.body.insertAdjacentHTML('afterbegin', headerHTML);
}

// Função para carregar o Footer
function carregarFooter() {
    const anoAtual = new Date().getFullYear();
    
    const footerHTML = `
    <style>
        .app-footer { width: 100%; padding: 20px 0; margin-top: auto; font-family: 'Quicksand', sans-serif; }
        .footer-content { max-width: 900px; margin: 0 auto; background-color: #ffffff; border: 2px dashed #b2bec3; border-radius: 50px; padding: 15px 35px; display: flex; justify-content: space-between; align-items: center; color: #636e72; box-shadow: 0 5px 15px rgba(0,0,0,0.02); }
        .footer-left { font-weight: 600; font-size: 0.95rem; display: flex; align-items: center; gap: 5px; }
        .heart-icon { color: #e17055; animation: heartbeat 1.5s infinite; }
        .footer-right { display: flex; gap: 15px; }
        .social-link { color: #b2bec3; font-size: 1.2rem; transition: transform 0.2s, color 0.2s; text-decoration: none; }
        .social-link:hover { transform: translateY(-2px); color: var(--primary-color); }
        @keyframes heartbeat { 0% { transform: scale(1); } 25% { transform: scale(1.1); } 50% { transform: scale(1); } 75% { transform: scale(1.1); } 100% { transform: scale(1); } }
        @media (max-width: 600px) { .footer-content { flex-direction: column; gap: 10px; text-align: center; border-radius: 20px; } }
        @media print { .app-footer { display: none; } }
    </style>

    <footer class="app-footer">
        <div class="footer-content">
            <div class="footer-left">
                <span>&copy; ${anoAtual} Bruno de Souza • </span>
                <i class="fa-solid fa-heart heart-icon"></i>
                <span> Feito com carinho</span>
            </div>
            <div class="footer-right">
                <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
    `;

    // Injeta no final do body
    document.body.insertAdjacentHTML('beforeend', footerHTML);
}
