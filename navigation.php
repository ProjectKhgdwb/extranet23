<<?php  
echo '<div id="main">
		<div id="navigation">
			<div class="search">
				<i class="icon-search icon-white"></i>
				<form action="search-page.html" method="get">
					<input type="text" placeholder="Search here" />
				</form>
				<div class="dropdown">
					<a href="#" class='search-settings dropdown-toggle' data-toggle="dropdown"><i class="icon-cog icon-white"></i></a>
					<ul class="dropdown-menu">
						<li class='sort-by'>
							Sort by <span class='filter'>Categories</span> <span class="order">A-Z</span>
						</li>
						<li class="heading">
							Filter categories
						</li>
						<li class='filter active'>
							Categories
						</li>
						<li class="filter">
							Countries
						</li>
						<li class="filter">
							Likes
						</li>
						<li class="heading">
							Sorting order
						</li>
						<li class='order active'>
							Ascending
						</li>
						<li class="order">
							Descending
						</li>
					</ul>
				</div>
			</div>

			<ul class="mainNav" data-open-subnavs="multi">
				<li class='active'>
					<a href="dashboard.php"><i class="icon-home icon-white"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a href="#"><i class="icon-edit icon-white"></i><span>Forms</span><span class="label">4</span></a>
					<ul class="subnav">
						<li>
							<a href="basic-forms.html">Basic forms</a>
						</li>
						<li>
							<a href="extended-forms.html">Extended form elements</a>
						</li>
						<li>
							<a href="form-validation.html">Form validation</a>
						</li>
						<li>
							<a href="form-wizard.html">Form wizard</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="icon-th-large icon-white"></i><span>Components</span><span class="label">5</span></a>
					<ul class="subnav">
						<li>
							<a href="messages.html">Messages &amp; Chat</a>
						</li>
						<li>
							<a href="gallery.html">Gallery &amp; thumbs</a>
						</li>
						<li>
							<a href="icons-buttons.html">Icons &amp; buttons</a>
						</li>
						<li>
							<a href="bootstrap-elements.html">Bootstrap elements</a>
						</li>
						<li>
							<a href="grid.html">Grid</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="charts.html"><i class="icon-signal icon-white"></i><span>Charts</span></a>
				</li>
				<li>
					<a href="tables.html"><i class="icon-th-list icon-white"></i><span>Tables</span></a>
				</li>
				<li>
					<a href="error-pages.html"><i class="icon-warning-sign icon-white"></i><span>Error Pages</span></a>
				</li>
				<li>
					<a href="calendar.html"><i class="icon-calendar icon-white"></i><span>Calendar</span></a>
				</li>
				<li>
					<a href="file-management.html"><i class="icon-hdd icon-white"></i><span>File management</span></a>
				</li>
				<li>
					<a href="#"><i class="icon-th icon-white"></i><span>More pages</span><span class="label">4</span></a>
					<ul class="subnav">
						<li>
							<a href="invoice.html">Invoice</a>
						</li>
						<li>
							<a href="search-page.html">Search page</a>
						</li>
						<li>
							<a href="user-profile.html">User profile</a>
						</li>
						<li>
							<a href="blank-page.html">Blank page</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="status button">
				<div class="status-top">
					<div class="left">
						Saving changes...
					</div>
				</div>
				<div class="status-bottom">
					<div class="progress">
						<div class="bar" style="width:60%">60%</div>
					</div>
				</div>
			</div>
			
?>