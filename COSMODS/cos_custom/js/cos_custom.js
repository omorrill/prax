(function ($) {
/*  Drupal.behaviors.cos_custom = {
    searchSelector: '#block-search-form form',
    destinationDevice: '',
    attach:function (context) {
      // Fix background scrolling in IE.
      var ua = window.navigator.userAgent;
      var ie = ua.indexOf('MSIE ') > -1 || ua.indexOf('Trident/') > -1 ? true : false;

      if (ie) {
        $('body').on("mousewheel", function (e) {
          e.preventDefault ? e.preventDefault() : e.returnValue = false;
          var wheelDelta = e.wheelDelta ? e.wheelDelta : e.originalEvent.wheelDelta;
          var currentScrollPosition = window.pageYOffset ? window.pageYOffset : window.document.documentElement.scrollTop;
          window.scrollTo(0, currentScrollPosition - wheelDelta);
        });
        $('body').keydown(function (e) {
          var currentScrollPosition = window.pageYOffset ? window.pageYOffset : window.document.documentElement.scrollTop;
          switch (e.which) {
            // Up arrow.
            case 38:
              e.preventDefault ? e.preventDefault() : e.returnValue = false;
              window.scrollTo(0, currentScrollPosition - 120);
              break;

            // Down arrow.
            case 40:
              e.preventDefault ? e.preventDefault() : e.returnValue = false;
              window.scrollTo(0, currentScrollPosition + 120);
              break;

            default:
              return;
          }
        });
      }

      // Scroll to anchor links.
      // (Dependent on jQuery plugins: BBQ and smoothScroll.)
      $('a[href^="#"], a[href^="' + window.location.pathname + '#"]').live('click', function() {
        if ( this.hash ) {
          $.bbq.pushState( '#/' + this.hash.slice(1) );
          return false;
        }
      });
      $(window).bind('hashchange', function(event) {
        var tgt = location.hash.replace(/^#\/?/,'');
        if (tgt.length > 0 && document.getElementById(tgt)) {
          $.smoothScroll({scrollTarget: '#' + tgt, offset: -30});
        }
      });
      $(window).trigger('hashchange');
      // Assists with fixing anchor hash problem, case #3102.
      // Content shifting up.
      $(window).load(function() {
        $('body').addClass('processed');
      });

      /* Removed by Bryan Jones - Monarch Digital on 09-03-2015.

         Colorado springs wanted the menu to be 2 children in depth so there is
         no need for this code as it intefers with the new code in navigation.js

      // Drop menus for the header nav sub menus.
      if ($('body.main-drop-menus:not(.menu-toggles-processed)', context).length > 0) {
        $('body').addClass('menu-toggles-processed')
          .dropMenu('#header-bottom li .submenu-toggle');
      }*/

      // Search opacity rules.
      /*if ($('body.search-fade', context).length > 0) {
        $('#block-search-form form input').focus(Drupal.behaviors.cos_custom.searchFocus);
        $('#block-search-form form input').blur(Drupal.behaviors.cos_custom.searchBlur);
        $('#block-search-form form').hover(Drupal.behaviors.cos_custom.searchFocus,Drupal.behaviors.cos_custom.searchBlur);
      }

      // Menu opening stuff.
      $('#block-menu_block-1 .depth-1 > a > .link-wrapper, #block-menu_block-1 .depth-2 > a > .link-wrapper').click(function(e) {
        $(this).parent().toggleClass('slide-menu-open').siblings('ul.menu').slideToggle({
          'duration': 300,
          'easing': 'easeInOutQuint'
        });
        e.preventDefault();
      }).hover(function(e) {
        $(this).parent().toggleClass('link-wrapper-hover');
      });

      // Javascript footer mobile switch.
      if ($.cookie('device') && !$('body').is('maintenance-page')) {
        var link_text = '';

        if (Drupal.settings.cos_general.isMobile) {
          link_text = Drupal.t('Switch to Desktop Site');
          Drupal.behaviors.cos_custom.destinationDevice = 'desktop';
        }
        else {
          link_text = Drupal.t('Switch back to Mobile Site');
          Drupal.behaviors.cos_custom.destinationDevice = 'mobile';
        }

        // Find ideal appending location.
        var $append_loc;
        if ($('#footer-bottom-inner').length > 0) {
          $append_loc = $('#footer-bottom-inner');
        }
        else {
          $append_loc = $('#footer');
        }

        // Append mobile switch link to decided location.
        $append_loc.append('<div class="mobile-switch-wrapper"><a id="mobile-switch" href="#" title="' + link_text + '">' + link_text + '</a></div>');
        $('#mobile-switch').click(Drupal.behaviors.cos_custom.mobileSwitch);
      }
    },
    searchFocus:function(e) {
      $(Drupal.behaviors.cos_custom.searchSelector).addClass('search-active');
    },
    searchBlur:function(e) {
      if (!$(this).find('input').length || !$(this).find('input').is(':focus')) {
        $(Drupal.behaviors.cos_custom.searchSelector).removeClass('search-active');
      }
    },
    mobileSwitch:function(e) {
      e.preventDefault();

      $.cookie('device', Drupal.behaviors.cos_custom.destinationDevice, {
        path: '/',
        domain: Drupal.settings.cos_general.cookieDomain
      });
      location.reload(true);
    },
  };
  // TEMP: TOOD: remove this.
  $.removeCookie = function (key, options) {
    if ($.cookie(key) === undefined) {
      return false;
    }

    // Must not alter options, thus extending a fresh object...
    $.cookie(key, '', $.extend({}, options, { expires: -1 }));
    return !$.cookie(key);
  };*/
})(jQuery);

(function ($) {
    Drupal.behaviors.cos_custom = {
    attach: function (context, settings) {
      $('#homepage-dropdown-of-tasks').change(function(){
        var url = $(this).val();
        window.location = url;
      });
    }
  }
})(jQuery);

function printPage() {
    window.print();
}
