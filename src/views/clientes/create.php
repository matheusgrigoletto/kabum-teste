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

      <form method="post" id="form-client" accept-charset="utf-8" action="/clientes/store">

        <div class="form-group row">
          <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" autofocus autocomplete="name">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <div class="form-group row">
          <label for="data_nascimento" class="col-sm-2 col-form-label">Data de nascimento</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento"
                   data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="dd/mm/aaaa">
            <div class="invalid-feedback"></div>
          </div>

          <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="telefone" name="telefone"
                   autocomplete="tel" data-mask="(00) 000000009" data-mask-clearifnotmatch="true">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <div class="form-group row">
          <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="cpf" name="cpf"
              placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-clearifnotmatch="true">
            <div class="invalid-feedback"></div>
          </div>

          <label for="rg" class="col-sm-2 col-form-label">RG</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="rg" name="rg">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <fieldset class="my-5">
          <legend>Endereços</legend>

          <div id="endereco-wrapper">
            <div class="endereco-container pb-2 mb-2 border-bottom">
              <div class="form-group row">
                <div class="d-flex justify-content-between col">
                  <h5>Endereço #<span>1</span></h5>
                  <button class="btn btn-sm btn-warning hidden" type="button">remover endereço</button>
                </div>
              </div>

              <div class="form-group row">
                <label for="cep-0" class="col-sm-2 col-form-label">CEP</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control input-cep" name="cep[]" id="cep-0"
                         data-mask="00000-000" data-mask-clearifnotmatch="true" maxlength="9">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="endereco-0" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="endereco[]" id="endereco-0" autocomplete="street-address">
                  <div class="invalid-feedback"></div>
                </div>

                <label for="numero-0" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="numero[]" id="numero-0">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="bairro-0" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="bairro[]" id="bairro-0">
                  <div class="invalid-feedback"></div>
                </div>

                <label for="complemento-0" class="col-sm-2 col-form-label">Complemento <small class="text-muted">(Opcional)</small></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="complemento[]" id="complemento-0">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="estado-0" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-4">
                  <select name="estado[]" id="estado-0" class="form-control">
                    <option value="">Selecione...</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>

                <label for="cidade-0" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="cidade[]" id="cidade-0">
                  <div class="invalid-feedback"></div>
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
