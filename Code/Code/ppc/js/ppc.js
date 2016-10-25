(function ($) {
  Drupal.behaviors.ppc = {
    attach:function (context) {
      $('.carousel').carousel({
        interval: 8000
      })
      $(".menu li").hover(
        function ()
        {
            $(this).addClass("open");
        },
        function ()
        {
            $(this).removeClass("open");
        }
      );
      $('.highlighted-article-1').hover(
        function () {
          $('.highlighted-article-1').addClass('highlighted-article-hover');
        },
        function () {
          $('.highlighted-article-1').removeClass('highlighted-article-hover');
        }
      );
      $('.highlighted-article-2').hover(
        function () {
          $('.highlighted-article-2').addClass('highlighted-article-hover');
        },
        function () {
          $('.highlighted-article-2').removeClass('highlighted-article-hover');
        }
      );
      $('.highlighted-article-3').hover(
        function () {
          $('.highlighted-article-3').addClass('highlighted-article-hover');
        },
        function () {
          $('.highlighted-article-3').removeClass('highlighted-article-hover');
        }
      );
    }
  };
})(jQuery);
