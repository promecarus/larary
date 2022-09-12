@php
$collections = App\Models\Collection::orderBy('name')->get();
$genres = App\Models\Genre::orderBy('name')->get();
$publishers = App\Models\Publisher::orderBy('name')->get();
$writers = App\Models\Writer::orderBy('name')->get();
@endphp

<nav class="navbar navbar-expand-lg bg-light">
	<div class="container">
		<a class="navbar-brand" href="/">
			<i class="bi bi-book"></i> Larary
		</a>
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
						@foreach ($collections as $collection)
							<li><a class="dropdown-item" href="/collections/{{ $collection->slug }}">{{ $collection->name }}</a></li>
						@endforeach
					</ul>
				</li>
				{{-- genres --}}
				<li class="nav-item dropdown">
					<a aria-expanded="false" class="nav-link {{ Request::is('genres*') ? 'active' : '' }} dropdown-toggle"
						data-bs-toggle="dropdown" href="#" role="button">
						Genres
					</a>
					<ul class="dropdown-menu">
						@foreach ($genres as $genre)
							<li><a class="dropdown-item" href="/genres/{{ $genre->slug }}">{{ $genre->name }}</a></li>
						@endforeach
					</ul>
				</li>
				{{-- publishers --}}
				<li class="nav-item dropdown">
					<a aria-expanded="false" class="nav-link {{ Request::is('publishers*') ? 'active' : '' }} dropdown-toggle"
						data-bs-toggle="dropdown" href="#" role="button">
						Publishers
					</a>
					<ul class="dropdown-menu">
						{{-- <li><a class="dropdown-item" href="/publishers/search">Search</a></li> --}}
						{{-- https://www.dps61.org/Page/17444 --}}
						@foreach ($publishers as $publisher)
							<li><a class="dropdown-item" href="/publishers/{{ $publisher->slug }}">{{ $publisher->name }}</a></li>
						@endforeach
					</ul>
				</li>
				{{-- writers --}}
				<li class="nav-item dropdown">
					<a aria-expanded="false" class="nav-link {{ Request::is('writers*') ? 'active' : '' }} dropdown-toggle"
						data-bs-toggle="dropdown" href="#" role="button">
						Writers
					</a>
					<ul class="dropdown-menu">
						{{-- <li><a class="dropdown-item" href="/writers/search">Search</a></li> --}}
						{{-- https://www.dps61.org/Page/17444 --}}
						@foreach ($writers as $writer)
							<li><a class="dropdown-item" href="/writers/{{ $writer->slug }}">{{ $writer->name }}</a></li>
						@endforeach
					</ul>
				</li>
				{{-- services --}}
				{{-- <li class="nav-item dropdown">
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
							<a class="dropdown-item" href="/services/borrow">Borrow</a>
						</li>
						<li>
							<a class="dropdown-item" href="/services/return">Return</a>
						</li>
					</ul>
				</li> --}}
			</ul>
			<ul class="navbar-nav">
				@auth
					<li class="nav-item dropdown ms-auto">
						<a aria-expanded="false"
							class="nav-link dropdown-toggle {{ Request::is(['dashboard*', 'borrowed*']) ? 'active' : '' }}"
							data-bs-toggle="dropdown" href="#" role="button">
							Welcome, {{ auth()->user()->name }}
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								@if (auth()->user()->is_admin)
									<a class="dropdown-item" href="/dashboard">
										<i class="bi bi-speedometer2"></i> Dashboard
									</a>
								@else
									<a class="dropdown-item" href="/borrowed">
										<i class="bi bi-card-list"></i> Borrowed
									</a>
								@endif
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<form action="/sign-out" method="post">
									@csrf
									<button class="dropdown-item" type="submit">
										<i class="bi bi-box-arrow-in-right"></i> Sign out
									</button>
								</form>
							</li>
						</ul>
					</li>
				@else
					<li class="nav-item ms-auto">
						<a class="nav-link {{ Request::is(['sign-in', 'sign-in']) ? 'active' : '' }}" href="/sign-in">
							<i class="bi bi-box-arrow-in-right"></i> Sign in
						</a>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
