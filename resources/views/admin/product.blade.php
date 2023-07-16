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

        .col-form-label {
            text-align: left;
        }

        .n-input,
        .n-input:focus {
            background: #fff;
            color: #000;
            border: none;
            outline: none;
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
                        <h2 class="h2_font">Add Product</h2>
                        <div class="container">
                            <form method="post" action="{{ url('add_product') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row justify-content-md-center">
                                    <label for="title" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control n-input" name="title" id="title"
                                            placeholder="title">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control n-input" name="description"
                                            id="description" placeholder="Description">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="catagory" class="col-sm-2 col-form-label">Catagory</label>
                                    <div class="col-sm-4">
                                        <select class="form-control n-input" name="catagory" id="catagory">
                                            <option value="null">Select Catagory</option>
                                            @foreach ($catagory as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->catagory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control n-input" name="quantity"
                                            id="quantity">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control n-input" name="price"
                                            id="price">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="discount_price" class="col-sm-2 col-form-label">Discount Price</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control n-input" name="discount_price"
                                            id="discount_price">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control n-input" name="image"
                                            id="image">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>

                    </div>
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
