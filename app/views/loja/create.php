<section class="form-card">
  <div class="form-header"><span>Cadastre sua loja</span></div>
  <form method="post" action="index.php?controller=loja&action=save">
    <div class="input-group grid">
      <div class="grid grid-2">
        <div>
          <label>nome</label>
          <input class="input" type="text" name="nome" value="<?php echo $loja['nome'] ?? ''; ?>" required>
        </div>
        <div>
          <label>e-mail</label>
          <input class="input" type="email" name="email" value="<?php echo $loja['email'] ?? ''; ?>" required>
        </div>
      </div>
      <div>
        <label>número telefônico</label>
        <input class="input" type="text" name="telefone" value="<?php echo $loja['telefone'] ?? ''; ?>" required>
      </div>
    </div>
    <div class="form-actions">
      <a class="btn ghost" href="index.php?controller=feira&action=dashboard">Cancelar</a>
      <button class="btn" type="submit">Salvar</button>
    </div>
  </form>
</section>
