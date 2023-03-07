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
                                    <h5 class="m-b-10">Add GDN</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Add GDN</a>
                                    </li>
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
                    <div class="card col-lg-4">
                        <div class="card-body">
                            <div class="input-group rounded">

                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover"
                                                id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                {{-- <tbody>
                                                    @foreach ($product as $data)
                                                        <tr>
                                                            <td>{{ $data->ProductName }}</td>
                                                            <td>{{ $data->UnitName }}</td>
                                                            <td class="text-center">
                                                                <a href="" class="btn btn-primary"
                                                                    data-bs-toggle="modal">ADD</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody> --}}
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="card col-lg-8">
                        <div class="card-body">
                            <div class="row ">

                                <div class="form-group col-lg-3">
                                    <label for="exampleFormControlSelect">Issued Location</label>
                                    <select class="form-control col-lg-12" name="locationID">
                                        <option value="1">Select Location</option>
                                        @foreach ($showlocation as $showlocation)
                                            <option value="{{ $showlocation->locationName }}">
                                                {{ $showlocation->locationName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="exampleFormControlSelect">Dispatch Location</label>
                                    <select class="form-control col-lg-12" name="locationID">
                                        <option value="1">Select Location</option>
                                        @foreach ($location as $location)
                                            <option value="{{ $location->locationName }}">
                                                {{ $location->locationName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                    <div class="col-lg-5">
                                        <label class="date-label">Date
                                            <script>
                                                date = new Date().toLocaleDateString();
                                                document.write(date);
                                            </script>
                                        </label>
                                    </div>
                                

                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" id="Description" rows="3"></textarea>
                            </div>

                            {{-- <div class="row"> --}}
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover"
                                            id="myTable">
                                            <thead>
                                                <tr>

                                                    <th>Index</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Issued Location</th>
                                                    <th>Dispatch Location</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            {{-- <tr>

                                                <th>1</th>
                                                <th>sodium</th>
                                                <th>5</th>
                                                <th>
                                                    <a href="" class="btn btn-primary"
                                                        data-bs-toggle="modal">Edit</a>
                                                    <a href="" class="btn btn-danger"
                                                        onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Remove</a>
                                                </th>

                                            </tr> --}}

                                            <tbody>
                                                {{-- <?php $count = 1; ?>
                                                        @foreach ($grn as $data)
                                                            <tr>
                                                        <       <td>{{ $count }}</td>
                                                                <td>{{ $data->itemName }}</td>
                                                                <td>{{ $data->Quantity}}</td>

                                                                <td class="text-center">
                                                                    <a href="" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                                                    <a href="{{ url('deletegrn/' . $data->id) }}"
                                                                        class="btn btn-danger"
                                                                        onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a>
                                                                        @include('pages.grnPage.action')
                                                                </td>
                                                                <?php $count += 1; ?>
                                                            </tr> --}}
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                Submit GRN</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>
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
