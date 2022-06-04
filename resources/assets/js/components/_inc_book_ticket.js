var Ticket = {
    init : function (){
        this.showFormTicket()
    },

    showFormTicket()
    {
        $(".js-book-ticket").click(function (event){
            event.preventDefault()
        })
    }
}

export default Ticket
