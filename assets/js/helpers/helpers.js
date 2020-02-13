module.exports = {
  $window: $(window),
  $body: $('body'),
  $html: $('html'),
  $htmlBody: $('html, body'),
  $loading: null,
  $modalError: $('#modal-error'),

  // modal erro
  openError: function(html) {
    window.$modalError.find('.modal-content:first').html(`<h5>Ops :(</h5>${html}`);
    window.$modalError.modal('open');
  },

  // document.getElementById
  el: function (id){
    return document.getElementById(id);
  },

  // Verifica se o elemento (element) está visivel na viewport
  isOnScreen: function (element){
    const screenTop = window.$window.scrollTop(),
      screenBottom = screenTop + window.$window.height(),
      elementTop = element.offset().top,
      elementBottom = elementTop + element.height();

    return (elementBottom > screenTop && elementTop < screenBottom);
  },

  // Mostra a imagem de loading
  loading_show: function() {
    try {
      if(window.$loading == null) {
        window.$loading = $('#loading');
      }
      window.$loading.show();
    } catch(e){}
  },

  // Esconde a imagem de loading
  loading_hide: function() {
    try {
      window.$loading.animate({
        'bottom': -30,
        'opacity': 0
      }, 400, '', function() {
        window.$loading.css({
          'bottom': '',
          'opacity': '',
          'display': '',
        });
      });
    } catch(e){}
  },

  is_email: function(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  },

  app_url: function(link) {
    const config = baseurl + '{%%}.html';
    return config.replace('{%%}', link);
  }
};
