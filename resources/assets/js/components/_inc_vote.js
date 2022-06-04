var Vote = {
    init : function ()
    {
        this.focusStar()
    },
    focusStar()
    {
        let $boxStart = $('.box-vote-item')
        $boxStart.each( function (){
            let $this = $(this)
            let $item = $this.find(".custom-star")
            $item.mouseover(function () {
                let $that = $(this);
                let $i = $that.attr('data-i');
                $item.removeClass('selected fa-star fa-star-o');
                $item.each(function (key, value) {
                    console.log($i)
                    let $_this = $(this)
                    if (key + 1 <= $i) {
                        $_this.addClass('selected fa-star')
                    }else {
                        $_this.addClass('fa-star-o')
                    }
                })
                let textVote = $that.attr('data-rating-text')
                $that.parents('.box-vote-item').find(".number_vote").val($i)
                $that.parents('.box-vote').find("span").text(textVote)
            })
        })
    }
}
export default Vote