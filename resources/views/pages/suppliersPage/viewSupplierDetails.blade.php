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
                                    <h5 class="m-b-10">{{ $supplierData->supplierName }}</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('viewSupplier') }}">View Suplier</a></li>
                                    <li class="breadcrumb-item"><a href="#!">
                                        {{ $supplierData->supplierName }}
                                    </a></li>
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
                <hr>
                <div class="row">
                    <div class="col-sm-5">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-sm-2">
                                    <div class="tab-content">
                                        <h5 class="card-title">Card title</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                        <p class="card-text">Some quick example text to build</p>
                                      </div>
                                </div> --}}
                            <div class="col-sm-12">
                        <h5 class="card-title">Supplier Deatails.</h5>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               Name
                              <span class="badge badge-primary badge-pill">{{ $supplierData->supplierName }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               Phone Number
                              <span class="badge badge-primary badge-pill">{{ $supplierData->phoneNumber }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Email
                                <span class="badge badge-primary badge-pill">{{ $supplierData->email }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Address
                              <span class="badge badge-primary badge-pill">{{ $supplierData->address }}<br>
                               {{ $supplierData->address1 }}<br>
                                {{ $supplierData->address2 }}
                            </span>
                            </li>
                          </ul>
                        </div>
                    </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="card">
                        <div class="card-body">
                            <div class="panel panel-default">
                                <h5 class="card-title">GRN Deatails</h5>
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Name</th>
                                                <th>Supplier Name</th>
                                                <th>Create Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php $count = 1; ?>
                                                    @foreach ($grnData as $grn)
                                                        <tr>
                                                            <td>{{ $count }}</td>
                                                            <td>{{ $grn->name }}</td>
                                                            <td>{{ $grn->supplierName }}</td>
                                                            <td>{{ $grn->created_at }}</td>
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
                {{-- end --}}
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
