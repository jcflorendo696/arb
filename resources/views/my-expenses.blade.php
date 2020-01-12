
@extends('master')
@section('myexpenses')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                
                <h4 class="card-title">My Expenses</h4>
                <p class="category">Track your daily expenses and see how it goes.</p>
                <button class="btn btn-info btnMemberAddExpense" data-toggle="modal" data-target="#generic-modal">Add New Expense</button>
            </div>

            <div class="card-body">


                <div class="col-10 offset-1">
                    
                    @if( count($expenses) == 0 )
                    <h2 class="text-center">No Expenses Yet. Add Some!</h2>
                    @else
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th class="text-primary">Action</th>
                            <th class="text-primary">Description</th>
                            <th class="text-primary">Category</th>
                            <th class="text-primary">Amount</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach( $expenses as $expense )
                            <tr>    
                                <td> 
                                    <form action="/expense/delete" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" id="btnDelete" value="{{ $expense->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                                    </form>
                                </td>
                                <td data-toggle="modal" data-target="#expense_modal_{{ $expense->id }}"> {{ $expense->item }} </td>
                                <td> {{ $expense->category }} </td>
                                <td> ${{ number_format($expense->amount,'2') }}</td>
                            </tr>
                            
                            @endforeach
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td><h3>Total</h1></td>
                                <td><h3>${{ number_format($total,'2') }}</h3></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    @endif
                    @include('partials.modal')
                    @include('partials.error')
                </div>
            </div>
        </div>
    </div>

    
<!-- </div> Commenting this out. Causes layout issues when activated. Jan. 12, 2020 - Jc. Florendo -->

@endsection
   
