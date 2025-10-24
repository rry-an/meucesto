<section class="card">
  <h3 class="center">Lojas cadastradas</h3>
  <table class="table">
    <thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th></tr></thead>
    <tbody>
      <?php foreach($items as $i): ?>
      <tr>
        <td><?php echo htmlspecialchars($i['nome']); ?></td>
        <td><?php echo htmlspecialchars($i['email']); ?></td>
        <td><?php echo htmlspecialchars($i['telefone']); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
