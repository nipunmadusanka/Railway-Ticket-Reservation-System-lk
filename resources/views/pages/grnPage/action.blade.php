<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit GRN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">

                        {!! Form::model($grn, ['method' => 'patch', 'route' => ['grn.update', $data->id]]) !!}
                        {{-- <div class="mb-3">
                          {!! Form::label('note', 'Note') !!}
                          {!! Form::text('note', $data->note, ['class' => 'form-control']) !!}
                      </div> --}}
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Supplier</label>
                            <select class="form-control" name="SupplierID">
                                <option value="1">{{ $data->supplierName }}</option>
                                @foreach ($supplier as $supplier)
                                    <option value="{{ $supplier->supplierID }}">{{ $supplier->supplierName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Location</label>
                            <select class="form-control" name="locationID">
                                <option value="1">{{ $data->locationName }}</option>
                                @foreach ($location as $location)
                                    <option value="{{ $location->locationID }}">{{ $location->locationName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input type="text" class="form-control" name="note" id="note" placeholder="note"
                                value="{{ $data->note }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Cancel</button>
                {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="view{{ $data->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">View GRN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::model($grn, ['method' => 'patch', 'route' => ['grn.update', $data->id]]) !!}
                {{-- <div class="mb-3">
                        {!! Form::label('supplierName', 'Supplier') !!}
                        {!! Form::label('Supplier', $data->supplierName, ['class' => 'form-control']) !!}
                    </div> --}}
                <div class="form-group">
                    <label>Supplier</label>
                    <input type="text" class="form-control" name="supplierName" id="supplierName"
                        placeholder="supplierName" value="{{ $data->supplierName }}" disabled>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                {{-- <div class="mb-3">
                        {!! Form::label('locationName', 'Location') !!}
                        {!! Form::label('location', $data->locationName, ['class' => 'form-control']) !!}
                    </div> --}}
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="locationName" id="locationName"
                        placeholder="locationName" value="{{ $data->locationName }}" disabled>
                </div>
                {{-- <div class="mb-3">
                        {!! Form::label('user', 'User') !!}
                        {!! Form::label('name', $data->name, ['class' => 'form-control']) !!}
                    </div> --}}
                <div class="form-group">
                    <label>User</label>
                    <input type="text" class="form-control" name="User" id="User" placeholder="User"
                        value="{{ $data->name }}" disabled>
                </div>
                {{-- <div class="mb-3">
                        {!! Form::label('note', 'Note') !!}
                        {!! Form::label('note', $data->note, ['class' => 'form-control']) !!}
                    </div> --}}
                <div class="form-group">
                    <label>Note</label>
                    <input type="text" class="form-control" name="note" id="note" placeholder="note"
                        value="{{ $data->note }}" disabled>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Cancel</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
{{-- <div class="modal fade" id="viewproduct{{ $data->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">View GRN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($grn, [ 'method' => 'patch','route' => ['grn.update', $data->id] ]) !!}
                      <div class="mb-3">
                          {!! Form::label('note', 'Note') !!}
                          {!! Form::label('note', $data->note, ['class' => 'form-control']) !!}
                      </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div> --}}
