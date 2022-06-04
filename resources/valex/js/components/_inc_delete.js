import Toastr from 'toastr';
import Swal from 'sweetalert2'
var Delete = {
    init : function()
    {
        this.clickDelete()
        this.purchaseProduct()
    },

    clickDelete()
    {
        let _this = this;
        $(".js-delete").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('href')
            if (URL) {
                Swal.fire({
                    title: 'Xoá dữ liệu!',
                    text: 'Bạn có chắc chắn xoá dữ liệu không',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showCancelButton: true,
                    confirmButtonText : "Đồng ý",
                    cancelButtonText : "Huỷ bỏ"
                }).then((result) => {
                    if(result.value) _this.processDelete(URL, $this)
                })
            }
        })
    },
    purchaseProduct()
    {
        let _this = this;
        $(".js-purchase-product").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('href')
            if (URL) {
                Swal.fire({
                    title: 'Mua tài liệu!',
                    text: 'Bạn có chắc chắn mua bộ tài liệu này không',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showCancelButton: true,
                    confirmButtonText : "Đồng ý",
                    cancelButtonText : "Huỷ bỏ"
                }).then((result) => {
                    if(result.value) window.location.href = URL
                })
            }

        })

        $(".js-login").click(function (event){
            event.preventDefault()
            let URL = $(this).attr('data-href')
            if (URL) {
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: 'Đăng nhập để có thể xem nội dung',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showCancelButton: false,
                    confirmButtonText : "Đăng nhập",
                    // cancelButtonText : "Huỷ bỏ"
                }).then((result) => {
                    if(result.value) window.location.href = URL
                })
            }
        })
    },

    processDelete(URL, $element)
    {
        $.ajax({
            url: URL,
            beforeSend: function( xhr ) {

            }
        })
        .done(function( results ) {
            console.log(results)
            if(results.status === 200)
            {
                Toastr.success(results.message)
                $element.parents('tr').remove()
                $element.parents('.tr').remove()
            }else {
                Toastr.error(results.message)
            }

        });
    }
}

export default Delete
