<?php $base = '../assets/css/style.css'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feira & Loja</title>
  <link rel="stylesheet" href="<?php echo $base; ?>">
</head>
<body>
<header class="site-header">
  <div class="brand">
    <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Logo_Sin%C3%A9rgia_%28icon%29.svg" alt="">
    <h1>CADASTRO <span>FEIRA/LOJA</span></h1>
  </div>
  <div style="margin-left:auto">
    <?php if(isset($_SESSION['user_id'])): ?>
      <a class="btn small" href="index.php?controller=feira&action=dashboard">Dashboard</a>
      <a class="btn small ghost" href="index.php?controller=auth&action=logout">Sair</a>
    <?php else: ?>
      <a class="btn small" href="index.php?controller=auth&action=login">Entrar</a>
    <?php endif; ?>
  </div>
</header>
<main class="container">
