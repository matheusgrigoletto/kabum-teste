window.jQuery = window.jQuery || {};

// Plugins
require('./vendor/bootstrap');
require('./vendor/jquery.mask');

// Helpers
require('./helpers/browser.helpers');
const Helpers = require('./helpers/helpers');
for (let method in Helpers) {
  window[method] = Helpers[method];
}

((window, document, $) => {
  // Inicialização
  $(() => {
    // Mascaras input
    masks();
  });

  // Logout
  function logout() {
    $('.btn-out').on('click', function (e) {
      e.preventDefault();
      window.el('form-logout').submit();
      return !1;
    });
  }

  // Mascaras input
  function masks() {
    const options = {
      onKeyPress: function (val, e, field, options) {
        const masks = ['000.000.000-009', '00.000.000/0000-00'];
        const mask = (val.length <= 14) ? masks[0] : masks[1];
        $('input.cpf-cnpj-mask').mask(mask, options);
      }
    };

    const $inputs = $('input.cpf-cnpj-mask').mask('00.000.000/0000-00', options);
    setTimeout(() => {
      $inputs.trigger('keypress');
    }, 300);
  }
})(window, document, window.jQuery);
