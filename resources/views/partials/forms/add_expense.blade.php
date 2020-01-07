<form action="/expense/add" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group"><input type="text" class="form-control" name="amount" placeholder="Amount..."></div>
                </div>

                <div class="col">
                    <div class="form-group"><input type="text" class="form-control" name="description" placeholder="Description..."></div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control col-3">
                            @foreach( $category as $category )
                                <option value="{{ $category->name }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
