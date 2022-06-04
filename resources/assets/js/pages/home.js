import CoreJs from "./../common/_base";
import Auth from "../components/auth";
import Sidebar from "../components/_inc_sidebar";
import Messages from "../../../js/components/_inc_run_message";
import Delete from "../../../valex/js/components/_inc_delete"

let Home = {
    init() {
        this.clickSearchAdvanced();
    },

    clickSearchAdvanced()
    {
        let $element = $(".js-search-advanced");

        $element.click( function(){
            $("#box-suggest-search").hide();
            $("#box-suggest-search-advanced").show();
        })

        $element.blur( function() {
            $("#box-suggest-search-advanced").hide();
        });
    },
};

$(function () {
    Home.init()
    CoreJs.init()
    Auth.init()
    Sidebar.init()
    Messages.init()
    Delete.init()
});
