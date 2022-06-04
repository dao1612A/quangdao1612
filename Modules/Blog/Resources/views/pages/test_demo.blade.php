<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tạo menu 2 cập bằng jquery</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
		#menu ul > li > ul {
			display: none;
		}

		#menu ul > li > ul.active {
			display: block;
		}

		#menu ul a {
			display: block;
		}

		#menu ul a span {
			float: right;
		}
	</style>
</head>
<body>
<div class="container pt-5">
	<div class="row">
		<div class="col-sm-4">
			<h3>Danh mục sản phẩm</h3>
			<div id="menu">
				<ul>
					<li>
						<a href="">Điện thoại <span class="fa fa-angle-right"></span></a>
						<ul>
							<li><a href="">Iphone</a></li>
							<li><a href="">Samsung</a></li>
						</ul>
					</li>
					<li>
						<a href="">Đồ gia dụng <span class="fa fa-angle-right"></span></a>
						<ul>
							<li><a href="">Tủ lạnh</a></li>
							<li><a href="">Máy giặt</a></li>
						</ul>
					</li>
					<li><a href="">Đồ cũ</a></li>
					<li>
						<a href="">Mạng <span class="fa fa-angle-right"></span></a>
						<ul>
							<li><a href="">Wifi</a></li>
							<li><a href="">Dây mạng</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-8">
			<h3>Nội dung</h3>
		</div>
	</div>
</div>
</body>
<script>
	$(function () {
		// Click menu cấp 1
		$("#menu > ul > li").click(function (event) {
			event.preventDefault();
			event.stopPropagation();
			let $subMenu = $(this).find(" > ul");

			if ($subMenu.hasClass('active')) {
				$subMenu.removeClass('active').slideUp();
				$(this).find("span").removeClass("fa-angle-down").addClass("fa-angle-right")
			} else {
				$subMenu.slideDown().addClass('active');
				$(this).find("span").addClass("fa-angle-down").removeClass("fa-angle-right")
			}

		})
	})
</script>
</html>