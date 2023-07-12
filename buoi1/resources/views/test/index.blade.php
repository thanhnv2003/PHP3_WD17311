@extends('templates.layout')
@section('content')
<form action="{{url('index')}}" method="post">
    @csrf
    <label>Email:</label>
    <input type="text" class="form-control" name="email">
    <input type="submit" name="btnSearch" value="Tìm kiếm">
</form>
<table border="1" class="table">
    <tr style="text-align: center; font-weight: bold">
        <td>ID</td>
        <td>NAME</td>
        <td>EMAIL</td>
        <td>ADDRESS</td>
        <td>DATE_BIRTH</td>
        <td>CREATED_AT</td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->address}}</td>
        <td>{{$value->date_of_birth}}</td>
        <td>{{$value->created_at}}</td>

    </tr>
    @endforeach

</table>
@endsection

