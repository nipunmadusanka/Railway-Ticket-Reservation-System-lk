@extends('layouts.app')

@section('content')

<body>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{-- breadCrumb --}}

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">View Suppliers</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{ route('homePage') }}><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">View Suppliers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-info">
                {{ $message }}
            </div>
            @endif
            <!-- Modal -->
            <div class="modal fade " class="modal-dialog modal-dialog-centered" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Manage Suppliers</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <!--Modal form-->

                        <form action="{{ route('add_supplier') }}" method="POST">

                            {{ csrf_field() }}

                            <div class="modal-body">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <input type="text" name="supplierName" class="form-control" placeholder="Supplier Name">
                                            </div>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>


                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Line 1">
                                                @if ($errors->has('address1'))
                                                <span class="text-danger">{{ $errors->first('address1') }}</span>
                                                @endif


                                                <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line 2">
                                                @if ($errors->has('address2'))
                                                <span class="text-danger">{{ $errors->first('address2') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Add Supplier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- start update location --}}


            {{-- end update location --}}

            <div class="container">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add New Supplier +
                </button>
            </div>
            <hr>
            <!-- Button trigger modal -->
            {{-- Data Form --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>

                                        <th>Index</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Phone Number</th>
                                        <th>Supplier Email</th>
                                        <th>Supplier Address</th>
                                        {{-- <th>Create Date</th>
                                            <th>Update Date</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($supplier as $data)
                                    <tr>

                                        <input type="hidden" class="delete_val" value="{{ $data->supplierID}}">
                                        <input type="hidden" class="view_val" value="{{ $data->supplierID}}">
                                        <td>{{ $count }}</td>
                                        <td>{{ $data->supplierName }}</td>
                                        <td>{{ $data->phoneNumber }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->address1 }}</td>
                                        {{-- <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->updated_at }}</td> --}}
                                        <td class="text-center">
                                            <a href="" class="btn btn-success viewSup">View</a>
                                            <a href="#edit{{ $data->supplierID}}" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                            @include('pages.suppliersPage.action')
                                        </td>
                                        <?php $count += 1; ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(".btn-danger").click(function(e) {
                    e.preventDefault();
                    var delete_id = $(this).closest("tr").find('.delete_val').val();
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var data = {
                                    "_token": $('input[name="_token"]').val(),
                                    "id": delete_id,
                                };
                                $.ajax({
                                    type: 'GET',
                                    url: '/deletesupplier/' + delete_id,
                                    data: data,
                                    success: function(response) {
                                        swal(response.status, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    }
                                });
                            }
                        });
                });

                    $(".viewSup").click(function(e){
                    e.preventDefault();
                    console.log("done");
                        var slug = $(this).closest("tr").find('.view_val').val();
                        var url = '{{ route("viewSupplierDetails", ":slug") }}';
                        url = url.replace(':slug', slug);
                        window.location.href=url;
                    });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
            </script>
        </div>
    </div>
</body>
@endsection
