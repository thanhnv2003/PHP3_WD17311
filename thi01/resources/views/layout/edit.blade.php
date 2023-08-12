@extends('layout.index')
@section('content')

    <h2>EDIT STUDENT ID: {{$data->id}}</h2>
    <form action="{{route('edit', [$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$data->name}}">
        </div>
        <div>
            <label>Gender</label>
            <input type="text" name="gender" value="{{$data->gender}}">
        </div>
        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{$data->phone}}">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{$data->address}}">
        </div>
        <div>
            <label>Image</label>
            <img src="{{asset('storage/images/'.$data->image)}}" alt="Image Not Found" width="300px">
            <input type="file" name="image">
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
@endsection

