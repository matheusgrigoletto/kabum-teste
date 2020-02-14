<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Cadastrar Cliente</h2>
        <a href="/clientes/index" class="btn btn-light" role="button">Cancelar</a>
      </div>

      <form method="post" id="form-add-client" accept-charset="utf-8" action="/clientes/store">
        <div class="form-group row">
          <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" autofocus autocomplete="name">
          </div>
        </div>

        <div class="form-group row">
          <label for="data_nascimento" class="col-sm-2 col-form-label">Data de nascimento</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="dd/mm/aaaa">
          </div>
        </div>

        <div class="form-group row">
          <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="telefone" name="telefone" autocomplete="tel" data-mask="(00) 000000009" data-mask-clearifnotmatch="true">
          </div>
        </div>

        <div class="form-group row">
          <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-clearifnotmatch="true">
          </div>
        </div>

        <div class="form-group row">
          <label for="rg" class="col-sm-2 col-form-label">RG</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="rg" name="rg">
          </div>
        </div>

        <fieldset class="border rounded px-3 py-3 mb-5">
          <legend class="border pl-3 rounded">Endereços</legend>

          <div id="endereco-wrapper">
            <div class="endereco-container pb-2 mb-2 border-bottom">
              <div class="form-group row">
                <div class="d-flex justify-content-between col">
                  <h5>Endereço</h5>
                  <button class="btn btn-sm btn-warning hidden" type="button">remover endereço</button>
                </div>
              </div>

              <div class="form-group row">
                <label for="endereco[]" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="endereco[]" autocomplete="street-address">
                </div>
              </div>

              <div class="form-group row">
                <label for="numero[]" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="numero[]">
                </div>
              </div>

              <div class="form-group row">
                <label for="bairro[]" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="bairro[]">
                </div>
              </div>

              <div class="form-group row">
                <label for="complemento[]" class="col-sm-2 col-form-label">Complemento</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="complemento[]">
                </div>
              </div>

              <div class="form-group row">
                <label for="cep[]" class="col-sm-2 col-form-label">CEP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="cep[]">
                </div>
              </div>

              <div class="form-group row">
                <label for="estado[]" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="estado[]">
                </div>
              </div>

              <div class="form-group row">
                <label for="cidade[]" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="cidade[]">
                </div>
              </div>
            </div>
          </div><!-- / #endereco-wrapper -->

          <div class="form-group row">
            <div class="col text-right">
              <button class="btn btn-info" type="button" id="btn-add-address">Adicionar outro endereço</button>
            </div>
          </div>

        </fieldset>

        <div class="form-group row">
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>