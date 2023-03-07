

<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->locationID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Location</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($location, [ 'method' => 'post','route' => ['location.update', $data->locationID] ]) !!}
                      <div class="mb-3 control-label">
                          {!! Form::label('locationName', 'Location Name') !!}
                          {!! Form::text('locationName', $data->locationName, ['class' => 'form-control']) !!}
                      </div>
                      <div class="mb-3 control-label">
                          {!! Form::label('locationID', 'Location ID') !!}
                          {!! Form::text('locationID', $data->locationID, ['class' => 'form-control']) !!}
                      </div>
                      <div class="mb-3 control-label">
                          {!! Form::label('locationTypeID', 'Location Type ID') !!}
                          {!! Form::text('locationTypeID', $data->locationTypeName, ['class' => 'form-control']) !!}
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

<!-- view Modal -->
<div class="modal fade" id="view{{ $data->locationID}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">View Location</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                      {{-- <div class="mb-3">
                          {!! Form::label('locationName', 'Location Name') !!}
                          {!! Form::label('locationName', $data->locationName, ['class' => 'form-control']) !!}
                      </div> --}}
                      <div class="form-group">
                        <p class="control-label">Location Name</p>
                        <input type="text" class="form-control" name="locationName" id="locationName"
                            placeholder="locationName" value="{{ $data->locationName }}" disabled>
                    </div>
                      {{-- <div class="mb-3">
                          {!! Form::label('locationID', 'Location ID') !!}
                          {!! Form::label('locationID', $data->locationID, ['class' => 'form-control']) !!}
                      </div> --}}
                      <div class="form-group">
                        <p class="control-label">Location ID</p>
                        <input type="text" class="form-control" name="locationID" id="locationID"
                            placeholder="locationID" value="{{ $data->locationID }}" disabled>
                    </div>

                      {{-- <div class="mb-3">
                        {!! Form::label('locationTypeID', 'Location Type ID') !!}
                        {!! Form::label('locationTypeID', $data->locationTypeID, ['class' => 'form-control']) !!}
                    </div> --}}
                    <div class="form-group">
                        <p class="control-label">Location Type</p>
                        <input type="text" class="form-control" name="locationType" id="locationType"
                            placeholder="locationType" value="{{ $data->locationTypeName }}" disabled>
                    </div>


          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>

          </div>
      </div>
    </div>
  </div>

