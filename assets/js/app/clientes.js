((window, document, $) => {
  // Inicialização
  $(() => {
    if (window.$html.is('.page-clientes')) {
      clientes();
      limpaNotificacao();
    }
  });

  function clientes() {
    let $enderecoTemplate = $('.endereco-container:last'),
      enderecoTemplateHtml = $enderecoTemplate.clone(),
      $enderecoWrapper = $('#endereco-wrapper');

    $('#btn-add-address').on('click', function (e) {
      e.preventDefault();

      const $enderecoTemplateHtml = $(enderecoTemplateHtml);

      let index = null;

      $enderecoTemplateHtml.find('button.btn-warning').removeClass('hidden');
      $enderecoTemplateHtml.find('label, input, select, h5 span').each((i, item) => {
        let $item = $(item), id = '';

        if($item.is('label')) {
          id = $item.attr('for').split('-');
          id = id[0] + '-' + (parseInt(id[1]) + 1);
          $item.attr('for', id);
        } else if($item.is('span')) {
          $item.text(parseInt($item.text()) + 1);
        } else {
          id = $item.attr('id').split('-');
          index = parseInt(id[1]) + 1;

          id = id[0] + '-' + index;
          $item.attr('id', id).val('');
        }
      });

      $enderecoWrapper.append(enderecoTemplateHtml);

      setTimeout(() => {
        $enderecoTemplate = $('.endereco-container:last');
        enderecoTemplateHtml = $enderecoTemplate.clone();

        const $cep = $enderecoWrapper.find(`#cep-${index}`);
        $cep.mask($cep.data('mask'));

        $enderecoTemplate.find('input:visible:first').focus();
      }, 400);

      return false;
    });

    $('body').on('click', '#endereco-wrapper button.btn-warning', function (e) {
      $(this).parents('.endereco-container:first').fadeOut(500, function(){
        $(this).remove();

        setTimeout(() => {
          $enderecoTemplate = $('.endereco-container:last');
          enderecoTemplateHtml = $enderecoTemplate.clone();
        }, 400);
      });
    });

    $('body').on('blur', '#endereco-wrapper .input-cep', function (e) {
      const index = $(this).attr('id').split('-')[1];
      //console.log(index, this.value);
      buscaCep(this.value, index);
    });

    $('#form-client').on('submit', function(e){
      e.preventDefault();
      const $form = $(this),
        action = this.action,
        $btnSubmit = $form.find('button[type=submit]'),
        btnSubmitText = $btnSubmit.text();

      $.ajax({
        url: action,
        type: 'post',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function() {
          $btnSubmit.prop('disabled', true).text('Salvando...');
          $form.find('.form-control').removeClass('is-invalid').next('.invalid-feedback').empty();
        },
        complete: function() {
          $btnSubmit.prop('disabled', false).text(btnSubmitText);
        },
        success: function(response) {
          if(response.error) {
            for(const elem in response.errors) {
              $(elem).addClass('is-invalid').next('.invalid-feedback').html(response.errors[elem]);
            }
          } else {
            location.href = response.return_url;
          }
        }
      });

      return false;
    });

    $('.btn-delete').on('click', function(e) {
      if(window.confirm('Confirma a exclusão deste cliente?')) {
        return true;
      } else {
        e.preventDefault();
        return false;
      }
    });
  }

  function limpaNotificacao() {
    setTimeout(() => $('.notification').alert('close'), 3000);
  }

  function buscaCep(cep, index) {
    if (cep !== "") {
      $.getJSON(`https://viacep.com.br/ws/${cep}/json/?callback=?`, function(response) {
        if (!('erro' in response)) {
          $(`#endereco-${index}`).val(response.logradouro);
          $(`#bairro-${index}`).val(response.bairro);
          $(`#estado-${index}`).val(response.uf);
          $(`#cidade-${index}`).val(response.localidade);
        } else {
          // CEP pesquisado não foi encontrado.
          limpaCamposEndereco(index);
        }
      });
    }
  }

  function limpaCamposEndereco(index) {
    $(`#endereco-${index}`).val('');
    $(`#bairro-${index}`).val('');
    $(`#estado-${index}`).val('');
    $(`#cidade-${index}`).val('');
  }
})(window, document, window.jQuery);
