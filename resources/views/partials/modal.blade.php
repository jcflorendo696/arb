

<!-- Modal -->


@if( Route::current()->getName() == "expenses-category" )
<div class="modal fade" id="generic-modal{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
@else
<div class="modal fade" id="generic-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
@endif

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        @if( Route::current()->getName() == "dashboard" )
        <h5 class="modal-title" id="exampleModalLongTitle">New Expense</h5>
        @elseif ( Route::current()->getName() == "users")
        <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
        @elseif ( Route::current()->getName() == "expenses-category")
        <h5 class="modal-title" id="exampleModalLongTitle">Update Expenses Details</h5>
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
            @elseif ( Route::current()->getName() == 'expenses-category')
                @include('partials.forms.update-category')
            @endif
              

            <div class="row errors">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{ csrf_field() }}
          @if( Route::current()->getName() == "users" )
        <button type="submit" id="btnCreateUser" class="btn btn-primary">Create User</button>
          @elseif( Route::current()->getName() == "dashboard" )
        <button type="submit" id="btnAddExpense" class="btn btn-primary">Add Expense</button>
          @elseif( Route::current()->getName() == "expenses-category" )
        <button type="submit" id="{{ $cat->id }}" value="{{ $cat->id }}" class="btn btn-primary btnUpdateCateg">Save Changes</button>
          @endif
      </div>
      </div>
      
    </div>
  </div>
</div>