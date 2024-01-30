<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="contianer-fluid bg-primary">
    <div class="row justify-content-center align-items-center" style="height: 500px">
        <div class="col-6 bg-white">
            <h1 class="m-4 text-center">Hello User!</h1>
            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="m-3">
                    <input type="email" class="form-control" name="email" id="" placeholder="example@gmail.com">
                </div>
                <div class="m-3">
                    <input type="password" class="form-control" name="password" placeholder="******" id="">
                </div>
                <div class="m-3 text-center">
                    <input type="submit" class="btn btn-primary " value="Login">
                </div>

            </form>
        </div>
      </div>

</body>
</html>
