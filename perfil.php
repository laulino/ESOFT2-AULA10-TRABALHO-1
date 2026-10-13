<?php
// perfil.php - Página acessível apenas pelo admin

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

if ($_SESSION['nivel'] !== 'admin') {
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Acesso negado</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>🚫 Acesso negado</h2>
            <p>Esta página é restrita ao administrador.</p>
            <a href='painel.php'>Voltar ao painel</a>
        </div>
    </body>
    </html>";
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>👤 Perfil</h2>
        <p>Usuário: <?php echo $usuario; ?></p>
        <p>Nível: administrador</p>
        <a href="painel.php">Voltar ao painel</a>
    </div>
</body>
</html>