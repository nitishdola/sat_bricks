<div class="header-bottom">
	<div class="container">
		<!-- START MAIN MENU -->
		<nav class="main-menu">
			<ul class="nav metismenu">
				<li class="sidebar-header mobile-only"><span>NAVIGATION</span></li>
				<li>
					<a class="" href="{{ route('admin.home') }}" aria-expanded="false"><i class="icon dripicons-meter"></i><span class="hide-menu">Dashboard</span></a>
		 		</li>
				 <li>
					<a class="has-arrow " href="#" aria-expanded="false"> 	<i class="icon dripicons-folder"></i> <span class="hide-menu">Master Entries</span> </a>
					<ul aria-expanded="false" class="collapse">
						<li><a href="{{ route('admin.sardar.create') }}" >Sardars</a></li>
						<li><a href="{{ route('admin.worker.create') }}"  >Workers</a></li>
						<li><a href="{{ route('admin.employee.create') }}"  >Employees</a></li>
						<li><a href="{{ route('admin.ledger.create') }}"  >Ledgers</a></li>		
					</ul>
				</li> 
			
				<li>
					<a class="has-arrow " href="#" aria-expanded="false"><i class="icon dripicons-blog"></i><span class="hide-menu">দাদন/Advance</span></a>
					<ul aria-expanded="false" class="collapse">
						<li><a href="{{ route('admin.register.sardar.create') }}" >Sardar দাদন</a></li>
						<li><a href="{{ route('admin.register.employee.entry') }}" >Employee Advance</a></li>
				 	</ul>
				</li>
				<li>
					<a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-to-do"></i><span class="hide-menu">Salary</span></a>
					<ul aria-expanded="false" class="collapse">
					<li><a href="{{ route('admin.register.employee.salary.create') }}" >Employee Salary</a></li>
					<li><a href="{{ route('admin.sardar.worker.salary.add') }}" >Sardar Worker Salary</a></li>					
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-rupee"></i><span class="hide-menu">Payments</span></a>
					<ul aria-expanded="false" class="collapse">
					<li><a href="{{ route('admin.register.sardar.payment.create') }}" >Sardar Payments</a></li>
					<li><a href="{{ route('admin.sardar.worker.salary.add') }}" >Misc Payments</a></li>					
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-document"></i><span class="hide-menu">Information</span></a>
					<ul aria-expanded="false" class="collapse">
					<li><a href="{{ route('admin.report.sardar.list') }}" >Sardar Information</a></li>
					<li><a href="{{ route('admin.sardar.worker.salary.add') }}" >Employee Information</a></li>	
					<li><a href="{{ route('admin.report.ledger') }}" >Ledger Report</a></li>					
					</ul>
				</li>
			</ul>
		</nav>
		<!-- END MAIN MENU -->
	</div>
</div>