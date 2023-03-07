<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Mange Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">

                    {!! Form::model($product, [ 'method' => 'patch','route' => ['product.update', $data->id] ]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From</label>
                                <select name="from" class="form-control" placeholder="from">
                                        <option value="clombo">Colombo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>To</label>
                                <select name="to" class="form-control" placeholder="To">
                                        <option value="500">Galle</option>
                                        <option value="700">Matara</option>
                                        <option value="600">Kandy</option>
                                        <option value="900">Badulla</option>
                                        <option value="400">Kurunagala</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group control-label">
                                {!! Form::label('children', 'children',) !!}
                                {!! Form::text('children', $data->children, ['class' => 'form-control']) !!}
                            </div>
                        </div>



                    <div class="mb-3 control-label">
                        {!! Form::label('adult', 'adult') !!}
                        {!! Form::text('adult', $data->adult, ['class' => 'form-control']) !!}

                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade " class="modal-dialog modal-dialog-centered" id="view{{ $data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Manage Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="control-label">Ticket ID</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->id }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="control-label">User Name</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="control-label">From</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->from }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="control-label">Full Price</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->to }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p class="control-label">Children</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->children }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p class="control-label">Adult</p>
                                <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->adult }}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
