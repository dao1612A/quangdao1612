import CoreJs from "./../common/_base";
import "jquery-modal/jquery.modal.min";
import Ticket from "../components/_inc_book_ticket";
import RunSelect2 from "../helpers/run_select2";
import TabContent from "../components/_inc_tab_content";
import "@chenfengyuan/datepicker";
import "@chenfengyuan/datepicker/i18n/datepicker.vi-VN";
import Sidebar from "../components/_inc_sidebar";

let Search = {
    init() {
        this.renderMoreInfo();
        this.showSidebar();
        this.showFilterSearch()
        this.closeSidebarFilter()
        this.showFilterSort()
        this.runDate()
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

    showFilterSearch() {
        $(".js-show-filter").click(function (event) {
            event.preventDefault()
            let $boxFilter = $(".js-box-show-filter")
            if ($boxFilter.hasClass('active')) {
                $boxFilter.removeClass('active')
                $("body").removeClass('not-scroll')
            } else {
                $boxFilter.addClass('active')
                $("body").addClass('not-scroll')
            }
        })
    },

    showFilterSort()
    {
        $(".js-show-filter-sort").click(function (event){
            event.preventDefault()
            $(".drop-down-filter").slideToggle();
        })
    },

    runDate()
    {
        $('[data-toggle="datepicker"]').datepicker({
            language: 'vi-VN',
            format: 'yyyy-mm-dd'
        });
    },

    closeSidebarFilter()
    {
        $('.js-close-filter').click(function (event){
            event.preventDefault()
            console.log("click")
            $(".js-show-filter").trigger('click')
        })
    },

    renderMoreInfo() {
        let $project = $(".project"),
            $quick_view = $('.js-quick-view'),
            $right = $('.search-page__box-sidebar');

        var check = true;
        $quick_view.click(function (e) {
            e.preventDefault();
            if (check) {
                let pj_id = $(this).attr('data-id');
                $project.removeClass('pj-active');
                $(this).parents('.project').addClass('pj-active');

                $('.box-quick-view').hide();
                let $candiate_info = $(".box-quick-view-" + pj_id);
                if ($candiate_info.length > 0) {
                    $candiate_info.show();
                } else {
                    $.ajax({
                        type: 'GET',
                        url: URL_PROJECT_INFO,
                        data: {
                            pj_id: pj_id
                        },
                        sync: false,
                        beforeSend: function () {
                            $('.timeline-wrapper').show();
                            check = false;
                        },
                        success: function (data) {
                            $right.append(data.html);
                        },
                        complete: function () {
                            $('.timeline-wrapper').hide();
                            check = true;
                        },
                        dataType: 'json'
                    });
                }
            }
        });
        $('body').on('click', '.js-pj-close', function (e) {
            e.preventDefault();
            $('.box-quick-view').hide();
            $project.removeClass('pj-active');
        });
    },
    showEstateDetail() {
        $('body').on("click", ".js-quick-view", function (event) {
            event.preventDefault()
            let $this = $(this);
            let URL = $this.attr('href');
            let title = $this.attr('title');
            let key = $this.attr('data-key')

            history.pushState({}, title, URL);
            document.title = title;
            $.ajax({
                url: URL,
                data: {
                    key: key
                },
                dataType: 'html',
            }).done(function (results) {
                let content = JSON.parse(results);
                if (content.html) {
                    $("#html-content-quick-view").html(content.html);
                    CoreJs.init();
                }
            });
        });
    }

};

$(function () {
    CoreJs.init()
    Search.init()
    Ticket.init()
    RunSelect2.init()
    TabContent.init()
    Sidebar.init()
});
