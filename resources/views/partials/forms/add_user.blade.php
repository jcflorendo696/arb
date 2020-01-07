<form action="/user/add" method="post">
      <div class="row">
        <div class="col">
            <div class="form-group"><input type="text" class="form-control" name="name" placeholder="Name" required></div>
        </div>

        <div class="col">
            <div class="form-group"><input type="email" class="form-control" name="email" placeholder="Email" required></div>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <div class="form-group"><input type="password" class="form-control" name="password" placeholder="Password" required></div>
        </div>

        <div class="col">
            <div class="form-group"><input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <div class="form-group">
            <select name="role" id="roleDropdown" class="form form-control">
            @foreach ( $roles as $role )
            
                <option value="{{ $role->id }} ">{{ $role->role }}</option>
            @endforeach
            </select>
          </div>              
        </div>
      </div>