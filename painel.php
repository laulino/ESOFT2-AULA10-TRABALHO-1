<?php
// painel.php - Página protegida com boas-vindas

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivel = $_SESSION['nivel'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>

        <?php if ($nivel === 'admin'): ?>
            <p>Você está logado como <strong>administrador</strong>.</p>
            <p><a href="perfil.php">Ver perfil</a></p>
        <?php else: ?>
            <p>Você está logado como <strong>usuário comum</strong>.</p>
        <?php endif; ?>
        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>