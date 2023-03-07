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
                            <h5 class="m-b-10">Suppliers</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('homePage') }}><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Suppliers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


<form class="pform">
<div class="col-sm-12" >
  <div class="card">
    
      
      <div class="card-body">
          <h5>Manage Suppliers</h5>
          <hr>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
              <div class="col-md-6">
                      <div class="form-group">
                          <label>Suppliers ID</label>
                          <input type="text" class="form-control" placeholder="Suppliers ID">
                      </div>
              </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Suppliers Name</label>
                        <input type="text" class="form-control" placeholder="Suppliers Name">
                    </div>
                </div>
                <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact Number">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
          </div>


                      

                
                      <button type="submit" class="btn  btn-primary">Add Suppliers</button>
                  </form>
              </div>
            </div>
          </div>

@endsection