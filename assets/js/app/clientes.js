((window, document, $) => {
  // Inicialização
  $(() => {
    if (window.$html.is('.page-clientes-create')) {
      formClientes();
    }
  });

  function formClientes() {
    let $enderecoTemplate = $('.endereco-container:last'),
      enderecoTemplateHtml = $enderecoTemplate.clone(true),
      $enderecoWrapper = $('#endereco-wrapper');

    $('#btn-add-address').on('click', function (e) {
      e.preventDefault();

      $(enderecoTemplateHtml).find('button.btn-warning').removeClass('hidden');

      $enderecoWrapper.append(enderecoTemplateHtml);

      setTimeout(() => {
        $enderecoTemplate = $('.endereco-container:last');
        enderecoTemplateHtml = $enderecoTemplate.clone(true);
      }, 400);

      return false;
    });

    $('body').on('click', '#endereco-wrapper button.btn-warning', function (e) {
      $(this).parents('.endereco-container:first').remove();
    });
  }
})(window, document, window.jQuery);
