<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{url('/')}}" class="site-logo">
							<img src="{{asset('divisima/img/logo.png')}}" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
								</div>
								<a href="{{url('/viewcart')}}">Shopping Cart</a>
                            </div>
                            <div class="up-item">
                                    @if(Auth::check())
                                <a href="{{url('/myaccount')}}"><i class="flaticon-profile"></i>Edit Profil</a>
                                <a href="{{url('/logout') }}"><i class="flaticon-logout"></i>Logout</a>
                                    </li>
                                @else
                                <i class="flaticon-profile"></i>
                                <a href="{{url('/login_page')}}">Sign</a> In or <a href="{{url('/login_page')}}">Create Account</a>
                                @endif`

                                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
                        <li><a href="{{url('/')}}" class="">Home</a></li>
                        <li><a href="{{url('/list-products')}}" class="">Our Product</a></li>
                        <li><a href="#" class="" >About Us</a></li>
                        <li><a href="#" class="" >Contact Us</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
