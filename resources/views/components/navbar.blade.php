<nav class="navbar navbar-expand-lg bg-light">
	<div class="container">
		<a class="navbar-brand" href="/">Larary</a>
		<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
			data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-lg-0 mb-2">
				{{-- home --}}
				<li class="nav-item">
					<a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
				</li>
				{{-- about --}}
				<li class="nav-item">
					<a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
				</li>
				{{-- collections --}}
				<li class="nav-item dropdown">
					<a aria-expanded="false" class="nav-link {{ Request::is('collections*') ? 'active' : '' }} dropdown-toggle"
						data-bs-toggle="dropdown" href="#" role="button">
						Collections
					</a>
					<ul class="dropdown-menu">
						{{-- <li><a class="dropdown-item" href="/collections/search">Search</a></li> --}}
						{{-- https://www.dps61.org/Page/17444 --}}
						@foreach ($collections as $c)
							<li><a class="dropdown-item" href="/collections/{{ $c->slug }}">{{ $c->name }}</a></li>
						@endforeach
					</ul>
				</li>
				{{-- services --}}
				<li class="nav-item dropdown">
					<a aria-expanded="false" class="nav-link {{ Request::is('services*') ? 'active' : '' }} dropdown-toggle"
						data-bs-toggle="dropdown" href="#" role="button">
						Services
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="/services/search">Search</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="/services/crud/collection">CRUD Collection</a>
						</li>
					</ul>
				</li>
			</ul>
			{{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
		</div>
	</div>
</nav>
