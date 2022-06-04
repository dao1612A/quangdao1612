import  LazyLoadImage from './../components/lazyload'
var App = {
	init() {
		this.loadJS();
	},
	loadJS()
	{
		if (typeof URL !== undefined) {
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = URL;
			var x = document.getElementsByTagName('head')[0];
			x.appendChild(s);
		}
	}
}
$(function () {
	App.init();
	LazyLoadImage.init();
})