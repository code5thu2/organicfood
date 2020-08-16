<div class="card shadow card-pro">
    <div class="img-pro">
        <img class="lazy card-img-top img-fluid" data-src="{{url('uploads')}}/{{$model->image}}" alt="Card image">
        <div class="overlay-pro">
            <ul class="icon-content">
                <li><a href="{{route('home.view',['id'=> $model->id,'slug' => $model->slug])}}" class="icon-pro">
                        <i class="far fa-eye"></i>
                    </a></li>
                <li><a href="#" class="icon-pro">
                        <i class="far fa-heart"></i>
                    </a></li>
                <li><a href="{{route('cart.add',['id'=> $model->id])}}" class="icon-pro">
                        <i class="fas fa-cart-arrow-down"></i>
                    </a></li>
            </ul>
        </div>
    </div>
    <div class="card-body text-center body-pro">
        <span class="card-title title-pro">{{$model->name}}</span>
        <div class="price-pro">
            <span>đ {{$model->sale >0 ? number_format($model->sale) : number_format($model->price)}}</span>
            <span><del>đ {{$model->sale > 0 ? number_format($model->price) : '0.00'}}</del></span>
        </div>
        <div class="buy-now">
            <a href="#" class="btn btn-outline-primary stretched-link"><i class="fas fa-shopping-basket"></i> buy now</a>
        </div>
    </div>
</div>