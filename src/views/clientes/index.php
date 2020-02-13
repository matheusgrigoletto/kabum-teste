<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Clientes</h2>
        <a href="#" class="btn btn-primary" role="button">Cadastrar</a>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefone</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Nome do cliente</td>
              <td>cliente@email.com</td>
              <td>(19) 989023883</td>
              <td class="text-right">
                <a href="#" class="btn btn-sm btn-info" role="button">Editar</a>
                <button type="button" class="btn btn-sm btn-danger">Excluir</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>