<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Cadastrar Cliente</h2>
        <a href="#" class="btn btn-light" role="button">Cancelar</a>
      </div>

      <form>
        <div class="form-group row">
          <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" autofocus autocomplete="name">
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">E-mail</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" autocomplete="email">
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

        <fieldset>
          <legend>Endereços</legend>

          <div id="endereco-container">
            <div class="form-group row">
              <h5 class="col-sm-2">Endereço #<span>1</span></h4>
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

        </fieldset>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>