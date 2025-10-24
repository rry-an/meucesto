<section class="form-card">
  <div class="form-header"><span>Faça login</span></div>
  <?php if (!empty($error)): ?><div class="alert"><?php echo $error; ?></div><?php endif; ?>
  <form method="post">
    <div class="input-group grid grid-2">
      <div>
        <label for="email">e-mail</label>
        <input class="input" type="email" name="email" id="email" required>
      </div>
      <div>
        <label for="password">senha</label>
        <input class="input" type="password" name="password" id="password" required>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn" type="submit">Entrar</button>
      <a class="btn ghost" href="index.php?controller=auth&action=register">Criar conta</a>
    </div>
  </form>
</section>
