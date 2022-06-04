import LazyLoad from './../library/lazyload.min.js';
var CoreJs = {
    init : function () {
        console.log('[init lazy]')
        this.lazyLoadImage();

    },

    lazyLoadImage()
    {
        (function () {

            function logElementEvent(eventName, element) {

                Date.now(), eventName, element.getAttribute("data-src")
            }

            let ll = new LazyLoad({
                elements_selector: '.lazy',
                load_delay: 500,
                threshold: 0,
                callback_enter: function (element) {

                    logElementEvent("ENTERED", element);
                },
                callback_load: function (element) {
                    logElementEvent("LOADED", element);
                },
                callback_set: function (element) {
                    logElementEvent("SET", element);
                },
                callback_error: function (element) {
                    logElementEvent("ERROR", element);
                    // element.src = "";
                }
            });

            $(".card-img-top").show();
        }());
    }
}

export default CoreJs
