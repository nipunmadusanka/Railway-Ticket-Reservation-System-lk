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
                                    <h5 class="m-b-10">View GDN</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">View GDN</a></li>
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



                <div class="container">
                    <a href="{{ route('addGdn') }}" class="btn btn-primary">
                        Add New GDN +
                    </a>
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
                                            <th>Issued Location</th>
                                            <th>Dispatch Location</th>
                                            <th>Note</th>
                                            <th>Create Date</th>
                                            <th>Update Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($grn as $data)
                                            <tr>

                                                <td>{{ $count }}</td>
                                                <td>{{ $data->SupplierID }}</td>
                                                <td>{{ $data->userID }}</td>
                                                <td>{{ $data->locationID }}</td>
                                                <td>{{ $data->note }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>{{ $data->updated_at }}</td>
                                                <td class="text-center">
                                                <a href="#view{{ $data->id}}" class="btn btn-success" data-bs-toggle="modal">View</a>
                                                    <a href="#edit{{ $data->id}}" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                                    <a href="{{ url('deletegrn/' . $data->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a>
                                                        @include('pages.grnPage.action')
                                                </td>
                                                <?php $count += 1; ?>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </body>
@endsection
