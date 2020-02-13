/*--------------------------------------------------------------
 Helpers
 --------------------------------------------------------------*/

/**
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 * Copyright 2014-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
(function () {
  'use strict';

  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style');
    msViewportStyle.appendChild(
      document.createTextNode('@-ms-viewport{width:auto!important}')
    );
    document.querySelector('head').appendChild(msViewportStyle);
  }
}());

// Avoid `console` errors in browsers that lack a console.
(function () {
  'use strict';

  var method,
    noop = function () { },
    methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed',
      'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeStamp',
      'trace', 'warn'],
    length = methods.length,
    console = (window.console = window.console || {});
  while (length--) {
    method = methods[length];
    if (!console[method]) {
      console[method] = noop
    }
  }
}());

// Fallback input placeholder
(function (window, document, $, Modernizr) {
  'use strict';

  $(function () {
    if (Modernizr && !Modernizr.input.placeholder) {
      $('[placeholder]').on('focus', function () {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
          input.removeClass('placeholder');
        }
      }).on('blur', function () {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
          input.addClass('placeholder');
          input.val(input.attr('placeholder'));
        }
      }).blur();

      $('[placeholder]').parents('form').on('submit', function () {
        $(this).find('[placeholder]').each(function () {
          var input = $(this);
          if (input.val() == input.attr('placeholder')) {
            input.val('');
          }
        });
      });
    }
  });
}(window, document, window.jQuery, window.Modernizr));
