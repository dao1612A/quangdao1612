var Footer = {
    init() {
        this.showHideItem();
    },
    showHideItem(){
        $('.footer__tabs .item').click(function (e) {
            //e.preventDefault();
            $(".js-content").hide();
            $(this).find('.js-content').fadeIn();
        });
    }
};

$(function () {
    Footer.init();
});