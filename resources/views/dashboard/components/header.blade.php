<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 fs-6 px-3" href="/"><i class="bi bi-book"></i> Larary</a>
	<button aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"
		class="navbar-toggler position-absolute d-md-none collapsed" data-bs-target="#sidebarMenu" data-bs-toggle="collapse"
		type="button">
		<span class="navbar-toggler-icon"></span>
	</button>
	<input aria-label="Search" class="form-control form-control-dark w-100 rounded-0 border-0" placeholder="Search"
		type="text">
	<div class="navbar-nav">
		<div class="nav-item text-nowrap">
			<form action="/sign-out" method="post">
				@csrf
				<button class="nav-link bg-dark border-0 px-3" type="submit">
					<i class="bi bi-box-arrow-in-right"></i> Sign out
				</button>
			</form>
		</div>
	</div>
</header>
