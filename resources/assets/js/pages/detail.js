import CoreJs from "./../common/_base";
import TabContent from "../components/_inc_tab_content";
import "@chenfengyuan/datepicker";
import "@chenfengyuan/datepicker/i18n/datepicker.vi-VN";
import Sidebar from "../components/_inc_sidebar";
let Detail = {
    init() {
        this.checkTicket()
        $('[data-toggle="datepicker"]').datepicker({
            language: 'vi-VN',
            format: 'yyyy-mm-dd',
            autoHide : true,
            startDate :  new Date()
        });
        this.checkRenderTicket()
        this.onLoadClickTicket()
        this.pickHomeTicket()
    },

    checkRenderTicket()
    {
        $("#date-ticket").change( function (event){
            let $this = $(this)
            let URL = $this.attr('data-url')
            let date = $this.val()
            $("#lists-ticket").html()
            $.ajax(URL, {
                method: "GET",
                cache: true,
                data : {
                    date : date
                },
                beforeSend: function( xhr ) {
                    $(".js-loading-1").show()
                    $("#lists-ticket .item").hide()
                },
                success: function (results) {
                    $("#lists-ticket").html(results)
                    $("body #lists-ticket .item").show()
                    // $(".js-loading-1").hide()
                },
                error: function () {
                    console.log('Errors load article_content');
                }
            });
        })
    },

    checkTicket()
    {
        let $ticket = $(".js-item-ticker")
        $ticket.map( function (){
            let $this = $(this)
            if($this.is(":checked")) {
                $this.attr('disabled','disabled')
            }
        })
    },
    pickHomeTicket()
    {
        $(".js-pick-home").click(function (event){
            let $this = $(this)
            let $input = $this.find('input');
            let $boxPickHome = $(".js-box-pick-home")
            if($input.prop("checked") === true){
                $boxPickHome.show()
                $boxPickHome.find("input").prop("disabled", false)
            }
            else if($input.prop("checked") === false){
                $boxPickHome.hide()
                $boxPickHome.find("input").prop("disabled", true)
            }
        })
    },

    onLoadClickTicket()
    {
        $("body").on("click",".js-item-add", function(){
            let $this = $(this)
            if($this.prop("checked") === true){
                $this.parents('.js-add-ticket').addClass('active')
            }
            else if($this.prop("checked") === false){
                $this.parents('.js-add-ticket').removeClass('active')
            }
        })
    }
};

$(function () {
    CoreJs.init();
    Detail.init();
    TabContent.init()
    Sidebar.init()
});
