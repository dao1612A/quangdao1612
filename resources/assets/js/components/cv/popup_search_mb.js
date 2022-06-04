var PopupSearch = {
    init(){
        this.runSelect2();
    },
    runSelect2() {
        let form_search_mb = $(".form-search-mb");
        $(".js-input-mb").click(function () {
            form_search_mb.css('left', 0);
        });
        $(".js-btn-cancel").click(function () {
            form_search_mb.css('left', '-100%');
        });
    },
};

$(function () {
    PopupSearch.init();
});