@extends('layouts.app')

@section('content')

<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" class="p-3">
    @csrf
    <div class="m-3 form-group">
        <div id="image-preview" class="image-preview bg-primary" style="height: 100px;">
        </div>
        <div class="m-3">
            <input type="file" name="image" id="image-upload">
        </div>

    </div>
    <div class="m-2">
        <label for="">First Name</label>
        <input type="text" name="first_name" class="form-control" id="">
    </div>
    <div class="m-2">
        <label for="">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="">
    </div>
    <div class="m-2">
        <label for="">City</label>
        <input type="text" name="city" class="form-control" id="">
    </div>
    <div class="m-2 text-center">
        <input type="submit" value="Create" class="btn btn-success">
    </div>
</form>

@endsection
