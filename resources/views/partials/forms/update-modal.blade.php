<!-- Modal -->
<div class="modal fade" id="update-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle">Update User Details</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form form-control" value="{{ $user->email }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form form-control" value="samplepassword12345">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="roleDropdown" class="form form-control">
                    @foreach ( $roles as $role )
                        <option value="{{ $role->id }} ">{{ $role->role }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnUpdateUser" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>