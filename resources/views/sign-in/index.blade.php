@extends('layouts.main')

@section('container')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<main class="form-signin w-100">
				@if (session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
					</div>
				@endif

				@if (session()->has('signInError'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('signInError') }}
						<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
					</div>
				@endif
				<h1 class="h3 fw-normal mb-3">Please sign in</h1>
				<form action="/sign-in" method="post">
					@csrf
					<div class="form-floating mb-3">
						<input autofocus class="form-control @error('email') is-invalid @enderror" id="email" name="email"
							placeholder="name@example.com" required type="email" value="{{ old('email') }}" />
						<label for="email">Email address</label>
						@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input class="form-control" id="password" name="password" placeholder="Password" required type="password" />
						<label for="password">Password</label>
					</div>
					{{-- <div class="checkbox mb-3">
                        <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                    </div> --}}
					<button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
				</form>
				<small class="d-block text-end">
					Don't have an account? <a class="text-decoration-none" href="/sign-up">
						Sign up
					</a>
				</small>
			</main>
		</div>
	</div>
@endsection
