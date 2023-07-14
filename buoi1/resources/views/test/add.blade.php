@extends('templates.layout')
@section('content')
    <form action="{{url('add')}}" method="post">
        @csrf
        <label>Name:</label>
        <input type="text" class="form-control" name="name"><br>
        <label>Email:</label>
        <input type="text" class="form-control" name="email"><br>
        <label>Address:</label>
        <input type="text" class="form-control" name="address"><br>
        <label>Birthday:</label>
        <input type="date" class="form-control" name="date_of_birth"><br>
        <input type="submit" class="btn btn-success" name="btnSm" value="Thêm mới">
    </form>
@endsection


