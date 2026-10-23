<style>
    /* Reset e reestilização completa do footer */
    footer {
        all: unset; /* Remove todas as estilizações anteriores */
        display: block;
        box-sizing: border-box;
        
        /* Estilo em forma de caixa / card */
        max-width: 1200px;
        margin: 40px auto 20px auto;
        padding: 25px 20px;
        background-color: #f8d2dc; /* Rosa um pouco mais escuro que o #fff0f5 do body */
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(90, 62, 54, 0.08);
        
        /* Tipografia e alinhamento */
        font-family: Arial, sans-serif;
        color: #5a3e36;
        text-align: center;
    }

    /* Estilo dos textos e links internos do footer */
    footer p {
        margin: 5px 0;
        font-size: 0.95rem;
    }

    footer a {
        color: #5a3e36;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.2s ease;
    }

    footer a:hover {
        color: #d17088;
    }

    .footer-conteudo {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .footer-links {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 5px;
    }
</style>

<footer>
    <div class="footer-conteudo">
        <p>&copy; <?php echo date('Y'); ?> CadernoVivo. Todos os direitos reservados.</p>
        
        <div class="footer-links">
            <a href="/cadernovivo/footer/sobre.php">Sobre nós</a> 
            <a href="/cadernovivo/footer/contato.php">Contato</a>
            <a href="/cadernovivo/footer/privacidade.php">Privacidade</a>
        </div>
    </div>
</footer>