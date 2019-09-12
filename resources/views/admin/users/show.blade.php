@extends('layouts.admin.app')

@section('content')

	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User - {{ $user->name }}</h1>
  </div>

	@if(Session::has('flash_message_error'))
  <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{!! session('flash_message_error') !!}</strong>
  </div>
  @endif   
  @if(Session::has('flash_message_success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_success') !!}</strong>
      </div>
  @endif 

  <div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header"><a class="btn btn-success btn-block" href="{{ route('users.edit', $user->id) }}">Edit user</a></div>
				<div class="card-body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Name</td>
								<td>{{ $user->name }}</td>
							</tr>
							<tr>
								<td>Username</td>
								<td>{{ $user->username }}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>{{ $password }}</td>
							</tr>
							<tr>
								<td>Group</td>
								<td>
									@if ($user->admin == 1)
										Admin
									@else
										User
									@endif
								</td>
							</tr>
							<tr>
								<td>Registration date</td>
								<td>{{ $user->created_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
  </div>

@endsection