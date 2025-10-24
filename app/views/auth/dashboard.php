<section class="grid grid-2">
  <div class="card">
    <h3>Minha Feira</h3>
    <?php if($feira): ?>
      <p><strong><?php echo htmlspecialchars($feira['nome']); ?></strong></p>
      <p class="muted"><?php echo htmlspecialchars($feira['endereco']); ?> — <?php echo htmlspecialchars($feira['bairro']); ?></p>
      <p class="muted">Horário: <?php echo htmlspecialchars($feira['horario']); ?> | Dias: <?php echo htmlspecialchars($feira['dias_funciona']); ?></p>
      <a class="btn" href="index.php?controller=feira&action=form">Editar</a>
    <?php else: ?>
      <p class="muted">Você ainda não cadastrou sua feira.</p>
      <a class="btn" href="index.php?controller=feira&action=form">Cadastrar Feira</a>
    <?php endif; ?>
  </div>
  <div class="card">
    <h3>Minha Loja</h3>
    <?php if($loja): ?>
      <p><strong><?php echo htmlspecialchars($loja['nome']); ?></strong></p>
      <p class="muted"><?php echo htmlspecialchars($loja['email']); ?> — <?php echo htmlspecialchars($loja['telefone']); ?></p>
      <a class="btn" href="index.php?controller=loja&action=form">Editar</a>
    <?php else: ?>
      <p class="muted">Você ainda não cadastrou sua loja.</p>
      <a class="btn" href="index.php?controller=loja&action=form">Cadastrar Loja</a>
    <?php endif; ?>
  </div>
</section>

<section class="card" style="margin-top:18px">
  <div class="form-actions">
    <a class="btn ghost" href="index.php?controller=feira&action=list">Ver todas as feiras</a>
    <a class="btn ghost" href="index.php?controller=loja&action=list">Ver todas as lojas</a>
  </div>
</section>
