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
				<h1 class="h3 fw-normal mb-3">Please sign in</h1>
				<form action="" method="">
					@csrf
					<div class="form-floating mb-3">
						<input autofocus class="form-control" id="floatingInputEmail" placeholder="name@example.com" type="email" />
						<label for="floatingInputEmail">Email address</label>
					</div>
					<div class="form-floating mb-3">
						<input class="form-control" id="floatingPassword" placeholder="Password" type="password" />
						<label for="floatingPassword">Password</label>
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
