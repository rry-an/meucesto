<section class="form-card">
  <div class="form-header"><span>Crie sua conta</span></div>
  <?php if (!empty($error)): ?><div class="alert"><?php echo $error; ?></div><?php endif; ?>
  <form method="post">
    <div class="input-group grid grid-2">
      <div>
        <label for="name">nome</label>
        <input class="input" type="text" name="name" id="name" required>
      </div>
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
      <button class="btn" type="submit">Criar conta</button>
      <a class="btn ghost" href="index.php?controller=auth&action=login">Já tenho conta</a>
    </div>
  </form>
</section>
