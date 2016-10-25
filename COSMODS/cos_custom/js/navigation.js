/**
 * @file
 * Controls main menu navigation functionality.
 */
(function ($) {
  // Expand menu on smaller devices.
  Drupal.behaviors.cosMenu = {
    attach: function (context, settings) {
      $('#nice-menu-2 li.menuparent .submenu-toggle').click(function() {
        $(' + ul', this).toggle();
      });

      $('#nice-menu-2 *').unbind('hover mouseenter mouseleave');

      $("#nice-menu-2 li.menuparent").hover(function() {

      }, function() {
        $('ul', this).slideUp('slow');
      });

      $('.menu-hamburger').click(function() {
        if (!$('body').hasClass('main-menu-open')) {
          $('body').addClass('main-menu-open');
        }
        else {
          if ($('body').hasClass('main-menu-open')) {
            $('body').removeClass('main-menu-open');
          }
        }
      });

      // Determine item width based on window size.
      cosResize();
      navResize();
      $(window).resize(function() {
        cosResize();
        navResize();
      });

      $('#search-icon').click(function() {
        if (!$('body').hasClass('search-open')) {
          $('body').addClass('search-open');
        }
        else {
          if ($('body').hasClass('search-open')) {
            $('body').removeClass('search-open');
          }
        }
      });

      // Expand the front page "featured update" block if clicked.
      $('#block-views-99bc4d3a48011145e9c217f98a52e149 .block-title').click(function() {
        $('#block-views-99bc4d3a48011145e9c217f98a52e149 .content').toggle();

        if (!$(this).hasClass('section-open')) {
          $(this).addClass('section-open');
        }
        else {
          if ($(this).hasClass('section-open')) {
            $(this).removeClass('section-open');
          }
        }
      });

      // Expand the front page "featured update" block if clicked.
      $('#block-views-department_views-promoted_news .block-title').click(function() {
        $('#block-views-department_views-promoted_news .content').toggle();
        if (!$(this).hasClass('section-open')) {
          $(this).addClass('section-open');
        }
        else {
          if ($(this).hasClass('section-open')) {
            $(this).removeClass('section-open');
          }
        }
      });

      // Expand the front page "upcoming events" block if clicked.
      $('#block-views-global_calendar-block_2 .block-title').click(function() {
        $('#block-views-global_calendar-block_2 .content').toggle();
        if (!$(this).hasClass('section-open')) {
          $(this).addClass('section-open');
        }
        else {
          if ($(this).hasClass('section-open')) {
            $(this).removeClass('section-open');
          }
        }
      });

      // Expand the front page "upcoming events" block if clicked.
      $('#block-views-department_calendar-block_2 .block-title').click(function() {
        $('#block-views-department_calendar-block_2 .content').toggle();
        if (!$(this).hasClass('section-open')) {
          $(this).addClass('section-open');
        }
        else {
          if ($(this).hasClass('section-open')) {
            $(this).removeClass('section-open');
          }
        }
      });

      if (window.innerWidth <= 1024 && window.innerWidth >= 620) {
        // Expand the front page "featured update" block if clicked.
        block = $('#block-views-department_views-promoted_news .block-title');
        if (!block.hasClass('section-open')) {
          block.addClass('section-open');
          block.removeClass('section-close');
        }
        else {
          if (block.hasClass('section-open')) {
            block.removeClass('section-open');
            block.addClass('section-close');
          }
        }

        // Expand the front page "featured update" block if clicked.
        block = $('#block-views-99bc4d3a48011145e9c217f98a52e149 .block-title');
        if (!block.hasClass('section-open')) {
          block.addClass('section-open');
          block.removeClass('section-close');
        }
        else {
          if (block.hasClass('section-open')) {
            block.removeClass('section-open');
            block.addClass('section-close');
          }
        }
      }
      else if (window.innerWidth <= 619) {
        // Expand the front page "featured update" block if clicked.
        block = $('#block-views-department_views-promoted_news .block-title');
        if (!block.hasClass('section-close')) {
          block.addClass('section-close');
          block.removeClass('section-open');
        }
        else {
          if (block.hasClass('section-close')) {
            block.removeClass('section-close');
            block.addClass('section-open');
          }
        }

        // Expand the front page "featured update" block if clicked.
        block = $('#block-views-99bc4d3a48011145e9c217f98a52e149 .block-title');
        if (!block.hasClass('section-close')) {
          block.addClass('section-close');
          block.removeClass('section-open');
        }
        else {
          if (block.hasClass('section-close')) {
            block.removeClass('section-close');
            block.addClass('section-open');
          }
        }
      }

      // Toggle the submenus if clicked.
      $('.submenu-toggle-1').unbind('click');
      $('.submenu-toggle-1').click(function(e) {

        e.stopPropagation();

        // Hide all menus that are already expanded.
        $(this).parent().siblings().each(function() {
          $(this).children('ul').hide();
        });

        if (!$(this).hasClass('active')) {
          $(this).addClass('active');
        }
        else {
          if ($(this).hasClass('active')) {
            $(this).removeClass('active');
          }
        }

        $(this).siblings('ul').toggle();
      });

      // Toggle the submenus if clicked.
      $('.submenu-toggle-2').unbind('click');
      $('.submenu-toggle-2').click(function(e) {

        e.stopPropagation();

        // Hide all menus that are already expanded.
        $(this).parent().siblings().each(function() {
          $(this).children('ul').hide();
        });

        if (!$(this).hasClass('active')) {
          $(this).addClass('active');
        }
        else {
          if ($(this).hasClass('active')) {
            $(this).removeClass('active');
          }
        }

        $(this).siblings('ul').toggle();
      });

      $('body').click(function(e) {
        $("#nice-menu-1 ul ul").hide();
      });
    }
  }

  // Move navigation items based on screen size.
  function cosResize() {
    var isIPad = navigator.userAgent.match(/iPad/i) != null;

    if (window.innerWidth <= 1024 || (isIPad && window.innerWidth <= 1030)) {
      if (!$('body').hasClass('move-menu-small')) {
        $('body').addClass('move-menu-small');

        // Attach the menu below the page element.
        $('#main-menu-mobile-wrapper').append($('#nice-menu-1'));

        // Attach site name and secondary menu to wrapper.
        $('#main-menu-mobile-wrapper').append($('#block-delta_blocks-site-name'));
        $('#main-menu-mobile-wrapper').append($('#block-menu-menu-global-portal-links'));

        // Attach offsite links.
        $('#main-menu-mobile-wrapper').append($('#block-menu-menu-offsite-links'));

        // Move the slideshow pager.
        $('.view-id-slider .skin-default').append($('.view-id-slider .views-slideshow-controls-top'));

        // Move the "Upcoming Events" block.
        $('#content-area-inner').append($('#block-views-global_calendar-block_2'));
        $('#content-area-inner').append($('#block-views-department_calendar-block_2'));
      }
    }
    else {
      if ($('body').hasClass('move-menu-small')) {
        $('body').removeClass('move-menu-small');

        // Move the menu back to the header bottom.
        $('.region-header-bottom').prepend($('#nice-menu-1'));

        // Move site name and portal menu back.
        $('.region-header-under').prepend($('#block-menu-menu-global-portal-links'));
        $('.region-header-under').prepend($('#block-delta_blocks-site-name'));

        // Move offsite links back.
        $('.region-header-top').prepend($('#block-menu-menu-offsite-links'));

        // Move the slideshow pager.
        $('.view-id-slider .skin-default').prepend($('.view-id-slider .views-slideshow-controls-top'));

        // Move the "Upcoming Events" block back to its original position.
        $('.region-sidebar-first').append($('#block-views-global_calendar-block_2'));
        $('.region-sidebar-first').append($('#block-views-department_calendar-block_2'));
      }
    }
  }

  // Resize #main-menu-mobile-wrapper to be the height of the page.
  function navResize() {
    if (window.innerWidth <= 800) {
      var body = document.body,
          html = document.documentElement;

      var height = Math.max( body.scrollHeight, body.offsetHeight,
                             html.clientHeight, html.scrollHeight, html.offsetHeight );

      // Set the height. Add 400 for the twitter feed that is generated after.
      $('#main-menu-mobile-wrapper').css('height', height + 'px');
      $('#main-menu-mobile-wrapper').css('height', $('#main-menu-mobile-wrapper').css('height') + height + 'px');
    }
    else {
      $('#main-menu-mobile-wrapper').css('height', 'auto');
    }
  }
})(jQuery);
