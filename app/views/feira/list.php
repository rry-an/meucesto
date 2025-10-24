<section class="card">
  <h3 class="center">Feiras cadastradas</h3>
  <table class="table">
    <thead><tr><th>Nome</th><th>Endereço</th><th>Bairro</th><th>Horário</th><th>Dias</th></tr></thead>
    <tbody>
      <?php foreach($items as $i): ?>
      <tr>
        <td><?php echo htmlspecialchars($i['nome']); ?></td>
        <td><?php echo htmlspecialchars($i['endereco']); ?></td>
        <td><span class="badge"><?php echo htmlspecialchars($i['bairro']); ?></span></td>
        <td><?php echo htmlspecialchars($i['horario']); ?></td>
        <td><?php echo htmlspecialchars($i['dias_funciona']); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
