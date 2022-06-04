var Select2CV = {
    init(){
        this.runSelect2();
    },
    runSelect2() {
        $(".keyword-exists").select2({
            containerCssClass: 'multiple-select2-container',
            dropdownCssClass: 'conha-select2-dropdown',
            placeholder: 'Chọn các từ khóa',
            allowClear: true
        });
        $(".keyword-must").select2({
            containerCssClass: 'multiple-select2-container',
            dropdownCssClass: 'conha-select2-dropdown',
            placeholder: 'Chọn các từ khóa',
            allowClear: true
        });
        $(".keyword-not").select2({
            containerCssClass: 'multiple-select2-container',
            dropdownCssClass: 'conha-select2-dropdown',
            placeholder: 'Chọn các từ khóa',
            allowClear: true
        });
    },
};

$(function () {
    Select2CV.init();
});
