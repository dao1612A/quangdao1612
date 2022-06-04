import "./../../library/js/jquery.slim.min";
import "bootstrap-datepicker";
import "./../../library/js/bootstrap.bundle.min";
import "bs4-summernote/dist/summernote"
import "jquery-validation"
import "select2"

var HideCore = {
    init: function () {
        this.runDatePicker()
        this.runSummernote()
        this.processHideCore()
        $('.js-select2-languages').select2();
    },
    processHideCore() {
        $("#formProject").validate({
            rules: {
                "prj_name": {
                    required: true,
                    maxlength: 200,
                    minlength: 10
                },
                "languageCodes": {
                    required: true,
                },
                "prj_deadline": {
                    required: true,
                },
                "prj_description": {
                    required: true,
                },
                "prj_link_facebook": {
                    required: true,
                },
                "prj_name_request": {
                    required: true,
                },
                "prj_phone_request": {
                    required: true,
                },
            },
            messages: {
                "prj_name": {
                    required: "Tên dự án, đồ án, BTL không được để trống",
                    maxlength: "Độ dài tối đa 200 ký tự",
                    minlength: "Độ dài tối thiểu 10 ký tự"
                },
                "languageCodes": {
                    required: "Dữ liệu không được để trống",
                },
                "prj_deadline": {
                    required: "Dữ liệu không được để trống",
                },
                "prj_description": {
                    required: "Dữ liệu không được để trống",
                },
                "prj_link_facebook": {
                    required: "Dữ liệu không được để trống",
                },
                "prj_name_request": {
                    required: "Dữ liệu không được để trống",
                },
                "prj_phone_request": {
                    required: "Dữ liệu không được để trống",
                },
            }
        });
    },
    runDatePicker() {
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            startDate: '-3d'
        });
    },

    runSummernote() {
        $('.summernote').summernote({
            placeholder: 'Nhập mô tả',
            tabsize: 2,
            height: 120,
            width: '100%',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }
}
$(function () {
    HideCore.init()
})