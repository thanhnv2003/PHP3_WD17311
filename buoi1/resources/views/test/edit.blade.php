@extends('templates.layout')
@section('content')
    <form action="{{route('edit',[$value->id])}}" method="post">
        @csrf
        <label>Name:</label>
        <input type="text" class="form-control" name="name" value="{{$value->name}}"><br>
        <label>Email:</label>
        <input type="text" class="form-control" name="email" value="{{$value->email}}"><br>
        <label>Address:</label>
        <input type="text" class="form-control" name="address" value="{{$value->address}}"><br>
        <label>Birthday:</label>
        <input type="date" class="form-control" name="date_of_birth" value="{{$value->date_of_birth}}"><br>
        <input type="submit" class="btn btn-success" name="btnSm" value="Cập nhật">
    </form>
@endsection


