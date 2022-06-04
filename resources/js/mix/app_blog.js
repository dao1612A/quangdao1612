import Search from "../components/search";
import './../library/jquery.app';
import Article from "../components/article";
import "./../components/prism"

$(function () {
	Search.init();
	Article.init();
})