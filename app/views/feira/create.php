<section class="form-card">
  <div class="form-header"><span>Cadastre sua feira</span></div>
  <form method="post" action="index.php?controller=feira&action=save">
    <div class="input-group grid grid-2">
      <div>
        <label>nome comercial</label>
        <input class="input" type="text" name="nome" value="<?php echo $feira['nome'] ?? ''; ?>" required>
      </div>
      <div>
        <label>horário</label>
        <input class="input" type="text" name="horario" value="<?php echo $feira['horario'] ?? ''; ?>" required>
      </div>
      <div>
        <label>endereço</label>
        <input class="input" type="text" name="endereco" value="<?php echo $feira['endereco'] ?? ''; ?>" required>
      </div>
      <div>
        <label>bairro</label>
        <input class="input" type="text" name="bairro" value="<?php echo $feira['bairro'] ?? ''; ?>" required>
      </div>
      <div>
        <label>dias de funcionamento</label>
        <input class="input" type="text" name="dias" value="<?php echo $feira['dias_funciona'] ?? ''; ?>" required>
      </div>
    </div>
    <div class="form-actions">
      <a class="btn ghost" href="index.php?controller=feira&action=dashboard">Cancelar</a>
      <button class="btn" type="submit">Salvar</button>
    </div>
  </form>
</section>
