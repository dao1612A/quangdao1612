var TabContent = {
    init : function ()
    {
        this.nextTab()
    },
    nextTab()
    {
        $("body").on("click",".js-tab-nav", function (event){
            event.preventDefault()
            let $this = $(this)
            let $idElement = $this.attr('data-id')
            $('.js-tab-nav').removeClass('active')
            $(".tab-content-item").removeClass('active')
            $this.addClass('active')
            $($idElement).addClass('active')
        })
    }
}
export default TabContent