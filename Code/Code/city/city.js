(function($, Drupal)
{
  // I want some code to run on page load, so I use Drupal.behaviors
  Drupal.behaviors.searchResults = {
    attach:function()
    {
      $("#block-city-departments .content select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
    }
  };
}(jQuery, Drupal));

(function ($) {
  Drupal.behaviors.city = {
    attach:function (context) {
      $('#block-city-cos_general_route_planner .form-submit').bind('click',function() {
        var from = $('#block-city-cos_general_route_planner input.from-location');
        var to = $('#block-city-cos_general_route_planner input.to-location');
        from = from.val() + " Colorado Springs CO";
        to = to.val() + " Colorado Springs CO";
        to = to.replace(/\s+/g, '+');
        from = from.replace(/\s+/g, '+');
        window.open("https://maps.google.com/maps?saddr=" + from + "&daddr=" + to + "&dirflg=r");
      });
      $('#google_translate_element').css('margin-left', '17%');

      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT, gaTrack: true, gaId: 'UA-48381610-1'}, 'google_translate_element');
      }
    }
  };
})(jQuery);
