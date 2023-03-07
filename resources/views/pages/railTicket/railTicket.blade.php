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
                                    <h5 class="m-b-10">Dashboard</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
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

                            <form action="{{ route('add_ticket') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <select name="from" class="form-control" placeholder="from">
                                                            <option value="Colombo">Colombo</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <select name="to" class="form-control" placeholder="To">
                                                            <option value="500">Galle</option>
                                                            <option value="700">Matara</option>
                                                            <option value="600">Kandy</option>
                                                            <option value="900">Badulla</option>
                                                            <option value="400">Kurunagala</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number of Children</label>
                                                    <input type="text" name="children" class="form-control"
                                                        placeholder="Product Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number of Adult</label>
                                                    <input type="text" name="adult" class="form-control"
                                                        placeholder="Product Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Reserve Ticket</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="container">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Reserved My Ticket
                    </button>
                </div>
                <hr>


                <!-- Button trigger modal -->
                {{-- Data Form --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img class="card-img-top" src="assets/images/Roland_Berger_Railway.jpg" alt="Card image cap">
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
