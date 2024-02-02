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
                        <th>Profile</th>
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
                        @if ($users != "")
                        @foreach ($users as $id => $user)
                        <tr>
                            <td><img src="{{ url($user['image']) }}" alt="" srcset="" style="width: 80px; height: 50px;"></td>
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
                        @endif

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.com/libraries/popper.js/2.9.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
         $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
</body>

</html>
