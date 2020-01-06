
@extends('master')
@section('myexpenses')
<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            
                            <h4 class="card-title">My Expenses</h4>
                            <p class="category">Track your daily expenses and see how it goes.</p>
                            <button class="btn btn-info btnMemberAddExpense" data-toggle="modal" data-target="#exampleModalCenter">Add New Expense</button>
                        </div>

                        <div class="card-body">

                            @if( count($expenses) == 0 )
                            <h2 class="text-center">No Expenses Yet. Add Some!</h2>
                            @else
                            <table class="table">
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
                                        <td> {{ $expense->item }} </td>
                                        <td> {{ $expense->category }} </td>
                                        <td> ${{ $expense->amount }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><h3>Total</h1></td>
                                        <td><h3>00.00</h3></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endsection

            @include('partials.modal')