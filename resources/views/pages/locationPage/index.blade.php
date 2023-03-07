@extends('layouts.app')

@section('content')

{{-- breadCrumb --}}

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Locations</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('homePage') }}><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Locations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


<form class="pform">
<div class="col-sm-12" >
  <div class="card">


      <div class="card-body">
          <h5>Manage Locations</h5>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
              <div class="col-md-6">
                      <div class="form-group">
                          <label>Location ID</label>
                          <input type="text" class="form-control" placeholder="Location ID">
                      </div>
              </div>

              <div class="col-md-6">
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" class="form-control" placeholder="Location Name">
                    </div>

              </div>
          </div>

                    <button type="submit" class="btn  btn-primary">Add Location</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
