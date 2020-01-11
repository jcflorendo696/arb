@extends('master')


@section('users-mgt')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Masterlist</h4>
                <p class="category">Check and adjust user permissions and privileges.</p>
                <button class="btn btn-info btnMemberAddExpense" data-toggle="modal" data-target="#generic-modal">Add New User</button>
            </div>

            <div class="card-body">

                <div class="col-8 offset-2">
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
                        <tr class="user-masterlist-rows">
                            <td id="name_{{$user->id}}" data-toggle="modal" data-target="#update-modal{{ $user->id }}">{{ $user->name}}</td>
                            <td id="email_{{$user->id}}" data-toggle="modal" data-target="#update-modal{{ $user->id }}"><a href="#">{{ $user->email}}</a></td>
                            <td id="role_{{$user->id}}" data-toggle="modal" data-target="#update-modal{{ $user->id }}">{{ $user->getRole->role}}</td>
                            <td> 
                            <form action="/user/delete" method="post">
                                {{ csrf_field() }}
                                <button type="submit" id="btnDelete_{{ $user->id }}" value="{{ $user->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                            </form>
                            </td>
                        </tr>
                        @include('partials.forms.update-modal')
                        @endforeach
                        @include('partials.modal')
                    </tbody>

                    </table>
                </div>
        
            </div>
        </div>
    </div>
</div>

@endsection


