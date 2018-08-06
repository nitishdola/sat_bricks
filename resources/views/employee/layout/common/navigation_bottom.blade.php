<div class="header-bottom">
	<div class="container">
		<!-- START MAIN MENU -->
		<nav class="main-menu">
			<ul class="nav metismenu">
				<li class="sidebar-header mobile-only"><span>NAVIGATION</span></li>
				<li>
					<a class="" href="{{ route('employee.home') }}" aria-expanded="false"><i class="icon dripicons-meter"></i><span class="hide-menu">Dashboard</span></a>
					
				</li>
				<li>
					<a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-browser"></i><span class="hide-menu">Sales</span></a>
					<ul aria-expanded="false" class="collapse">
						<li><a href="{{ route('employee.receipt.create') }}">Create Receipt</a></li>
						<li><a href="{{ route('employee.receipt.view_all') }}">View All Sales Report</a></li>

					 
					</ul>
				</li>

				<li><a href="{{ route('employee.worker.production.entry') }}"> <i class="fa fa-cog" aria-hidden="true"></i>Enter Daily Production </a></li>
				
				<li><a href="{{ route('employee.worker.production.view_all') }}"> <i class="fa fa-list-ul" aria-hidden="true"></i>View All Daily Production </a></li>
				
				
			</ul>
		</nav>
		<!-- END MAIN MENU -->
	</div>
</div>