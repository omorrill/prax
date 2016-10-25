/**
 * @file
 * Javascript responsive styling.
 */
(function ($) {
  // Adjust the slideshow based on screen size.
  Drupal.behaviors.pcaSlideshow = {
    attach: function (context, settings) {
      var allSlides = $(".views_slideshow_cycle_main .views-slideshow-cycle-main-frame-row");
      var aspectRatio = 0.45;
      pca_adjust_slideshow(aspectRatio, allSlides);

      $(window).resize(function() {
        pca_adjust_slideshow(aspectRatio, allSlides);
      });
    }
  };

  /**
   * Adjusts the main slideshow to match the screen size.
   */
  pca_adjust_slideshow = function(aspectRatio, allSlides) {
    // Adjust slideshow.
    var newWidth = $('.views_slideshow_cycle_main .views-slideshow-cycle-main-frame-row').parent().width();
    allSlides.each(function() {
      $(this).width('100%').height(newWidth * aspectRatio);
      $(this).parent().attr('width', '100%');
      $(this).parent().attr('height', $(this).height()  + 'px');
      $(this).parent().css('width', '100%');
      $(this).parent().css('height', $(this).height() + 'px');
    });

    $('.views_slideshow_cycle_main').css('height', (newWidth * aspectRatio) + 'px');
    $('.views_slideshow_cycle_main').css('width', '100%');
  }
})(jQuery);
