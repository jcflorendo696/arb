<!-- 
  *  New Expense Modal - 'members'
  -->

<!-- Modal -->
<div class="modal fade" id="generic-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        @if( Route::current()->getName() == "dashboard" )
        <h5 class="modal-title" id="exampleModalLongTitle">New Expense</h5>
        @elseif ( Route::current()->getName() == "users")
        <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
        @endif

        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            @if( Route::current()->getName() == "dashboard" )
                @include('partials.forms.add_expense')
            @elseif( Route::current()->getName() == "users")
                @include('partials.forms.add_user')
            @endif
              <div class="row">
                  <div class="col">
                    <div class="form-group">
                      {{ csrf_field() }}
                      @if( Route::current()->getName() == "users" )
                      <button type="submit" id="btnCreateUser" class="btn btn-info">Create User</button>
                      @elseif( Route::current()->getName() == "dashboard" )
                      <button type="submit" id="btnAddExpense" class="btn btn-info">Add Expense</button>
                      @endif
                    </div>              
                  </div>
                </div>
              </form>

              <div class="row">
                  <div class="col-8 offset-2">
                    @if( $errors->any() )
                        <div class="alert alert-danger fade show alert-dismissible">
                            @foreach( $errors->all() as $error )
                                <p>{{ $error }}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                  </div>
              </div>
      </div>
      
      <div class="modal-footer">
          <small>© 2020 - Expense Manager.</small>
      </div>
      </div>
      
    </div>
  </div>
</div>