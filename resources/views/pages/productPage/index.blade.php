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
                            <h5 class="m-b-10">Products</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('homePage') }}><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


<form class="pform">
<div class="col-sm-12" >
  <div class="card">
    
      
      <div class="card-body">
          <h5>Manage Products</h5>
          <hr>
      </div>
          <div class="card-body">
                  <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit Name</label>
                            <input type="text" class="form-control" placeholder="Unit Name">
                        </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                        </div>
                    
                      <button type="submit" class="btn  btn-primary">Add Product</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
          
              


    
@endsection
