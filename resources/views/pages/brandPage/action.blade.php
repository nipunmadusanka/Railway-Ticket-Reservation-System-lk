
<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->brandID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Brand</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($brand, [ 'method' => 'patch','route' => ['brand.update', $data->brandID] ]) !!}

                      <div class="mb-3 control-label">
                          {!! Form::label('brandName', 'Brand Name') !!}
                          {!! Form::text('brandName', $data->brandName, ['class' => 'form-control']) !!}
                      </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>

  <!-- View Modal -->
<div class="modal fade" id="view{{ $data->brandID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">View Brand</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($brand, [ 'method' => 'patch','route' => ['brand.update', $data->brandID] ]) !!}

                     
                      <div class="form-group">
                        <p class="control-label">Brand Name</p>
                        <input type="text" class="form-control" name="brandName" id="brandName"
                            placeholder="brandName" value="{{ $data->brandName }}" disabled>
                    </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>

