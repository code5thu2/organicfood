<div class="container-fluid sub-banner">
    <img src="{{url('public')}}/app/images/banner/adli-wahid-nmF_6DxByAw-unsplash.jpg" class="img-fluid" alt="" />
</div>
<div class="container">
    <div class="row">
        <div class="breadcrumb-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$br_item}}</li>
            </ol>
            @if($data != '')
            <h1>{{$data->name}}</h1>
            @endif
        </div>
    </div>
</div>