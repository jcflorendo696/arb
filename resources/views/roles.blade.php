@extends('master') 



@section('roles')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3>Roles Management</h3>
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
                        <tr>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                            @if( $role->role == 'Administrator')
                            
                            @else
                            
                                <form action="/role/delete" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" id="btnRoleDelete" value="{{ $role->id }}" class="btn btn-danger btn-sm" name="btnDelete">Delete <i class="fas fa-trash-alt"></i></button> 
                                </form>                       
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            
                <div class="clearfix">
                    <form action="/role/add" method="post" class="form-inline float-right mb-5 mr-5">
                        {{ csrf_field() }}
                        <div class="form-group mr-3">
                            <input type="text" name="name" id="" class="form-control mr-2" placeholder="Role Name">
                            <input type="text" name="description" id="" class="form-control" placeholder="Description">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Add New Role</button>
                        </div>
                    </form>
                </div>



                    @if( $errors->any() )
                    <div class="alert alert-danger">
 
                            @foreach ($errors->all() as $error)
                                <p>- {{ $error }}</p>
                            @endforeach

                    </div>
                    @endif
                </div>

            </div> <!-- .card-body end -->
        </div>
    </div>
</div>
@endsection