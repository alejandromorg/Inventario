@section("header")
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">{{trans('index.title')}}</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
					<span class="sr-only">Navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		<div class="collapse navbar-collapse" id="hamburger-navigation">
			<ul class="nav navbar-nav" role="menu">
				@if (Auth::check())
					@if (allowed("user/logout"))
						<li><a href="{{ URL::route('user/logout') }}">{{trans('main.logout')}}</a> </li> 
					@endif

					@if (allowed("producto/index"))
						<li><a href="{{ URL::route('producto/index') }}">{{trans('main.product')}}</a></li>
					@endif
					@if (allowed("compra/index"))
						<li><a href="{{ URL::route('compra/index') }}">{{trans('main.compra')}}</a></li>
					@endif
					@if (allowed("proveedor/index"))
						<li><a href="{{ URL::route('proveedor/index') }}">{{trans('main.proveedor')}}</a></li>
					@endif
					@if (allowed("stock/index"))
						<li><a href="{{ URL::route('stock/index') }}">{{trans('main.stock')}}</a></li>
					@endif


					@if (allowed("user/profile"))
						<li><a href="{{ URL::route('user/profile') }}">{{trans('main.profile')}}</a></li>
					@endif
					@if (allowed("group/index"))
						<li><a href="{{ URL::route('group/index') }}">{{trans('main.groups')}}</a></li>
					@endif

				@else
					<a href="{{ URL::route('user/login') }}">login</a>
				
				@endif
			</ul>
       </div>
     </div>
   </nav> 
 