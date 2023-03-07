@extends('layouts.app')


@section('content')

    <div class="pcoded-main-container">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Users</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                    <div class="alert alert-info">
                        {{ $message }}
                    </div>
                @endif
            <div class="modal fade " class="modal-dialog modal-dialog-centered" id="adduser" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Manage Users</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <!--Modal form-->

                        <form action="{{ route('user_registration') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">


                                    <div class="col-md-20">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" name="name" id="Username"
                                                    placeholder="User name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">User Type</label>
                                            <select class="form-control" name='userTypeID'
                                                id="exampleFormControlSelect1">
                                                <option value="1">Select User Type</option>
                                                @foreach ($usertype as $type)
                                                    <option value="{{ $type->userTypeId }}">{{ $type->userTypeName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="exampleFormControlSelect1">Location</label>
                                            <select class="selectpicker" name="locationID" multiple>                                          
                                                @foreach ($resultslocationtype as $ltype)
                                                    <option value="{{ $ltype->locationID }}">{{ $ltype->locationName }}</option>
                                                @endforeach
                                            </select>                                            
                                        </div> -->

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Location</label>
                                            <select class="selectpicker" name="locationIDs[]" multiple>                                          
                                                @foreach ($resultslocationtype as $ltype)
                                                    <option value="{{ $ltype->locationID }}">{{ $ltype->locationName }}</option>
                                                @endforeach
                                            </select>                                            
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" name="name" id="Username"
                                                    placeholder="User name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div> -->
                                        <div class="col-md-20">
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="text" class="form-control" name="email" id="Email"
                                                    placeholder="Email address">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" name="phoneNumber"
                                                    id="phoneNumber" placeholder="Phone Number">
                                                @if ($errors->has('phoneNumber'))
                                                    <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address1" id="address1"
                                                    placeholder="Address Line 1">
                                                @if ($errors->has('address1'))
                                                    <span class="text-danger">{{ $errors->first('address1') }}</span>
                                                @endif
                                            
                                                
                                                <input type="text" class="form-control" name="address2" id="address2"
                                                    placeholder="Address Line 2">
                                                @if ($errors->has('address2'))
                                                    <span class="text-danger">{{ $errors->first('address2') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid 
                                                @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid 
                                                @enderror" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>status</label>
                                                <input type="text" class="form-control" name="status"
                                                    placeholder="status">
                                                @if ($errors->has('status'))
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Add
                                                User</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                    Add New User +
                </button>
            </div>
            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="myTable">
                                <thead>
                                    <tr>
                                        <th>index</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phoneNumber</th>
                                        <th>address</th>
                                        {{-- <th>location</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($resultsuser as $data)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phoneNumber }}</td>
                                            <td>{{ $data->address1 }}</td>
                                            {{-- <td>{{ $data->location }}</td> --}}
                                            {{-- <td>,</td> --}}
                                            <td class="text-center">
                                                <a href="{{ route('viewDetails') }}" class="btn btn-success">View</a>
                                                    <a href="#edit{{ $data->id}}" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                                <a href="{{ url('deleteuser/' . $data -> id) }}" class="btn btn-danger"
                                                    onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a>
                                            @include('pages.Registration.action')
                                                </td>
                                            <?php $count += 1; ?>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row (nested) -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    </div>
@endsection
