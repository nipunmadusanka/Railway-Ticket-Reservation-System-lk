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
                            <h5 class="m-b-10">GRN</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('homePage') }}><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">GRN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


<form class="pform">
<div class="col-sm-12" >
  <div class="card">
    
      
      <div class="card-body">
          <h5>Manage GRN</h5>
          <hr>
          
                <div class="card-body">
                  <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suppliers ID</label>
                                <select class="mb-3 form-control">
                                <option>Default select</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User ID</label>
                                <select class="mb-3 form-control">
                                <option>Default select</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location ID</label>
                                <select class="mb-3 form-control">
                                <option>Default select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Note Here"></textarea>
                    </div>
                    
                      <button type="submit" class="btn  btn-primary">Add GRN</button>
                  </form>
              </div> 
            </div>
          </div>
        </div>
        

    
@endsection