<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($resultsuser, [ 'method' => 'patch','route' => ['resultsuser.update', $data->id] ]) !!}
                      <div class="mb-3">
                          {!! Form::label('name', 'Name') !!}
                          {!! Form::text('name', $data->name, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3">
                        {!! Form::label('address', 'address') !!}
                        {!! Form::text('address line 1', $data->address1, ['class' => 'form-control']) !!}
                        {!! Form::text('address line 2', $data->address2, ['class' => 'form-control']) !!}
                    </div>

                      <div class="mb-3">
                        {!! Form::label('phoneNumber', 'Phone Number') !!}
                        {!! Form::text('phoneNumber', $data->phoneNumber, ['class' => 'form-control']) !!}
                    </div>


                    <div class="mb-3">
                        {!! Form::label('email', 'email') !!}
                        {!! Form::text('email', $data->email, ['class' => 'form-control']) !!}
                    </div>


                      <div class="mb-3">
                          {!! Form::label('created_at', 'created_at') !!}
                          {!! Form::text('created_at', $data->created_at, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3">
                        {!! Form::label('updated_at', 'updated_at') !!}
                        {!! Form::text('updated_at', $data->updated_at, ['class' => 'form-control']) !!}
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
<div class="modal fade" id="view{{ $data->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">View User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($resultsuser, [ 'method' => 'patch','route' => ['resultsuser.update', $data->id] ]) !!}
                      <div class="mb-3">
                          {!! Form::label('name', 'Name') !!}
                          {!! Form::label('name', $data->name, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3">
                        {!! Form::label('address', 'address') !!}
                        {!! Form::label('address', $data->address1, ['class' => 'form-control']) !!}
                    </div>

                      <div class="mb-3">
                        {!! Form::label('phoneNumber', 'Phone Number') !!}
                        {!! Form::label('phoneNumber', $data->phoneNumber, ['class' => 'form-control']) !!}
                    </div>


                    <div class="mb-3">
                        {!! Form::label('email', 'email') !!}
                        {!! Form::label('email', $data->email, ['class' => 'form-control']) !!}
                    </div>


                      <div class="mb-3">
                          {!! Form::label('created_at', 'created_at') !!}
                          {!! Form::label('created_at', $data->created_at, ['class' => 'form-control']) !!}
                      </div>

                      <div class="mb-3">
                        {!! Form::label('updated_at', 'updated_at') !!}
                        {!! Form::label('updated_at', $data->updated_at, ['class' => 'form-control']) !!}
                    </div>


          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
