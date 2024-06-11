<div class="left-side-bar">
	<div class="brand-logo">
		<a href="{{ URL::to('/')}}" class="text-center">
			{{ 'Plantoys PIF' }}
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<li class="dropdown">
						<a class="dropdown-toggle no-arrow"><span class="mtext"><span class="micon fa fa-shopping-bag"></span>Product Info</span></a>
						<ul class="submenu">
							<li><a href="{{ URL::to('product_dinamic') }}" class="{{ Request::is('product_dinamic*') ? 'active' : '' }}">Product</a></li>
							<li><a href="{{ URL::to('product_detail') }}" class="{{ Request::is('product_detail*') ? 'active' : '' }}">Product Detail And Export</a></li>
						</ul>
					</li>
				</li>

				@if(auth()->user()->is_admin == 1 )
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a href="{{ URL::to('users')}}" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-user-circle-o"></span>
							<span class="mtext">User Setting</span>
						</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>