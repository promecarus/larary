@extends('layouts.main')

@section('container')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<main class="form-signin w-100">
				<h1 class="h3 fw-normal mb-3">Sign up form</h1>
				<form action="/sign-up" method="post">
					@csrf
					<div class="form-floating mb-3">
						<input autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
							placeholder="name" required type="name" value="{{ old('name') }}" />
						<label for="name">Name</label>
						@error('name')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
							placeholder="username" required type="text" value="{{ old('username') }}" />
						<label for="username">Username</label>
						@error('username')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
							placeholder="name@example.com" required type="email" value="{{ old('email') }}" />
						<label for="email">Email address</label>
						@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
							placeholder="Password" required type="password" />
						<label for="password">Password</label>
						@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					{{-- <div class="checkbox mb-3">
                        <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                    </div> --}}
					<button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign up</button>
				</form>
				<small class="d-block text-end">
					Already have an account? <a class="text-decoration-none" href="/sign-in">
						Sign in
					</a>
				</small>
			</main>
		</div>
	</div>
@endsection
