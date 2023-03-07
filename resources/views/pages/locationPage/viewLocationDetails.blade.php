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
                                    <h5 class="m-b-10">@foreach ($location as $data){{ $data->locationName }}@endforeach</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('viewLocation') }}">View Locations</a></li>
                                    <li class="breadcrumb-item"><a href="#!">
                                        @foreach ($location as $data)
                                        {{ $data->locationName }}  ( {{ $data->locationTypeName }} )
                                        @endforeach</a></li>
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
                {{-- start location --}}
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="grnTable">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Loaction Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php $count = 1; ?>
                                            @foreach ($location as $data)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $data->locationName }}</td>
                                                    </td>
                                                    <?php $count += 1; ?>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- End Location --}}
            <h5 class="card-title">GRN Entity</h5>
            {{-- Start GRN Start --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>User Name</th>
                                            <th>Supplier Name</th>
                                            <th>Supplier Phone Number</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php $count = 1; ?>
                                                @foreach ($grndata as $grn)
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $grn->name }}</td>
                                                        <td>{{ $grn->supplierName }}</td>
                                                        <td>{{ $grn->phoneNumber }}</td>
                                                        <td>{{ $grn->note }}</td>
                                                        <?php $count += 1; ?>
                                                    </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end GRN Start --}}
                <hr>

                <h5 class="card-title">GDN Entity</h5>
            {{-- Start GRN Start --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>User Name</th>
                                            <th>Location</th>
                                            <th>--</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                {{-- <?php $count = 1; ?>
                                                @foreach ($grndata as $grn)
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $grn->name }}</td>
                                                        <td>{{ $grn->supplierName }}</td>
                                                        <td>{{ $grn->phoneNumber }}</td>
                                                        <td>{{ $grn->note }}</td>
                                                        <?php $count += 1; ?>
                                                    </tr>
                                                @endforeach --}}
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

                    $(document).ready(function() {
                        $('#grnTable').DataTable();
                    });

                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </body>
@endsection
