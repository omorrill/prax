(function ($) {
    Drupal.behaviors.city = {
    attach: function (context, settings) {
      $('.carousel-inner div:first-child').addClass('active');
      $('#hero').backstretch("https://coloradosprings.gov/sites/default/files/pikes.peak_.original.png");
      $('#block-menu-menu-top-links').removeClass('clearfix');
      //$('#block-city-departments').removeClass('clearfix').addClass('pull-right');
      $('#block-menu-menu-top-links ul.menu li:nth-child(3) a').prepend('<span class="glyphicon glyphicon-globe"></span> ');
      $('#block-menu-menu-top-links ul.menu li:nth-child(2) a').prepend('<span class="glyphicon glyphicon-phone-alt"></span> ');
      $('#main-menu-toggle').append('<span style="font-size:small;">Main Menu</span>');
      $('#block-menu-menu-top-links ul.nav li a').click(function(event) {
        event.preventDefault(); // We're taking over the top links so that we can make them into modals, or something.
      });

      // This is to setup the modal for the customer service stuff.
      $('#block-menu-menu-top-links ul.nav li:nth-child(2) a').attr('data-toggle', 'modal').attr('data-target', '#customer-service-modal').attr('href', '');
      $('#block-menu-menu-top-links ul.nav li:nth-child(3) a').attr('data-toggle', 'modal').attr('data-target', '#departments-modal').attr('href', '');

      // This does the text-resize thing.
      $('#block-menu-menu-top-links ul.nav li:nth-child(1) a').click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
           // odd clicks
           $('body').addClass('regular-font').removeClass('large-font');
        } else {
           // even clicks
           $('body').removeClass('regular-font').addClass('large-font');
        }
        $(this).data("clicks", !clicks);
      });
    }
  }
})(jQuery);
