@extends('layouts.admin.app')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        Import/Export
    </div>
    <div class="card-body">
        <form action="{{ route('users.import') }}" method="POST" name="importform" 
           enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <a class="btn btn-info" href="{{ route('users.export') }}"> 
             Export File</a>
            <button class="btn btn-success">Import File</button>
        </form>
    </div>
</div>

@endsection