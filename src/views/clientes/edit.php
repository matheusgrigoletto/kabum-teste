<?php
include dirname(__DIR__) . '/partials/navbar.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="d-flex align-items-baseline justify-content-between pb-4">
        <h2>Editar Cliente</h2>
        <a href="/clientes/index" class="btn btn-light" role="button">Cancelar</a>
      </div>

      <form method="post" id="form-client" accept-charset="utf-8" action="/clientes/update/<?=$cliente->id?>">
        <input type="hidden" id="id" name="id" value="<?=$cliente->id?>">

        <div class="form-group row">
          <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" autofocus autocomplete="name" value="<?=$cliente->nome?>">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <div class="form-group row">
          <label for="data_nascimento" class="col-sm-2 col-form-label">Data de nascimento</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="<?=$cliente->data_nascimento?>"
                   data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="dd/mm/aaaa">
            <div class="invalid-feedback"></div>
          </div>

          <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$cliente->telefone?>"
                   autocomplete="tel" data-mask="(00) 000000009" data-mask-clearifnotmatch="true">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <div class="form-group row">
          <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$cliente->cpf?>"
                   placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-clearifnotmatch="true">
            <div class="invalid-feedback"></div>
          </div>

          <label for="rg" class="col-sm-2 col-form-label">RG</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="rg" name="rg" value="<?=$cliente->rg?>">
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <fieldset class="my-5">
          <legend>Endereços</legend>

          <div id="endereco-wrapper">
            <?php foreach($cliente->endereco as $index => $endereco): ?>
            <div class="endereco-container pb-2 mb-2 border-bottom">
              <div class="form-group row">
                <div class="d-flex justify-content-between col">
                  <h5>Endereço #<span><?=($index+1)?></span></h5>
                  <button class="btn btn-sm btn-warning <?=($index===0) ? 'hidden' : '' ?>" type="button">remover endereço</button>
                </div>
              </div>

              <div class="form-group row">
                <label for="cep-<?=$index?>" class="col-sm-2 col-form-label">CEP</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control input-cep" name="cep[]" id="cep-<?=$index?>" value="<?=$endereco->cep?>"
                         data-mask="00000-000" data-mask-clearifnotmatch="true" maxlength="9">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="endereco-<?=$index?>" class="col-sm-2 col-form-label">Endereço</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="endereco[]" id="endereco-<?=$index?>"
                         value="<?=$endereco->endereco?>" autocomplete="street-address">
                  <div class="invalid-feedback"></div>
                </div>

                <label for="numero-<?=$index?>" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="numero[]" id="numero-<?=$index?>" value="<?=$endereco->numero?>">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="bairro-<?=$index?>" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="bairro[]" id="bairro-<?=$index?>" value="<?=$endereco->bairro?>">
                  <div class="invalid-feedback"></div>
                </div>

                <label for="complemento-<?=$index?>" class="col-sm-2 col-form-label">Complemento <small class="text-muted">(Opcional)</small></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="complemento[]" id="complemento-<?=$index?>" value="<?=$endereco->complemento?>">
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="estado-<?=$index?>" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-4">
                  <select name="estado[]" id="estado-<?=$index?>" class="form-control">
                    <option value="">Selecione...</option>
                    <option value="AC" <?=($endereco->estado === 'AC' ? 'selected' : '')?>>Acre</option>
                    <option value="AL" <?=($endereco->estado === 'AL' ? 'selected' : '')?>>Alagoas</option>
                    <option value="AP" <?=($endereco->estado === 'AP' ? 'selected' : '')?>>Amapá</option>
                    <option value="AM" <?=($endereco->estado === 'AM' ? 'selected' : '')?>>Amazonas</option>
                    <option value="BA" <?=($endereco->estado === 'BA' ? 'selected' : '')?>>Bahia</option>
                    <option value="CE" <?=($endereco->estado === 'CE' ? 'selected' : '')?>>Ceará</option>
                    <option value="DF" <?=($endereco->estado === 'DF' ? 'selected' : '')?>>Distrito Federal</option>
                    <option value="ES" <?=($endereco->estado === 'ES' ? 'selected' : '')?>>Espírito Santo</option>
                    <option value="GO" <?=($endereco->estado === 'GO' ? 'selected' : '')?>>Goiás</option>
                    <option value="MA" <?=($endereco->estado === 'MA' ? 'selected' : '')?>>Maranhão</option>
                    <option value="MT" <?=($endereco->estado === 'MT' ? 'selected' : '')?>>Mato Grosso</option>
                    <option value="MS" <?=($endereco->estado === 'MS' ? 'selected' : '')?>>Mato Grosso do Sul</option>
                    <option value="MG" <?=($endereco->estado === 'MG' ? 'selected' : '')?>>Minas Gerais</option>
                    <option value="PA" <?=($endereco->estado === 'PA' ? 'selected' : '')?>>Pará</option>
                    <option value="PB" <?=($endereco->estado === 'PB' ? 'selected' : '')?>>Paraíba</option>
                    <option value="PR" <?=($endereco->estado === 'PR' ? 'selected' : '')?>>Paraná</option>
                    <option value="PE" <?=($endereco->estado === 'PE' ? 'selected' : '')?>>Pernambuco</option>
                    <option value="PI" <?=($endereco->estado === 'PI' ? 'selected' : '')?>>Piauí</option>
                    <option value="RJ" <?=($endereco->estado === 'RJ' ? 'selected' : '')?>>Rio de Janeiro</option>
                    <option value="RN" <?=($endereco->estado === 'RN' ? 'selected' : '')?>>Rio Grande do Norte</option>
                    <option value="RS" <?=($endereco->estado === 'RS' ? 'selected' : '')?>>Rio Grande do Sul</option>
                    <option value="RO" <?=($endereco->estado === 'RO' ? 'selected' : '')?>>Rondônia</option>
                    <option value="RR" <?=($endereco->estado === 'RR' ? 'selected' : '')?>>Roraima</option>
                    <option value="SC" <?=($endereco->estado === 'SC' ? 'selected' : '')?>>Santa Catarina</option>
                    <option value="SP" <?=($endereco->estado === 'SP' ? 'selected' : '')?>>São Paulo</option>
                    <option value="SE" <?=($endereco->estado === 'SE' ? 'selected' : '')?>>Sergipe</option>
                    <option value="TO" <?=($endereco->estado === 'TO' ? 'selected' : '')?>>Tocantins</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>

                <label for="cidade-<?=$index?>" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="cidade[]" id="cidade-<?=$index?>" value="<?=$endereco->cidade?>">
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div><!-- / .enddereco-container -->
            <?php endforeach; ?>
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
