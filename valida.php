<?php
// valida.php - Processa o login e inicia a sessão

session_start();
date_default_timezone_set('America/Sao_Paulo');

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Define o nível de acesso conforme o usuário
$nivel = '';
if ($usuario === 'admin' && $senha === '12345') {
    $nivel = 'admin';
} elseif ($usuario === 'usuario' && $senha === 'abc123') {
    $nivel = 'usuario';
}

if ($nivel !== '') {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['nivel'] = $nivel;
    header('Location: painel.php');
    exit;
} else {
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>❌ Login inválido!</h2>
            <p>Usuário ou senha incorretos.</p>
            <a href='login.html'>Tentar novamente</a>
        </div>
    </body>
    </html>";
}
?>