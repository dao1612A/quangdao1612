var ConfigLink = {
    init : function ()
    {
        this.addItem()
    },
    addItem()
    {
        console.log('init')
        $(".js-add-group").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let $boxClone = $(".box-clone").clone()
            $this.before($boxClone.removeClass('box-clone'))
        })
    }
}

export default ConfigLink