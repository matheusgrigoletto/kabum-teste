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
    logout();
  });

  // Logout
  function logout() {
    $('#btn-logout').on('click', function (e) {
      e.preventDefault();
      document.getElementById('form-logout').submit();
      return false;
    });
  }
})(window, document, window.jQuery);

require('./app/clientes');
