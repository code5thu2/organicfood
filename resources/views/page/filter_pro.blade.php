<div class="col-sm-12 col-xs-12 mb-5">
    <div class="filter-pro">
        <div class="r-part w-100">
            <div class="shorting-box-1 float-right">
                <form id="form_order_by" method="get">
                    <label class="shorting-label">Short By:</label>
                    <select name="orderBy" class="orderBy">
                        <option value="">Default</option>
                        <option value="ASC" {{Request::get('orderBy') == 'ASC' ? 'selected' : ''}}>A To Z</option>
                        <option value="DESC" {{Request::get('orderBy') == 'DESC' ? 'selected' : ''}}>Z To A</option>
                        <option value="price_max" {{Request::get('orderBy') == 'price_max' ? 'selected' : ''}}>Giá tăng dần</option>
                        <option value="price_min" {{Request::get('orderBy') == 'price_min' ? 'selected' : ''}}>Giá giảm dần</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function() {
        $('.orderBy').change(function() {
            $("#form_order_by").submit();
        })
    })
</script>
@stop()