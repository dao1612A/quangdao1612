var Report = {
    init() {
        this.showModalReport();
        this.activeOption();
    },
    showModalReport() {
        $('body').on('click', '.js-report', function (e) {
            e.preventDefault();
            $('body #js-report-cv').modal({
                clickClose: true,
                closeText: '<i class="la la-times"></i>'
            });
        })
    },
    activeOption(){
        let $option = $('body .option-report');
        $option.on('click', 'span', function (e) {
            e.preventDefault();
            $(".option-report span").removeClass('active');
            $(this).addClass('active');
        });
    }
};

$(function () {
    Report.init();
});