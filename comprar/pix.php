<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
verificar_autenticado(); // Apenas exige login

// Código PIX Fictício aleatório
$chave_pix_ficticia = "00020126580014br.gov.bcb.pix0136cadernovivo-pix-ficticio-123456785204000053039865405"  . "5802BR5913Caderno Vivo6009Sao Paulo62070503***6304E2CA";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento PIX - Caderno Vivo</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #fffafc; color: #5a4b51; min-height: 100vh; display: flex; flex-direction: column; }
        hr { display: none; }

        main { flex: 1; max-width: 600px; width: 100%; margin: 40px auto; padding: 0 20px; }

        .pix-card {
            background: #ffffff;
            border: 2px solid #f6d8e5;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 8px 20px rgba(178, 88, 119, 0.08);
            text-align: center;
        }

        h1 { color: #b25877; font-size: 1.4rem; margin-bottom: 10px; }
        p { font-size: 0.95rem; color: #6d5860; margin-bottom: 20px; }

        .price-tag { font-size: 1.8rem; color: #b25877; font-weight: 700; margin-bottom: 20px; }

        /* QR Code Fictício */
        .qrcode-box img {
            width: 200px;
            height: 200px;
            border: 2px dashed #f0c3d4;
            padding: 10px;
            border-radius: 12px;
            background: #fff0f5;
        }

        .pix-input-group {
            margin: 20px 0;
            display: flex;
            gap: 8px;
        }

        .pix-input-group input {
            flex: 1;
            padding: 10px;
            border: 1.5px solid #f0c3d4;
            border-radius: 8px;
            background-color: #fff0f5;
            font-size: 0.85rem;
            color: #5a4b51;
            outline: none;
        }

        .btn-action {
            background-color: #b25877;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-action:hover { background-color: #96435f; }

        /* Spinner de Carregamento (Simulação de 4 segundos) */
        .loading-box {
            display: none;
            margin-top: 20px;
        }

        .spinner {
            border: 4px solid #fff0f5;
            border-top: 4px solid #b25877;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Tela de Sucesso */
        .success-box {
            display: none;
            background-color: #e8fde8;
            border: 1px solid #b4f8b4;
            color: #1e832c;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .success-box h2 { font-size: 1.3rem; margin-bottom: 8px; }
        .success-box a {
            display: inline-block;
            margin-top: 15px;
            color: #ffffff;
            background-color: #1e832c;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>
     <?php
    include __DIR__ . '/../includes/header.php'
    ?>

    <main>
        <div class="pix-card">
            <h1>Pagamento via PIX 
            </h1>
            <p>Escaneie o QR Code abaixo ou copie a chave PIX para pagar:</p>

            <div class="qrcode-box">
                <!-- Imagem ilustrativa de QR Code via API pública -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode($chave_pix_ficticia) ?>" alt="QR Code PIX">
            </div>

            <div class="pix-input-group">
                <input type="text" value="<?= $chave_pix_ficticia ?>" id="chavePix" readonly>
            </div>

            <button class="btn-action" id="btnPagar" onclick="simularPagamento()">Copiar Código e Confirmar Pagamento </button>

            <!-- Spinner enquanto aguarda 4 segundos -->
            <div class="loading-box" id="loadingBox">
                <div class="spinner"></div>
                <p style="color: #b25877; font-weight: 600;">Confirmando pagamento no banco, aguarde...</p>
            </div>

            <!-- Caixa de Sucesso após 4 segundos -->
            <div class="success-box" id="successBox">
                <h2>🎉 Pagamento Efetuado com Sucesso!</h2>
                <p>Seu pedido foi confirmado e já está sendo preparado com muito carinho!</p>
                <a href="/cadernovivo/index.php">Voltar para a Loja</a>
            </div>
        </div>
    </main>

    

    <script>
        function simularPagamento() {
            // Copia o código PIX para a área de transferência
            var inputChave = document.getElementById("chavePix");
            inputChave.select();
            document.execCommand("copy");

            // Oculta o botão principal
            document.getElementById("btnPagar").style.display = "none";

            // Exibe a animação de carregamento
            document.getElementById("loadingBox").style.display = "block";

            // Aguarda 4000 milissegundos (4 segundos)
            setTimeout(function () {
                document.getElementById("loadingBox").style.display = "none";
                document.getElementById("successBox").style.display = "block";
            }, 4000);
        }
    </script>
    <?php include __DIR__ . '/../includes/footer.php' ?>
</body>

</html>