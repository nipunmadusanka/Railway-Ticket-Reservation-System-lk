@section('updatelocation')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Manage Locations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <!--Modal form-->

            <form action="{{ route('add_location') }}" method="POST">

                {{ csrf_field() }}

                <div class="modal-body">

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="form-group">
                                        <label>Location Name</label>
                                        <input type="text" name="locName" class="form-control"
                                            value="{{ $locdata->locationName }}" placeholder="Product Name">
                                    </div> --}}
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Location Type</label>
                                <select class="form-control" name='locationTypeID' id="exampleFormControlSelect1">
                                    <option>Laboratary</option>
                                    <option>Store</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Add Location</button>
                </div>
            </form>
        </div>
    </div>
@endsection
