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
  });

  // Logout
  function logout() {
    $('.btn-out').on('click', function (e) {
      e.preventDefault();
      window.el('form-logout').submit();
      return !1;
    });
  }
})(window, document, window.jQuery);

require('./app/clientes');