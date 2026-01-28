<style>
    /* Estilos específicos do Footer para não conflitar com o resto */
    .app-footer {
        width: 100%;
        padding: 20px 0;
        margin-top: auto; /* Empurra para o final se usar flex column no body */
        font-family: 'Quicksand', sans-serif;
    }

    .footer-content {
        max-width: 900px;
        margin: 0 auto;
        background-color: #ffffff;
        border: 2px dashed #b2bec3; /* Borda tracejada cinza */
        border-radius: 50px; /* Formato de pílula */
        padding: 15px 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #636e72;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .footer-left {
        font-weight: 600;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .heart-icon {
        color: #e17055; /* Cor do coração */
        animation: heartbeat 1.5s infinite;
    }

    .footer-right {
        display: flex;
        gap: 15px;
    }

    .social-link {
        color: #b2bec3; /* Cinza claro igual da imagem */
        font-size: 1.2rem;
        transition: transform 0.2s, color 0.2s;
        text-decoration: none;
    }

    /* Cores ao passar o mouse */
    .social-link:hover { transform: translateY(-2px); }
    .social-link.fa-instagram:hover { color: #e1306c; }
    .social-link.fa-whatsapp:hover { color: #25d366; }
    .social-link.fa-linkedin:hover { color: #0077b5; }

    @keyframes heartbeat {
        0% { transform: scale(1); }
        25% { transform: scale(1.1); }
        50% { transform: scale(1); }
        75% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    @media (max-width: 600px) {
        .footer-content {
            flex-direction: column;
            gap: 10px;
            text-align: center;
            border-radius: 20px;
        }
    }
</style>

<footer class="app-footer">
    <div class="footer-content">
        <div class="footer-left">
            <span>&copy; <?php echo date("Y"); ?> Bruno de Souza • </span>
            <i class="fa-solid fa-heart heart-icon"></i>
            <span> Feito com carinho</span>
        </div>

        <div class="footer-right">
            <a href="https://instagram.com/seu_perfil" target="_blank" class="social-link">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://wa.me/seu_numero" target="_blank" class="social-link">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            <a href="https://linkedin.com/in/seu_perfil" target="_blank" class="social-link">
                <i class="fa-brands fa-linkedin"></i>
            </a>
        </div>
    </div>
</footer>
