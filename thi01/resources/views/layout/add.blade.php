@extends('layout.index')
@section('content')

    <h2>ADD NEW STUDENT</h2>
    <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label>Gender</label>
            <input type="text" name="gender" value="">
        </div>
        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="">
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="image" value="">
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
@endsection
