  // /* ====== Search Overlay Logic ====== */
  (function ($) {

    var isOpen = false,
        $overlay = $('.overlay--search');

    // update overlay position (if it's open) on window.resize
    $(window).on('resize', function () {

      windowWidth = $(window).outerWidth();

      if (isOpen) {
        $overlay.css('left', -1 * windowWidth);
      }

    });

    /**
     * dismiss overlay
     */

    function closeOverlay() {

      if (!isOpen) {
        return;
      }

      var offset;

      // we don't need a timeline for this animations so we'll use a simple tween between two states
      $overlay.css('left', 0);

      // remove focus from the search field
      $overlay.find('input').blur();

      isOpen = false;
    }

    function escOverlay(e) {
      if (e.keyCode == 27) {
        closeOverlay();
      }
    }

    // create animation and run it on
    $('.nav__item--search').on('click touchstart', function (e) {
      // prevent default behavior and stop propagation
      e.preventDefault();
      e.stopPropagation();

      // if through some kind of sorcery the navigation drawer is already open return
      if (isOpen) {
        return;
      }

      var offset;

      // automatically focus the search field so the user can type right away
      $overlay.find('input').focus();
      $overlay.css('left', '');

      // bind overlay dismissal to escape key
      $(document).on('keyup', escOverlay);

      isOpen = true;
    });

    // create function to hide the search overlay and bind it to the click event
    $('.overlay__close').on('click touchstart', function (e) {

      e.preventDefault();
      e.stopPropagation();

      closeOverlay();

      // unbind overlay dismissal from escape key
      $(document).off('keyup', escOverlay);

    });

})(jQuery);