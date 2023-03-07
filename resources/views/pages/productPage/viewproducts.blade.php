@extends('layouts.app')

@section('content')

    <body>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        {{-- breadCrumb --}}

        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">View Ticket</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">View Ticket</a></li>
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
                <div class="modal fade " class="modal-dialog modal-dialog-centered" id="staticBackdrop"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Manage Products</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <!--Modal form-->

                            <form action="{{ route('add_product') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" name="proName" class="form-control"
                                                        placeholder="Product Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <select name="unitName" class="form-control" placeholder="Unit Name">
                                                            <option value="None">None</option>
                                                            <option value="Miligrams (Mg)">Miligrams (Mg)</option>
                                                            <option value="Grams (g)">Grams (g)</option>
                                                            <option value="Kilograms (Kg)">Kilograms (Kg)</option>
                                                            <option value="Mililiters (Ml)">Mililiters (Ml)</option>
                                                            <option value="Liters (L)">Liters (L)</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Description</label>
                                                    <textarea class="form-control" name="Description" rows="3" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>From</th>
                                            <th>Price</th>
                                            {{-- <th>Create Date</th>
                                            <th>Update Date</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($product as $data)
                                            <tr>
                                                <input type="hidden" class="delete_val" value="{{ $data->id}}">
                                                <td>{{ $count }}</td>
                                                <td>{{ $data->from }}</td>
                                                <td>{{ $data->to }}</td>
                                                {{-- <td>{{ $data->created_at }}</td>
                                                <td>{{ $data->updated_at }}</td> --}}
                                                <td class="text-center">


                                                <a href="#view{{ $data->id}}" data-bs-toggle="modal" class="btn btn-success">View</a>
                                                    <a href="#edit{{ $data->id}}" data-bs-toggle="modal" class="btn btn-primary">Edit</a>
                                                    <a href="" class="btn btn-danger">Cancel</a>
                                                        @include('pages.productPage.action')
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
            $(".btn-danger").click(function(e){
                    e.preventDefault();
                    var delete_id = $(this).closest("tr").find('.delete_val').val();
                    swal({
                    title: "Are you sure?",
                    text: "Once cancel, you will not be able to recover this ticket!",
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
                                type:'GET',
                                url:'/deleteproduct/'+delete_id,
                                data: data,
                                success:function(response) {
                                    swal(response.status , {
                                    icon: "success",
                                })
                                    .then((result)=>{
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    </body>
@endsection
