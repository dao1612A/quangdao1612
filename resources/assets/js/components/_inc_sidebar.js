var Sidebar = {
    init : function ()
    {
        this.showSidebar()
        this.showCategoryMobile()
        this.showDropMenuUser()
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

            let $globalSidebar = $(".global-sidebar")
            $globalSidebar.find(".header-menu[data-type='category']").show()
            if ($globalSidebar.hasClass('active')) {
                $globalSidebar.removeClass('active')
            } else {
                $globalSidebar.addClass('active')
            }
        })
    },

    showCategoryMobile()
    {
        $(".js-show-category").click( function (event){
            event.preventDefault()
            let $globalSidebar = $(".global-sidebar")
            $globalSidebar.find(".header-menu[data-type='category']").show()
            if ($globalSidebar.hasClass('active')) {
                $globalSidebar.removeClass('active')
            } else {
                $globalSidebar.addClass('active')
            }
        })
    },

    showDropMenuUser()
    {
        $(".js-show-drop-menu").click( function (event){
            event.preventDefault()
            $(".drop-menu-user-header").slideToggle();
        })
    }
}

export default Sidebar