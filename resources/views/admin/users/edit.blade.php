@extends('layouts.admin.app')

@section('content')

	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit User - {{ $user->name }}</h1>
  </div>

	@if(Session::has('flash_message_error'))
  <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{!! session('flash_message_error') !!}</strong>
  </div>
  @endif 

  <div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-body">
					<form method="post" action="{{ route('users.update', $user->id) }}">
						@csrf
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>Name</td>
									<td>
										<div class="input-group">
											<input class="form-control" type="text" name="name" value="{{ $user->name }}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Username</td>
									<td>
										<div class="input-group"> 
											<input class="form-control" type="text" name="username" value="{{ $user->username }}">
										</div>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<div class="input-group"> 
											<input class="form-control" type="email" name="email" value="{{ $user->email }}">
										</div>
									</td>
								</tr>
								<tr>
									<td>New password</td>
									<td>
										<div class="input-group">
											<input class="form-control" type="password" name="newpassword">
										</div>
									</td>
								</tr>
								<tr>
									<td>Confirm password</td>
									<td>
										<div class="input-group">
											<input class="form-control" type="password" name="confpassword">
										</div>
									</td>
								</tr>
								<tr>
									<td>Group</td>
									@if (Auth::user()->id == $user->id)
									<td>
										@if ($user->admin == 1)
											Admin
										@else
											User
										@endif
									</td>
									@else
									<td>
										<select name="status" class="custom-select" name="group">
											<option value="1" @if ($user->admin == 1) selected="" @endif>Admin</option>
											<option value="0" @if ($user->admin == 0) selected="" @endif>User</option>
										</select>
									</td>
									@endif
								</tr>
							</tbody>
						</table>
						<input type="submit" class="btn btn-success btn-block" value="Edit">
					</form>
				</div>
			</div>
		</div>
  </div>

@endsection