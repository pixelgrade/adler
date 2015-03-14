/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
(function () {
    var container, button, menu;

    container = document.getElementById('site-navigation');
    if (!container) {
        return;
    }

    button = container.getElementsByTagName('button')[0];
    if ('undefined' === typeof button) {
        return;
    }

    menu = container.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    menu.setAttribute('aria-expanded', 'false');

    if (-1 === menu.className.indexOf('nav-menu')) {
        menu.className += ' nav-menu';
    }

    button.onclick = function () {
        if (-1 !== container.className.indexOf('toggled')) {
            container.className = container.className.replace(' toggled', '');
            button.setAttribute('aria-expanded', 'false');
            menu.setAttribute('aria-expanded', 'false');
        } else {
            container.className += ' toggled';
            button.setAttribute('aria-expanded', 'true');
            menu.setAttribute('aria-expanded', 'true');
        }
    };
})();


//Start the JS for down arrow

//this is where we apply opacity to the arrow
(function ($) {
    $(window).scroll(function () {

        //get scroll position
        var topWindow = $(window).scrollTop();
        //multipl by 1.5 so the arrow will become transparent half-way up the page
        var topWindow = topWindow * 1.5;

        //get height of window
        var windowHeight = $(window).height();

        //set position as percentage of how far the user has scrolled
        var position = topWindow / windowHeight;
        //invert the percentage
        position = 1 - position;

        //define arrow opacity as based on how far up the page the user has scrolled
        //no scrolling = 1, half-way up the page = 0
        $('.arrow-wrap').css('opacity', position);

    });

    $(document).ready(function () {

        function filterPath(string) {
            return string
                .replace(/^\//, '')
                .replace(/(index|default).[a-zA-Z]{3,4}$/, '')
                .replace(/\/$/, '');
        }

        var locationPath = filterPath(location.pathname);
        var scrollElem = scrollableElement('html', 'body');

        $('a[href*=#]').each(function () {
            var thisPath = filterPath(this.pathname) || locationPath;
            if (locationPath == thisPath
                && (location.hostname == this.hostname || !this.hostname)
                && this.hash.replace(/#/, '')) {
                var $target = $(this.hash), target = this.hash;
                if (target) {
                    var targetOffset = $target.offset().top;
                    $(this).click(function (event) {
                        event.preventDefault();
                        $(scrollElem).animate({scrollTop: targetOffset}, 400, function () {
                            location.hash = target;
                        });
                    });
                }
            }
        });

        // use the first element that is "scrollable"
        function scrollableElement(els) {
            for (var i = 0, argLength = arguments.length; i < argLength; i++) {
                var el = arguments[i],
                    $scrollElement = $(el);
                if ($scrollElement.scrollTop() > 0) {
                    return el;
                } else {
                    $scrollElement.scrollTop(1);
                    var isScrollable = $scrollElement.scrollTop() > 0;
                    $scrollElement.scrollTop(0);
                    if (isScrollable) {
                        return el;
                    }
                }
            }
            return [];
        }

    });

})(jQuery);