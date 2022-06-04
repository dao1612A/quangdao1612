import RunSelect2 from "../helpers/run_select2";
import PriceJs from "../components/_inc_price";
import 'bootstrap-fileinput'
import * as moment from 'moment';
import "jquery-datetimepicker/build/jquery.datetimepicker.full.min";
import Messages from "../../../js/components/_inc_run_message";
import Buses from "../components/buses";

import Delete from "../../../valex/js/components/_inc_delete"
import TabContent from "../components/_inc_tab_content";
import Vote from "../components/_inc_vote";

var AppUser = {
    init: function () {
        this.runInputImages()
        this.showSidebar()
        this.initDateTime()
        this.showAction()
        this.add()
        this.showDropMenuUser()
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    },
    showAction()
    {
        $(".js-show-dropdown").click(function (event){
            event.preventDefault()
            $(this).next().slideToggle()
        })
    },
    showSidebar() {
        $(".js-show-sidebar-account").click(function (event) {
            event.preventDefault()
            let $sidebar = $(".users-sidebars")
            if ($sidebar.hasClass('active')) {
                $sidebar.removeClass('active')
            } else {
                $sidebar.addClass('active')
            }
        })
    },

    add()
    {
        let _this = this
        $("body").on("click",".js-add", function (event){
            event.preventDefault()
            let $this = $(this)
            let $box = $this.parents('.card')
            let $itemClone = $box.find(".copy").clone()
            $this.before($itemClone.removeClass('copy'))
            _this.initDateTime()
            let URL = $this.attr('href')
            $.ajax({
                url:      URL,
                type:     $(this).attr('method'),
                success: function(response) {
                    $this.before($(response))
                    RunSelect2.init()
                    _this.initDateTime()
                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });
        })
    },

    initDateTime() {
        jQuery.datetimepicker.setLocale('vi');
        jQuery.datetimepicker.setDateFormatter({
            parseDate: function (date, format) {
                var d = moment(date, format);
                return d.isValid() ? d.toDate() : false;
            },
            formatDate: function (date, format) {
                return moment(date).format(format);
            }
        });
        $('.datetimepicker').datetimepicker({
            format: "YYYY-M-D H:m:0",
            formatTime: 'H:m',
            formatDate: 'Y-m-d',
            step: 30,
        });
    },

    showDropMenuUser()
    {
        $(".js-show-drop-menu").click( function (event){
            event.preventDefault()
            $(".drop-menu-user-header").slideToggle();
        })
    },

    runInputImages() {
        $(".albums").fileinput({
            maxFileCount: 3,
            theme: 'fas',
        });
    }
}

$(function () {
    RunSelect2.init()
    PriceJs.init()
    AppUser.init()
    Messages.init()
    Buses.init()
    Delete.init()
    TabContent.init()
    Vote.init()
})