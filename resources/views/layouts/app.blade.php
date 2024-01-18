<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Firebase CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container m-4">
        <div class="row d-flex">
            <div class="col-12 col-md-8">
                <table class="table">
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @php
                            $users = App\Helper\FirebaseConnection::connect()
                                ->getReference('users')
                                ->getSnapshot()
                                ->getValue();
                        @endphp

                        @foreach ($users as $id => $user)
                            <tr>
                                <td>{{ $user['first_name'] ?? "" }}</td>
                                <td>{{ $user['last_name'] ?? "" }}</td>
                                <td>{{ $user['city'] ?? "" }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('users.edit',$id) }}" class="btn btn-primary mx-2"> Edit </a>
                                    <form action="{{ route('users.destroy',$id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4">
                <div class="m-3 border">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
