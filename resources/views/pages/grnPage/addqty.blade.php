<div class="modal fade" id="qty{{ $data->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">
                    Add QTY to GRN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Modal form-->
                    <div class="card-body">

                        <div class="row">
                        <form>

                            <div class="form-group">
                                <label>Product ID</label>
                                <input type="text" class="form-control" id="idTextField" value="{{ $data->id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="prdctTextField" value="{{ $data->ProductName }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Brand</label>
                                <select class="form-control" id="brandTextField">
                                    @foreach ($brand as $brand)
                                        <option value="{{ $brand->brandName }}">
                                            {{ $brand->brandName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" id="qtyTextField">
                            </div>
                        </form>
                        </div>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="addItemToTable()">Add</button>
            </div>
        </div>
    </div>
</div>
