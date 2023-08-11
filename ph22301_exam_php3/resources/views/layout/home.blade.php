@extends('layout.index')
@section('content')
    <!-- Content Container -->
    <div class="container mt-4">
        <form method="post" enctype="multipart/form-data" action="{{$route}}">
            @csrf
            <input type="file" name="image">
            <input type="submit" value="Submit" class='btn btn-success'>
        </form>
    </div>
@endsection
