<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel Management System</title>
</head>
<body>

<div class="container">
<h3 align="center" class="mt-5">Hotel Management Syste</h3>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
       
    <div class="form-area">
        <form method="post" action="{{route('hotels.store')}}" encrypt="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <label for="">Hotel Name</label>
                <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6">
                <label for="">Image</label>
                <input type="text" class="form-control" name="image">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
                </div>
            </div>

        </form>
    </div>
    </div>

</div>
</div>


@yield('content')
</body>
</html>