<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Clientes</h2>
        <a href="/clientes/create" class="btn btn-primary" role="button">Cadastrar</a>
      </div>

      <div class="table-responsive">
        <?php if (count($dataset)) : ?>
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
              <?php foreach ($dataset as $row) : ?>
                <tr>
                  <th scope="row"><?= $row->id ?></th>
                  <td><?= $row->nome ?></td>
                  <td><?= $row->data_nascimento ?></td>
                  <td><?= $row->telefone ?></td>
                  <td class="text-right">
                    <a href="/clientes/edit/<?= $row->id ?>" class="btn btn-sm btn-info" role="button">Editar</a>
                    <a href="/clientes/delete/<?= $row->id ?>" class="btn btn-sm btn-danger" role="button">Excluir</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>