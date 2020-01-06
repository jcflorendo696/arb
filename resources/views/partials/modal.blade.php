<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/expense/add" method="post">

            <div class="row">
                <div class="col">
                    <div class="form-group"><input type="text" class="form-control" name="amount" placeholder="Amount..."></div>
                </div>

                <div class="col">
                    <div class="form-group"><input type="text" class="form-control" name="description" placeholder="Description..."></div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control col-3">
                            @foreach( $category as $category )
                                <option value="{{ $category->name }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


        
      </div>
      <div class="modal-footer">
            
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Save changes</button>
            
        </form>
      </div>
      
    </div>
  </div>
</div>