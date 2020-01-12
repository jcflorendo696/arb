@extends('master') 



@section('roles')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Roles Management</h4>
                <p class="category">Customize system roles and permissions.</p>
            </div>


            <div class="card-body">



                <div class="col-8 offset-2">
                <table class="table">
                    
                    <thead>
                        <tr>
                            <th class="text-primary">Role Name</th>
                            <th class="text-primary">Description</th>
                            <th class="text-primary">Action</th>
                        </tr>
                    </thead>

                    @foreach( $roles as $role )
                        <tr class="role-list-rows">
                            
                            <td data-toggle="modal" id="role_{{ $role->id }}" data-target="#update-modal{{ $role->id }}">{{ $role->role }} </td>
                            <td data-toggle="modal" id="description_{{ $role->id }}" data-target="#update-modal{{ $role->id }}">{{ $role->description }}</td>
                            
                            <td>
                            @if( $role->role == 'Administrator')
                            @else
                                <form action="/role/delete" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" id="btnRoleDelete_{{ $role->id }}" value="{{ $role->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                                </form>                       
                            @endif
                            </td>
                        </tr>
                    @include('partials.forms.roles-modal')
                    @endforeach
                </table>
            
                <div class="clearfix">
                    <form action="/role/add" method="post" class="form-inline float-right mb-5 mr-5">
                        {{ csrf_field() }}
                        <div class="form-group mr-3">
                            <input type="text" name="name"  class="form-control mr-2" placeholder="Role Name" required>
                            <input type="text" name="description" class="form-control" placeholder="Description" required>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Add New Role</button>
                        </div>
                    </form>
                </div>



                @include('partials.error')
                </div>

            </div> <!-- .card-body end -->
        </div>
    </div>
</div>
@endsection