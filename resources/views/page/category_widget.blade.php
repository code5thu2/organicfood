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
                                    <div class="product-rating" data-rating="3.7"></div>
                                    <ul class="open-lv1">
                                        <li class="icon-list">
                                            <a href="" class="card-link lv1 w-75">{{$model->name}}</a>
                                            <a class="card-link lv1" data-toggle="collapse" href="#collapse-{{$model->id}}"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                    <!-- lv2 -->
                                    <div id="collapse-{{$model->id}}" class="list-group collapse lv2" data-parent="#accordion" data-toggle="collapse">
                                        @if($model->childCat)
                                        @foreach($model->childCat as $sub_model)
                                        <ul class="open">
                                            <li><i class="fas fa-chevron-right"></i><a data-toggle="collapse" href="#collapse-{{$sub_model->id}}">{{$sub_model->name}}<i class="fa fa-plus float-right"></i></a>
                                            </li>
                                        </ul>
                                        <div id="collapse-{{$sub_model->id}}" class="panel-collapse collapse" data-parent="#collapse-{{$model->id}}">
                                            <ul class="list-group lv3 mb-3 ml-5">
                                                <li><a href="">- Spinach</a></li>
                                                <li><a href="">- Spring Onion</a></li>
                                                <li><a href="">- Cabbage</a></li>
                                                <li><a href="">- Spinach</a></li>
                                                <li><a href="">- Lettuce</a></li>
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
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="top-seller shadow">
            <div class="card text-left">
                <div class="cat-title card-header">
                    <h2 class="card-title">top seller</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="card product-sale w-100">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img src="images/product/product-img.jpg" class="card-img-top img-sale" alt="..." />
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-left card-body name-pro">
                                        <span class="name-pro-sale">jessica simpon</span>
                                        <div class="product-rating" data-rating="4"></div>
                                        <span>$ 23.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card product-sale w-100">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img src="images/product/product-img.jpg" class="card-img-top img-sale" alt="..." />
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-left card-body name-pro">
                                        <span class="name-pro-sale">jessica simpon</span>
                                        <div class="product-rating" data-rating="4"></div>
                                        <span>$ 23.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card product-sale w-100">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img src="images/product/product-img.jpg" class="card-img-top img-sale" alt="..." />
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-left card-body name-pro">
                                        <span class="name-pro-sale">jessica simpon</span>
                                        <div class="product-rating" data-rating="4"></div>
                                        <span>$ 23.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <a class="tag-btn" href="#">Cucumber</a>
                            <a class="tag-btn" href="#">Vegetables</a>
                            <a class="tag-btn" href="#">Fruits</a>
                            <a class="tag-btn" href="#">Organic Food</a>
                            <a class="tag-btn" href="#">Food</a>
                            <a class="tag-btn" href="#">True Natural</a>
                            <a class="tag-btn" href="#">Garden</a>
                            <a class="tag-btn" href="#">Green</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  kết thúc category widget -->
</aside>