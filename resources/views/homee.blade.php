@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.breadcrumbs')
    <div class="row justify-content-center">
        <div class="col-md-12 position-relative">
            <h1 class="d-inline-block">My Expenses</h1>
            
            <div class="card p-4 jc">
                <table class="table-bordered text-center">
                    <tr>
                        <th>Total</th>
                        <th>Item Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    

                    @foreach( $expenses as $expense)
                    <tr>
                        <td>${{ $expense->amount }}</td>
                        <td>{{ $expense->item }}</td>
                        <td>
                            {{ $expense->category}}
                        </td>
                        <td>
                            <form action="/expense/delete" method="post">
                                {{ csrf_field() }}
                                <button type="submit" id="btnDelete" value="{{ $expense->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach




                </table>
            </div>
        </div>
    </div>
</div>

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
@endsection
