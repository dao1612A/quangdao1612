let SideBarMB = {
    init() {
        this.showNavigationBottom();
        this.modalMenuAction();
    },
    modalMenuAction(){
        $('.js-menu').click(function (e) {
            e.preventDefault();
            $("#js-action-popup").fadeIn();
            $(".wrapper-mb").show();
            $('html').addClass('no-scroll');
        });
        $('.wrapper-mb').click(function (e) {
            e.preventDefault();
            $("#js-action-popup").hide();
            $(".wrapper-mb").hide();
            $('html').removeClass('no-scroll');
        });
    },
    showNavigationBottom() {
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('#action-box-mb').outerHeight();

        $(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 150);

        function hasScrolled() {
            var st = $(window).scrollTop();

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                $('#action-box-mb').addClass('action-box-up');
            } else {
                // Scroll Up
                if (st + $(window).height() < $(document).height()) {
                    $('#action-box-mb').removeClass('action-box-up');
                }
            }
            lastScrollTop = st;
        }
    }
};

let SideBarRight = {
    init() {
        this.showSidebar();
    },
    showSidebar(){
        $('.js-show-sidebar').click(function (e) {
            e.preventDefault();
            $(".sidebar-overlay-mb").show();
            $(".sidebar-wrapper-mb").show();
            $(".sidebar-contain").css('right', '0');
            $('html').addClass('no-scroll');
        });
        $('.sidebar-wrapper-mb').click(function (e) {
            //e.preventDefault();
            $(".sidebar-overlay-mb").fadeOut();
            $(".sidebar-wrapper-mb").hide();
            $(".sidebar-contain").css('right', '-320px');
            $('html').removeClass('no-scroll');
        });
    },
};

$(function () {
    SideBarMB.init();
    SideBarRight.init();
});