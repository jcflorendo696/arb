

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
                    <div class="form-group">
                        <input type="checkbox" onclick="isEditable()" name="txtPwEditable" id="txtPwEditable">
                        <label for="memberPassField">Change Password?</label>
                        <input type="password" name="memberPassField" id="memberPassField" class="form-control" value="samplepassword12345" disabled>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="btnUpdatePass" class="btn btn-info" disabled>Submit</button>
                    </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
