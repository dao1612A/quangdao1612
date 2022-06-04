import LazyLoad from "./../library/lazyload.min";
var LazyLoadImage = {
	init : function () {
		(function () {
			function logElementEvent(eventName, element) {
				Date.now(), eventName, element.getAttribute("data-src")
			}
			let ll = new LazyLoad({
				elements_selector: '.lazy',
				load_delay: 300,
				threshold: 0,
				callback_enter: function (element) {

					logElementEvent("ENTERED", element);
				},
				callback_error: function (element) {
					logElementEvent("ERROR", element);
					element.src = "/images/no-image.jpg";
				}
			});
		}());
	}
}
export default LazyLoadImage;