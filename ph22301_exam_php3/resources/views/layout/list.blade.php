@extends('layout.index')
@section('content')


    <table border="1">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>FUNCITION</td>
        </tr>
        @foreach($data as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td><img src="{{url('storage/images/'.$value->image)}}" alt="Lỗi tải ảnh" width="300px"></td>
            <td><a href="{{route('edit', [$value->id])}}">Edit</a></td>
            <td><a href="{{route('delete', [$value->id])}}">Delete</a></td>
        </tr>
        @endforeach
    </table>
@endsection
