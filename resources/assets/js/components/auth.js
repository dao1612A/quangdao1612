import "jquery-validation"

var Auth = {
    init: function () {
        this.register()
        this.login()
    },

    register() {
        $("#formRegister").validate({
            rules: {
                // "email": {
                //     required: true,
                //     maxlength: 100,
                //     minlength: 5
                // },
                "password": {
                    required: true,
                },
                "name": {
                    required: true,
                },
                "phone": {
                    required: true,
                },
            },
            messages: {
                // "email": {
                //     required: "Dữ liệu không được để trống",
                //     maxlength: "Độ dài tối đa 100 ký tự",
                //     minlength: "Độ dài tối thiểu 5 ký tự"
                // },
                "password": {
                    required: "Dữ liệu không được để trống",
                },
                "name": {
                    required: "Dữ liệu không được để trống",
                },
                "phone": {
                    required: "Dữ liệu không được để trống",
                },
            }
        });
    },
    login() {
        $("#formLogin").validate({
            rules: {
                // "email": {
                //     required: true,
                //     maxlength: 100,
                //     minlength: 5
                // },
                "password": {
                    required: true,
                },
                "phone": {
                    required: true,
                },
            },
            messages: {
                // "email": {
                //     required: "Dữ liệu không được để trống",
                //     maxlength: "Độ dài tối đa 100 ký tự",
                //     minlength: "Độ dài tối thiểu 5 ký tự"
                // },
                "password": {
                    required: "Dữ liệu không được để trống",
                },
                "phone": {
                    required: "Dữ liệu không được để trống",
                }
            }
        });
    },
}

export default Auth