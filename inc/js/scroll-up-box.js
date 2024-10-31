(function($) {

  $(window).bind("scroll", function() {

    if ($(this).width() > 520) {

        if ($(this).scrollTop() > 520) {

            $(".oxsn_scroll_up_box").fadeIn();

        } else {

            $(".oxsn_scroll_up_box").stop().fadeOut();

        }

    }

  });

  $(".oxsn_scroll_up_box").click(function () {

    $("html, body").animate({scrollTop: $("html").offset().top}, 500);

  });

})(jQuery);