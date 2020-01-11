@if( $errors->any() )
<div class="row errors">
    <div class="col-8 offset-2">
        
            <div class="alert alert-danger fade show alert-dismissible">
                @foreach( $errors->all() as $error )
                    <p>- {{ $error }}</p>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
    </div>
</div>
@endif