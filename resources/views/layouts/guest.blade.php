
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/nouislider.min.css')}}" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
</head>
<body class="home-page home-01 ">


	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">

						<div class="topbar-menu right-menu">
							<ul>

    @if (Route::has('login'))
        @auth
            @if (Auth::user()->utype === 'ADM')
                <li class="menu-item menu-item-has-children parent" >
                    <a title="My acount" href="#">My acount ({{Auth::user()->name}})  ({{Auth::user()->utype}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu curency" >
                        <li class="menu-item" >
                            <a title="dashboard" href="{{route('admin.dashboard')}}">dashboard</a>
                        </li>

                        <li class="menu-item" >
                            <a title="categories" href="{{route('admin.categories')}}">Categories</a>
                        </li>

                        <li class="menu-item" >
                            <a title="Attribute" href="{{route('admin.product-attributes')}}">Attributes</a>
                        </li>

                        <li class="menu-item" >
                            <a title="products" href="{{route('admin.product')}}">All Products</a>
                        </li>

                        <li class="menu-item" >
                            <a title="HomeSlider" href="{{route('admin.homeslider')}}">Manege HomeSlider</a>
                        </li>

                        <li class="menu-item" >
                            <a title="Home Categories" href="{{route('admin.homecategory')}}">Manege home categories</a>
                        </li>

                        <li class="menu-item" >
                            <a title="Sale Settings" href="{{route('admin.sale')}}">Sale Settings</a>
                        </li>

                        <li class="menu-item" >
                            <a title="All Coupons" href="{{route('admin.coupon')}}">All coupons</a>
                        </li>

                        <li class="menu-item" >
                            <a title="All Orders" href="{{route('admin.orders')}}">All Orders</a>
                        </li>

                        <li class="menu-item" >
                            <a title="Contact message" href="{{route('admin.contacts')}}">Contact massesges</a>
                        </li>

                        <li class="menu-item" >
                            <a title="settings page" href="{{route('admin.settings')}}">Settings</a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>


                        <form method="POST" id="logout-form" action="{{route('logout')}}">
                        @csrf</form>
                    </ul>
                </li>
            @else
            <li class="menu-item menu-item-has-children parent" >
                <a title="My acount" href="#">My acount ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="submenu curency" >
                    <li class="menu-item" >
                        <a title="dashboard" href="{{route('user.dashboard')}}">dashboard</a>
                    </li>
                    <li class="menu-item" >
                        <a title="My order" href="{{route('user.orders')}}">My Orders</a>
                    </li>

                    <li class="menu-item" >
                        <a title="My profile" href="{{route('user.profile')}}">My Profile</a>
                    </li>

                    <li class="menu-item" >
                        <a title="dashboard" href="{{route('user.changepassword')}}">Change Password</a>
                    </li>

                    <li class="menu-item">
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form method="POST" id="logout-form" action="{{route('logout')}}">
                    @csrf</form>
                </ul>
            </li>
            @endif
            @else
            <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
            <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
            @endif
            @endif
                </ul>
        </div>
    </div>
</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{asset('assets/images/logo-top-1.png')}}" alt="E-commerce"></a>
						</div>

                        @livewire('search-header-component')

						<div class="wrap-icon right-section">

							@livewire('wishlist-count-component')

							@livewire('cart-count-component')

							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>

								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="/contactus" class="link-term mercado-item-title">Contact Us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

    {{$slot}}

	@livewire('footer-component')

    <script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('assets/js/functions.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}" ></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <script src='https://cdn.tiny.cloud/1/oo0zb7yfylwo5nup32n1ulgd81vx6bdp3k4i3cbs4qn7y657/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
    @livewireScripts

    @stack('scripts')
</body>
</html>


