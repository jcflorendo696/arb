<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="name">Role</label>
            <input type="text" id="name_{{ $cat->id }}" class="form form-control" value="{{ $cat->name }}">
        </div>
    </div>
    <div class="col-8">
        <div class="form-group">
            <label for="email">Description</label>
            <input type="email" id="desc_{{ $cat->id }}" class="form form-control" value="{{ $cat->description }}">
        </div>
    </div>
</div>