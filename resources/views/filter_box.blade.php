<form action="" method="get">
    <div class="row justify-content-end">
        <div class="col-md-3 mb-1">
            @if($filter)
            <select class="form-control" name="filter">
                <option value="">-- -- --</option>
                @foreach($filter as $f)
                <option {{Request::get('filter') == $f['value'] ? 'selected' : ''}} value="{{$f['value']}}">{{$f['name']}}</option>
                @endforeach
            </select>
            @endif
        </div>
        @if($status_query)
        <div class="col-md-3 mb-1 ">
            <select class="form-control" name="status">
                <option value="">All</option>
                @foreach($status_query as $key => $s)
                <option {{Request::get('status') == $key ? 'selected' : ''}} value="{{$key}}">{{$s}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="col-md-6 mb-1 input-group">
            <input type="text" name="key" placeholder="Tìm kiếm..." class="form-control">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>