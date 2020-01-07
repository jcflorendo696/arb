

@extends('master')

@section('settings_page')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3>Account Settings</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    
                    <div class="col-6 offset-3">
                        <form action="/settings/changepass" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="checkbox" onclick="isEditable()" name="txtPwEditable" id="txtPwEditable">
                            <label for="memberPassField">Change Password?</label>
                            <input type="password" name="new_password" id="memberPassField" class="form-control" value="samplepassword12345"  disabled>
                        </div>

                        <div class="form-group">
                            <button type="submit" id="btnUpdatePass" class="btn btn-info" disabled>Submit</button>
                        </div>
                        </form>

                        @if( $errors->any() )
                        <div class="alert alert-danger fade show alert-dismissible">
                            @foreach( $errors->all() as $error )
                                <p>{{ $error }}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if( session('msg') )
                        <div class="alert alert-success fade show alert-dismissible">
                            <p>{{ session('msg') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
