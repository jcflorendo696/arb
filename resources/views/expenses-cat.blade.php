
@extends('master')

@section('expenses-category')

<div class="container">

<div class="row">

    <div class="col">
    
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Expenses Category</h4>
                <p class="category">Create or remove categories of your choice.</p>
            </div>
        
            <div class="card-body">
                <div class="col-10 offset-1">
                    <table class="table">
                    
                    <thead>
                        <tr>
                            <th class="text-primary">Category</td>
                            <th class="text-primary">Description</td>
                            <th class="text-primary">Date Created</td>
                            <th class="text-primary">Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach( $cat as $cat )
                            <tr class="expenses-category-rows">
                                <td data-toggle="modal" data-target="#generic-modal{{ $cat->id }}" id="catname_{{ $cat->id }}">{{ $cat->name}}</td>
                                <td data-toggle="modal" data-target="#generic-modal{{ $cat->id }}" id="catdesc_{{ $cat->id }}"> {{ $cat->description }} </td>
                                <td data-toggle="modal" data-target="#generic-modal{{ $cat->id }}"> {{ $cat->created_at }}</td>
                                <td>
                                <form action="/expenses/categories/delete" method="post">
                                    @csrf 
                                    <button type="submit" name="deleteCat" value="{{ $cat->id }}" class="btn btn-danger btn-sm">Delete <i class="fas fa-trash-alt"></i></button>
                                </form>
                                </td>
                            </tr>
                        @include('partials.modal')
                        @endforeach
                    </tbody>
                    </table>

                    <div class="clearfix">
                    <form action="#" method="post" class="form-inline float-right mb-5 mr-4">
                        {{ csrf_field() }}
                        <div class="form-group mr-3">
                            <input type="text" name="name"  class="form-control mr-2" placeholder="Category Name" >
                            <input type="text" name="description" class="form-control" placeholder="Description" >
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Add New Category</button>
                        </div>
                    </form>
                    </div>

                    @include('partials.error')
                </div>
            </div>

        </div>
    
    </div>

</div>

</div>

@endsection

