<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
	<div class="position-sticky sidebar-sticky pt-3">
		<ul class="nav flex-column">
			<li class="nav-item">
				@if (Auth::user()->is_admin)
					<a aria-current="page" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
						<i class="bi bi-speedometer2"></i> Dashboard
					</a>
				@else
					<a aria-current="page" class="nav-link {{ Request::is('borrowed*') ? 'active' : '' }}" href="/borrowed">
						<i class="bi bi-bootstrap"></i> Borrowed
					</a>
					<a aria-current="page" class="nav-link {{ Request::is('returned*') ? 'active' : '' }}" href="/returned">
						<i class="bi bi-r-square"></i> Returned
					</a>
				@endif
			</li>
			<li>
				<hr class="m-0">
			</li>
			@if (Auth::user()->is_admin)
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
						<i class="bi bi-person"></i>
						User
					</a>
				</li>
				<li>
					<hr class="m-0">
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/book*') ? 'active' : '' }}" href="/dashboard/book">
						<i class="bi bi-book"></i>
						Book
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/collection*') ? 'active' : '' }}" href="/dashboard/collection">
						<i class="bi bi-collection"></i>
						Collection
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/genre*') ? 'active' : '' }}" href="/dashboard/genre">
						<i class="bi bi-columns-gap"></i>
						Genre
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/publisher*') ? 'active' : '' }}" href="/dashboard/publisher">
						<i class="bi bi-journal-arrow-up"></i>
						Publisher
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard/writer*') ? 'active' : '' }}" href="/dashboard/writer">
						<i class="bi bi-pen"></i>
						Writer
					</a>
				</li>
				@if (Auth::user()->is_admin)
					<li>
						<hr class="m-0">
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::is('dashboard/borrow*') ? 'active' : '' }}" href="/dashboard/borrow">
							<i class="bi bi-bootstrap"></i>
							Borrow
						</a>
					</li>
				@endif
				<li>
					<hr class="m-0">
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/">
						<i class="bi bi-arrow-left"></i>
						Back to main
					</a>
				</li>
				<li>
					<hr class="m-0">
				</li>
			@endif
		</ul>
	</div>
</nav>
