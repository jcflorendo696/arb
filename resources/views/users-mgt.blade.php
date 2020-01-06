@extends('master')


@section('users-mgt')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Users Masterlist</h3>
            </div>

            <div class="card-body">

            <table class="table">

            <thead>
                <tr>
                    <th class="text-primary">Username</td>
                    <th class="text-primary">Email</td>
                    <th class="text-primary">Role</td>
                </tr>
            </thead>

            <tbody>
                @foreach( $users as $user )
                <tr>
                    <td>{{ $user->name}}</td>
                    <td><a href="#">{{ $user->email}}</a></td>
                    <td>{{ $user->getRole->role}}</td>
                </tr>
                @endforeach
            </tbody>

            </table>
        
            </div>
        </div>
    </div>
</div>
@endsection