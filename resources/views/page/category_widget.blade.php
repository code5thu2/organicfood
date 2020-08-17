<aside class="col-md-4">
    <!-- bbắt đầu category widget -->
    <div class="category-widget">
        <div class="accordion shadow" id="categoryWidget">
            <div class="card">
                <div class="card-header cat-title" id="lever-0">
                    <div class="card-title">
                        <a href=""><span class="mb-0">category</span></a>
                    </div>
                    <div>
                        <div class="card-body">
                            <div id="accordion">
                                <div class="card">
                                    @foreach($parentCat as $model)

                                    <ul class="open-lv1">
                                        <li class="icon-list">
                                            <a href="{{route('home.view',['id' => $model -> id,'slug' => $model -> slug])}}" class="card-link lv1 w-75 text-left">{{$model->name}}</a>
                                            <a class="card-link lv1" data-toggle="collapse" href="#collapse-{{$model->id}}"><i class="fas fa-chevron-right float-right"></i></a>
                                        </li>
                                    </ul>
                                    <!-- lv2 -->
                                    <div id="collapse-{{$model->id}}" class="list-group collapse lv2" data-parent="#accordion" data-toggle="collapse">
                                        @if($model->childCat->count())
                                        @foreach($model->childCat as $sub_model)
                                        <ul class="open">
                                            <li><i class="fas fa-chevron-right"></i>
                                                <a href="{{route('home.view',['id' => $sub_model -> id,'slug' => $sub_model -> slug])}}">{{$sub_model->name}}</a>
                                                @if($sub_model->childCat->count())
                                                <a href="#collapse-{{$sub_model->id}}" data-toggle="collapse"><i class="fa fa-plus float-right"></i></a>
                                                @endif
                                            </li>
                                        </ul>
                                        <div id="collapse-{{$sub_model->id}}" class="panel-collapse collapse" data-parent="#collapse-{{$model->id}}">
                                            <ul class="list-group lv3 mb-3 ml-5">
                                                @if($sub_model->childCat->count())
                                                @foreach($sub_model->childCat as $sm)
                                                <li><a href="{{route('home.view',['id' => $sm -> id,'slug' => $sm -> slug])}}">- {{$sm->name}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div> <!-- lv2 -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <div class="by-price shadow">
            <div class="card text-left">
                <div class="cat-title card-header">
                    <h2 class="card-title">by price</h2>
                </div>
                <div class="card-body p-2">
                    <form action="" method="get">
                        <div class="slidecontainer">
                            <input type="range" name="price_pro" min="1000" max="500000" value="{{Request::get('price_pro') ? Request::get('price_pro') : 10000}}" class="slider" id="myRange">
                            <span> Price: <span id="demo"></span>đ</span>
                            <button type="submit" class="btn float-right filter-price">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="top-seller shadow">
            <div class="card text-left">
                <div class="cat-title card-header">
                    <h2 class="card-title">SẢn phẩm Hot</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @if(isset($pro_hot))
                        @foreach($pro_hot as $ph)
                        <div class="card product-sale w-100">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <img src="{{url('uploads')}}/{{$ph->image}}" class="card-img-top img-sale img-fluid" alt="..." />
                                </div>
                                <div class="col-8">
                                    <div class="text-left card-body name-pro">
                                        <a href="{{route('home.view',['id'=> $ph->id,'slug' => $ph->slug])}}">{{$ph->name}}</a>
                                        <div class="product-rated" data-rating="{{$ph->ratings->avg('number')}}"></div>
                                        <span>{{number_format($ph->price)}} đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-tags shadow">
            <div class="card text-left">
                <div class="cat-title card-header">
                    <h2 class="card-title">popular tags</h2>
                </div>
                <div class="card-body">
                    <div class="widget-contian" id="tag">
                        <div class="tag-div">
                            @if(isset($Tag))
                            @foreach($Tag as $t)
                            <a class="tag-btn" href="{{route('home.view',['id' => $t -> id,'slug' => $t -> slug])}}">{{$t->name}}</a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  kết thúc category widget -->
</aside>
@section('js')
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    $(document).ready(function() {
        $('.orderBy').change(function() {
            $("#form_order_by").submit();
        })
    })
</script>
@stop()