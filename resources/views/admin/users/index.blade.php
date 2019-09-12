@extends('layouts.admin.app')

@section('content')

	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All users</h1>
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

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>Status</th>
              <th>Registration date</th>
              <th>Update date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>
              	@if ($user->admin == 1)
									Admin
              	@else
									User
              	@endif
              </td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->updated_at }}</td>
              <td>
              	<a class="btn btn-primary show	" href="{{ route('users.show', $user->id) }}"><i class="fas fa-info-circle"></i></a>
              	<a class="btn btn-danger delete" href="{{ route('users.destroy', $user->id) }}"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
	    {{ $users->links() }}
    </div>
  </div>

@endsection