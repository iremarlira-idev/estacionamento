<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚦 Estacionamento 24H 🚦</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial Black', Arial, sans-serif;
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 30%, #d68910 70%, #b7950b 100%);
            /* AMARELO TRÂNSITO + ALERTA */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e50;
        }
        
        .container {
            background: linear-gradient(145deg, #2c3e50 0%, #34495e 100%);
            /* FUNDO PRETO/ACINZENTADO (placa oficial) */
            color: #f1c40f; /* TEXTO AMARELO */
            padding: 40px;
            border-radius: 30px;
            box-shadow: 
                0 0 30px rgba(243, 156, 18, 0.6),
                inset 0 0 20px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 500px;
            width: 90%;
            border: 3px solid #f39c12;
            position: relative;
        }
        
        .container::before {
            content: '🚦';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #f39c12;
            color: #2c3e50;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 1.5em;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            letter-spacing: 3px;
        }
        
        .subtitle {
            font-size: 1.1em;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        .info {
            background: rgba(243, 156, 18, 0.2);
            /* FUNDO AMARELO TRANSPARENTE */
            padding: 25px;
            border-radius: 12px;
            margin: 20px 0;
            border: 2px solid #f39c12;
            backdrop-filter: blur(10px);
        }
        
        .info p {
            margin: 12px 0;
            font-size: 1.2em;
            font-weight: bold;
        }
        
        #relogio { 
            font-size: 2.2em; 
            font-family: 'Courier New', monospace;
            background: linear-gradient(45deg, #f39c12, #f1c40f);
            color: #2c3e50;
            padding: 15px 25px;
            border-radius: 15px;
            display: inline-block;
            box-shadow: 
                0 8px 25px rgba(243, 156, 18, 0.6),
                inset 0 2px 5px rgba(255,255,255,0.3);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .btn {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            /* VERDE = "ENTRADA LIBERADA" */
            color: #2c3e50;
            border: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.3em;
            font-weight: bold;
            font-family: 'Arial Black';
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
            margin-top: 20px;
        }
        
        .btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 35px rgba(39, 174, 96, 0.6);
        }
        
        .status {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1em;
        }
        
        .vaga-livre { background: rgba(46, 204, 113, 0.2); border: 2px solid #27ae60; }
        .vaga-ocupada { background: rgba(231, 76, 60, 0.2); border: 2px solid #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚗 ESTACIONAMENTO 24H 🚗</h1>
        <p class="subtitle">Vagas Disponíveis | Entrada Automática</p>
        
        <div class="info">
            <?php
            $nome = "Motorista";
            $hora = date('H:i:s');
            $diaSemana = [
                0 => "Domingo", 1 => "Segunda", 2 => "Terça", 
                3 => "Quarta", 4 => "Quinta", 5 => "Sexta", 6 => "Sábado"
            ];
            $dia = $diaSemana[date('w')];
            $vagasLivres = 15; // Simulando vagas
            
            echo "<p>👋 Olá, <strong>$nome</strong>!</p>";
            echo "<p>📅 " . date('d/m/Y') . " | <strong>$dia</strong></p>";
            echo "<p>🕐 <span id='relogio'>$hora</span></p>";
            echo "<p>🚦 <strong>Vagas Livres: $vagasLivres</strong></p>";
            ?>
        </div>
        
        <div id="status" class="status vaga-livre">
            ✅ VAGA DISPONÍVEL - Clique para Entrar!
        </div>
        
        <button class="btn" onclick="entrarEstacionamento()">
            🚘 ENTRAR NO ESTACIONAMENTO
        </button>
    </div>

    <script>
        function atualizarRelogio() {
            const agora = new Date();
            const hora = agora.toLocaleTimeString('pt-BR');
            document.getElementById('relogio').textContent = hora;
        }
        
        function entrarEstacionamento() {
            const status = document.getElementById('status');
            status.className = 'status vaga-ocupada';
            status.innerHTML = '🚫 ESTACIONAMENTO OCUPADO | Hora de Entrada: ' + 
                             new Date().toLocaleTimeString('pt-BR');
            document.querySelector('.btn').style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
            document.querySelector('.btn').textContent = '🅿️ SAIR DO ESTACIONAMENTO';
        }
        
        // Relógio ao vivo
        atualizarRelogio();
        setInterval(atualizarRelogio, 1000);
    </script>
</body>
</html>