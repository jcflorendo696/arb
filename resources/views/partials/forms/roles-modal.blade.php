<!-- Modal -->
<div class="modal fade" id="update-modal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle">Update Role Details</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="name">Role</label>
                    <input type="text" id="name_{{ $role->id }}" class="form form-control" value="{{ $role->role }}">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="email">Description</label>
                    <input type="email" id="desc_{{ $role->id }}" class="form form-control" value="{{ $role->description }}">
                </div>
            </div>
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnUpdateRole_{{ $role->id }}" value="{{ $role->id }}" class="btnUpdateRole btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>