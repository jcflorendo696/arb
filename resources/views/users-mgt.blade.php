@extends('master')


@section('users-mgt')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Users Masterlist</h4>
                <button class="btn btn-info btnMemberAddExpense" data-toggle="modal" data-target="#generic-modal">Add New User</button>
            </div>

            <div class="card-body">

            <table class="table">

            <thead>
                <tr>
                    <th class="text-primary">Username</td>
                    <th class="text-primary">Email</td>
                    <th class="text-primary">Role</td>
                    <th class="text-primary">Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach( $users as $user )
                <tr class="user-masterlist-rows" data-toggle="modal" data-target="#update-modal{{ $user->id }}">
                    <td>{{ $user->name}}</td>
                    <td><a href="#">{{ $user->email}}</a></td>
                    <td>{{ $user->getRole->role}}</td>
                    <td> 
                    <form action="/user/delete" method="post">
                        {{ csrf_field() }}
                        <button type="submit" id="btnDelete" value="{{ $user->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                    </form>
                    </td>
                </tr>
                @include('partials.forms.update-modal', [ 
                                    'user' => $user,
                                    'roles' => $roles
                                    ])
                @endforeach
            </tbody>

            </table>
        
            </div>
        </div>
    </div>
</div>
@endsection


@include('partials.modal')