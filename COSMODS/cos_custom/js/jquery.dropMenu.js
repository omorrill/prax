(function ($) {
  // Drop menu function.
  $.fn.dropMenu = function(toggle_selector) {
    // General initiation of drop menu toggles.
    var $toggle = $(toggle_selector);
    var $content = $toggle.siblings('ul.menu');
    var animationSpeed = 300;

    // Click handlers for toggle.
    $toggle.click(function() {
      var $this = $(this),
      $thisContent = $this.siblings('ul.menu');

      if (!$(this).is('.toggle-active')) {
        // Hide all others.
        $toggle.removeClass('toggle-active');
        $content.removeClass('toggle-active');
        $content.fadeOut(animationSpeed);

        // Show this one.
        $this.addClass('toggle-active');
        $thisContent.addClass('toggle-active');
        $thisContent.fadeIn(animationSpeed - 100);
      }
      else {
        $this.removeClass('toggle-active');
        $thisContent.removeClass('toggle-active');
        $thisContent.fadeOut(animationSpeed);
      }
      return false;
    });

    // Don't hide the drop down if the drop menu contents are clicked on.
    $content.click(function(e) {
      e.stopPropagation();
    });

    // Hide the drop down contents when user clicks outside of one.
    $(document.body).click(function() {
      $toggle.removeClass('toggle-active');
      $content.fadeOut(animationSpeed);
    });
  };
})(jQuery);
