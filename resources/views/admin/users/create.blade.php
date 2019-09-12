@extends('layouts.admin.app')

@section('content')

	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create user</h1>
  </div>

  <div class="row">
		<div class="col">
			<form method="post" action="{{ route('users.store') }}">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

              <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              </div>
            </div>
					</div>
				</div>
			</form>
		</div>
  </div>

@endsection