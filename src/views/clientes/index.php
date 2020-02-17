<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<?= $salvo ?>
<?= $excluido ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Clientes</h2>
        <a href="/clientes/create" class="btn btn-primary" role="button">Cadastrar</a>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data nascimento</th>
            <th scope="col">Telefone</th>
            <th scope="col"></th>
          </tr>
          </thead>
          <tbody>
        <?php if (count($dataset)) :
          foreach ($dataset as $row) : ?>
          <tr>
            <th scope="row"><?= $row->id ?></th>
            <td><?= $row->nome ?></td>
            <td><?= $row->data_nascimento ?></td>
            <td><?= $row->telefone ?></td>
            <td class="text-right">
              <a href="/clientes/edit/<?= $row->id ?>" class="btn btn-sm btn-info" role="button">Editar</a>
              <a href="/clientes/delete/<?= $row->id ?>" class="btn btn-sm btn-danger btn-delete" role="button">Excluir</a>
            </td>
          </tr>
        <?php endforeach;
        else: ?>
          <tr>
            <td colspan="5" class="text-center text-muted">
              Nenhum cliente cadastrado. Para cadastrar, clique no botão "Cadastrar" acima.
            </td>
          </tr>
        <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
