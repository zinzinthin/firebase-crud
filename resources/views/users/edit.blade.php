@extends('layouts.app')
@section('content')
<form action="{{ route('users.update',$id) }}" method="post" class="p-3">
    @csrf
    @method('PUT')
    <div class="m-2">
        <label for="">First Name</label>
        <input type="text" name="first_name" value="{{ $user['first_name'] ?? "" }}" class="form-control" id="">
    </div>
    <div class="m-2">
        <label for="">Last Name</label>
        <input type="text" name="last_name" value="{{ $user['last_name'] ?? "" }}" class="form-control" id="">
    </div>
    <div class="m-2">
        <label for="">City</label>
        <input type="text" name="city" value="{{ $user['city'] ?? "" }}" class="form-control" id="">
    </div>
    <div class="m-2 text-center">
        <input type="submit" value="Edit" class="btn btn-primary">
    </div>
</form>
@endsection
