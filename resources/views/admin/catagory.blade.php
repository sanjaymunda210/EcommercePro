<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 30px;
        }

        .h2_font {
            font-size: 30px;
            padding-bottom: 30px;
        }

        .input_color {
            color: #000;
        }

        .table {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="div_center">
                        <h2 class="h2_font">Add Catagory</h2>

                        <form action="{{ url('add_catagory') }}" method="post">
                            @csrf
                            <input type="text" class="input_color " name="catagory"
                                placeholder="Enter Catagory Name">
                            <input type="submit" class="btn btn-primary" value="Add catagory">
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Catagory Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td scope="row">{{ $data->catagory_name }}</td>
                                    <td><a onclick='return confirm("Are you sure to delete {{ $data->catagory_name }} ?")'
                                            class="btn btn-danger"
                                            href="{{ url('delete_catagory', $data->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
</body>

</html>
