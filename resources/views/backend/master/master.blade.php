<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<base href="{{ asset('backend') }}/">

	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="Awesome/css/all.css">
</head>
<body>
	<!-- header -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>vietpro </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> @if (Auth::check())
							{{ Auth::user()->name }}
						@endif <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu"><li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
						<li><a href="{{ asset('admin') }}/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<!-- header -->
	<!-- sidebar left-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
               		<ul class="nav menu">
			<li class="active"><a href="{{ asset('admin') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
			<li><a href="{{ asset('admin') }}/category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
			<li><a href="{{ asset('admin') }}/product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
			<li><a href="{{ asset('admin') }}/order"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="{{ asset('admin') }}/user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
		
		</ul>

	</div>
	<!--/. end sidebar left-->

	<!--main-->
	@yield('content')
	<!--end main-->

	@section('script')
	<!-- javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	{{-- <script src="js/chart-data.js"></script> --}}
	@show
	
</body>

</html>