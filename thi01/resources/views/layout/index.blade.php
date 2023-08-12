<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Layout Example</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navigation Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('list')}}">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('add')}}">Thêm mới</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Content Container -->
<div class="container mt-4">
    @yield('content')
</div>
@if(Session::has('success'))
    <script>
        alert("{{Session::get('success')}}")
    </script>
@endif
@if(Session::has('error'))
    <script>
        alert("{{Session::get('error')}}")
    </script>
@endif
@if($errors->any())
    <script>
        @foreach($errors as $error)
        alert("{{$error}}")
        @endforeach
    </script>
@endif

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 My Website. All Rights Reserved.</p>
</footer>

<!-- Link to Bootstrap JS (Optional if you need to use Bootstrap JavaScript features) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

