var Article = {
	init : function () {
		this.loadArticleItem();
		this.addFixWidget();
		this.addFixSidebarRightArticle();
        this.scrollFixTopSidebar();
	},

    scrollFixTopSidebar()
    {
        let $boxFix = $("#box-fix-top");
        if ($boxFix.length > 0) {
            $(window).scroll(function(){
                if ($(window).scrollTop() >= 150) {
                    $boxFix.addClass('fix-top-mb')      
                }
                else {
                    $boxFix.removeClass('fix-top-mb')        
                }
            });
        }
    },

	addFixSidebarRightArticle()
	{
		let $articleContent = $("#container_article_detail");
		let $content = $("#article_content");
		let $sidebarRight = $("#article_sidebar_right");

		// Tinh width
		let widthSidebar = $articleContent.innerWidth() - $content.innerWidth() ;
		// Tính padding
		let widthBro = $(window).width();
		let widthWebsite = $("#wrapper").innerWidth();
		let paddingSidebar = (widthBro - widthWebsite) / 2;
		if (widthBro > 980) {
			$sidebarRight.css({
				'width' : (widthSidebar) + 'px',
				'right' : paddingSidebar + 15,
				'position': 'fixed'
			})
		}
	},

	addFixWidget()
	{
		$(".js-wedget").click( function (event) {
			event.preventDefault();
			let widget = $(".widget-toc");
			if (widget.hasClass('fix')) {
				widget.removeClass('fix')
			}else {
				widget.addClass('fix');
			}
		})
	},

	loadArticleItem()
	{
		let _this = this;
		$("body").on("click",".js-article-load", function (event) {
			event.preventDefault();
			$("body .js-article-load").removeClass('active');
			let $this = $(this);
			$this.addClass('active');
			let URL   = $this.attr('href');
			let LINK  = $this.attr('data-link');
			if (URL && LINK) {
				$.ajax(LINK, {
					method: "GET",
					cache: true,
					// async: false,
					beforeSend: function(){

					},
					success: function (results) {
						if (results.code === 404) {
							alert(" Empty ");
							return false;
						}
						$("#article_detail").html(results.html);
						history.pushState(results, results.article.a_name, URL)
						document.title = results.article.a_name;
						_this.loadGists($("body #article_detail"));
					},
					error: function () {
						console.log('Errors load article_content');
					}
				});
			}
		})

		// … find all gist scripts inside the ajax container
	},

	loadGists($element = '')
	{
		let _this = this;
		if ($element) {
			let $gists = $element.find('script[src^="https://gist.github.com/"]');
			if( $gists.length ){
				// update each gist
				$gists.each(function(){
					// we need to store $this for the callback
					var $this = $(this);
					// load gist as json instead with a jsonp request
					$.getJSON( $this.attr('src') + 'on?callback=?', function( data ) {
						// replace script with gist html
						$this.replaceWith( $( data.div ) );
						// load the stylesheet, but only once…
						_this.add_stylesheet_once(  data.stylesheet )
					});
				});
			}
		}
	},

	add_stylesheet_once( url ){
		let $head = $('head');
		if( $head.find('link[rel="stylesheet"][href="'+url+'"]').length < 1 )
			$head.append('<link rel="stylesheet" href="'+ url +'" type="text/css" />');
	}
}

export default Article;