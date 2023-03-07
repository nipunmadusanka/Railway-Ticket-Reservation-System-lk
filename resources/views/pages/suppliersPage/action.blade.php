
<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->supplierID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Supplier</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($supplier, [ 'method' => 'patch','route' => ['supplier.update', $data->supplierID] ]) !!}
                      <div class="mb-3 control-label">
                          {!! Form::label('supplierName', 'Supplier Name') !!}
                          {!! Form::text('supplierName', $data->supplierName, ['class' => 'form-control']) !!}
                      </div>
                      <div class="mb-3 control-label">
                          {!! Form::label('phoneNumber', 'Phone Number') !!}
                          {!! Form::text('phoneNumber', $data->phoneNumber, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3 control-label">
                          {!! Form::label('email', 'Email') !!}
                          {!! Form::text('email', $data->email, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3 control-label">
                          {!! Form::label('address', 'Address') !!}
                          {!! Form::text('address line 1', $data->address1, ['class' => 'form-control']) !!}
                          {!! Form::text('address line 2', $data->address2, ['class' => 'form-control']) !!}
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
<div class="modal fade" id="view{{ $data->supplierID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">View Supplier</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($supplier, [ 'method' => 'patch','route' => ['supplier.update', $data->supplierID] ]) !!}
                      {{-- <div class="mb-3">
                          {!! Form::label('supplierName', 'Supplier Name') !!}
                          {!! Form::label('supplierName', $data->supplierName, ['class' => 'form-control']) !!}
                      </div> --}}
                      <div class="form-group">
                        <p class="control-label">Supplier Name</p>
                        <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{$data->supplierName}}" disabled>
                    </div>
                      <div class="form-group">
                        <p class="control-label">Phone Number</p>
                        <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->phoneNumber }}" disabled>
                    </div>
                      
                      
                      <div class="form-group">
                        <p class="control-label">Email</p>
                        <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->email }}" disabled>
                    </div>

                    
                      <div class="form-group">
                        <p class="control-label">Address</p>
                        <input type="text" class="form-control" name="locationName" id="locationName" placeholder="locationName" value="{{ $data->address1 }}" disabled>
                    </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
