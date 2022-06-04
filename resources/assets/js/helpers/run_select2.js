import  'select2/dist/js/select2.full.min'

var RunSelect2 = {
    element : '.js-select2',
    dropdownCssClass : 'conha-select2-dropdown',
    init : function(options = {}) {
        let that = this;
        if (typeof options.element !== undefined) {
            that.element = options.element;
        }

        $('.js-select2').select2({
            containerCssClass: 'conha-district-select2-container',
            dropdownCssClass: 'conha-district-select2-dropdown',
        });


        $(that.element).select2({
            containerCssClass: 'conha-select2-container',
            dropdownCssClass: 'conha-select2-dropdown',
        });
    }
}

export default RunSelect2;
