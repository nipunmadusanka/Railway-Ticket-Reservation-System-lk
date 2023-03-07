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
                                    <h5 class="m-b-10">View Locations</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">View Locations</a></li>
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
                                <h5 class="modal-title" id="staticBackdropLabel">Manage Locations</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <!--Modal form-->

                            <form action="{{ route('add_location') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location Name</label>
                                                    <input type="text" name="locName" class="form-control"
                                                        placeholder="Location Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Location Type</label>
                                                <select class="form-control" name='locationTypeID'
                                                    id="exampleFormControlSelect1">
                                                    @foreach ($locationtype as $type)
                                                        <option value="{{ $type->locationTypeID }}">
                                                            {{ $type->locationTypeName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Add Location</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- start update location --}}

                {{-- <div class="modal fade " class="modal-dialog modal-dialog-centered" id="updatelocation"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Manage Locations</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <!--Modal form-->

                            <form action="{{ route('add_location') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="modal-body">

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Location Name</label>
                                                    <input type="text" name="locName" class="form-control"
                                                        value="{{ $locationdata->locationName }}" placeholder="Location Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Location Type</label>
                                                <select class="form-control" name='locationTypeID'
                                                    id="exampleFormControlSelect1">
                                                    @foreach ($locationtype as $type)
                                                        <option value="{{ $type->locationTypeID }}">
                                                            {{ $type->locationTypeName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Add Location</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}

                {{-- end update location --}}

                <div class="container">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add New location +
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
                                            <th>Loaction Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($location as $data)
                                            <tr>
                                                <input type="hidden" class="delete_val" value="{{ $data->locationID}}">
                                                <input type="hidden" class="view_val" value="{{ $data->locationID}}">
                                                <td>{{ $count }}</td>
                                                <td>{{ $data->locationName }}</td>
                                                {{-- <td>{{ $data->created_at }}</td>
                                                <td>{{ $data->updated_at }}</td> --}}
                                                <td class="text-center">
                                                <a href="" class="btn btn-success viewLoc">View</a>
                                                    <a href="#edit{{ $data->locationID}}" data-bs-toggle="modal" class="btn btn-primary">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                        @include('pages.locationPage.action')
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
            $(".btn-danger").click(function(e){
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
                                type:'GET',
                                url:'/deletelocation/'+delete_id,
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

        $(".viewLoc").click(function(e){
                    e.preventDefault();
                    // var view_id = $(this).closest("tr").find('.view_val').val();
                    // var url = "{{ route('viewLocationDetails', ":view_id") }}";
                    console.log("done");
                        var slug = $(this).closest("tr").find('.delete_val').val();
                        var url = '{{ route("viewLocationDetails", ":slug") }}';
                        url = url.replace(':slug', slug);
                        window.location.href=url;
                    });

                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </body>
@endsection
