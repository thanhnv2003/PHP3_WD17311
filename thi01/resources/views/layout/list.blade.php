@extends('layout.index')
@section('content')
    <table border="1">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>GENDER</td>
            <td>PHONE</td>
            <td>ADDRESS</td>
            <td>IMAGE</td>
            <td>FUNCITIONS</td>
        </tr>
        @foreach($data as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->address}}</td>
                <td><img src="{{asset('storage/images/'.$value->image)}}" alt="Image Not Found" width="300px">
                    </td>
                <td><a href="{{route('edit',[$value->id])}}" >Edit</a><br>
                    <a href="{{route('delete',[$value->id])}}" >Delete</a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
