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
                <a class="nav-link" href="{{route('list')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('add')}}">Thêm mơi</a>
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
@if ( Session::has('success') )

    <div class="alert alert-success alert-dismissible" role="alert">

        <strong>{{ Session::get('success') }}</strong>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


    </div>

@endif

@if ( Session::has('error') )

    <div class="alert alert-danger alert-dismissible" role="alert">

        <strong>{{ Session::get('error') }}</strong>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


    </div>

@endif

@if ($errors->any())

    <div class="alert alert-danger alert-dismissible" role="alert">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>

@endif
<!-- Content Container -->
@yield('content')


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 My Website. All Rights Reserved.</p>
</footer>

<!-- Link to Bootstrap JS (Optional if you need to use Bootstrap JavaScript features) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

