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
                                <h5 class="m-b-10">GDN</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{ route('homePage') }}><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">GDN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <form class="pform">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <h5>Manage GDN</h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dispatch Location</label>
                                            <select class="mb-3 form-control">
                                                <option>Default select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Issued Location</label>
                                            <select class="mb-3 form-control">
                                                <option>Default select</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="exampleFormControlTextarea1">Note</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Note Here"></textarea>
                                    </div>

                                    <div>
                                        <hr>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlTextarea1">Items</label>
                                        <input type="search" id="form1" class="form-control" placeholder="Type item"
                                            aria-label="Search" />
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="exampleFormControlTextarea1">Quantity</label>
                                        <input type="search" id="form1" class="form-control" placeholder="Quantity"
                                            aria-label="Search" />
                                    </div>


                                    <div class="add-btn col-md-4">
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </div>


                                    <div style="margin-top: 50px">
                                        <table class="table">
                                            <thead class="table-dark"></thead>
                                            <tbody>
                                                <tr>
                                                    <th>GDN ID</th>
                                                    <th>Dispatch Location</th>
                                                    <th>Issued Location</th>
                                                    <th>Products</th>
                                                    <th>Created Date</th>
                                                    <th>Update Date</th>
                                                    <th>Actions</th>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn  btn-primary">Add GDN</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endsection
