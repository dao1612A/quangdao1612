import '../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js'
import * as moment from 'moment';
import '../../assets/plugins/rating/jquery.rating-stars.js'
import '../../assets/plugins/rating/jquery.barrating.js'
import '../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'
import '../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js'
import '../../assets/plugins/sidebar/sidebar.js'
import '../../assets/plugins/sidebar/sidebar-custom.js'
import '../../assets/plugins/sumoselect/jquery.sumoselect.js'
import '../../assets/plugins/select2/js/select2.min'

import '../../assets/js/sticky.js'
import '../../assets/js/custom.js'
import '../../assets/plugins/side-menu/sidemenu.js'
import '../../assets/switcher/js/switcher.js'
import '../../assets/js/advanced-form-elements.js'

import FilepondUpload from '../components/_init_filepond.js'
import SEO from '../components/_inc_seo.js'
import Messages from "../../../js/components/_inc_run_message";
import Delete from "../components/_inc_delete"
import Course from "../components/_inc_course";
import PriceJs from "../components/_inc_price";
import ConfigLink from "../components/_inc_links";

$(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    FilepondUpload.inti()
    SEO.init()
    PriceJs.init()
    Course.init()
    Delete.init()
    Messages.init()
    ConfigLink.init()

    $(".js-type-navbar").off('click').on('click',function (){
        let $this = $(this)
        let URL = $this.attr('data-url')
        $.ajax(URL, {
            method: "GET",
            cache: true,
            beforeSend: function(){

            },
            success: function (results) {
                $("#dataType").html(results)
                $('body .js-sumo-select').SumoSelect();
            },
            error: function () {
                console.log('Errors load article_content');
            }
        });
    })
})
