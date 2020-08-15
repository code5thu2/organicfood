@extends('layouts.admin')
@section('title','Product detail')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">

    </div>
    <div class="col-md-6">
        <div class="sp-wrap">
            <a href="{{url('uploads')}}/{{$product->image}}"><img src="{{url('uploads')}}/{{$product->image}}" alt="" class="img-fluid"></a>
            @if($product->images->count())
            @foreach($product->images as $i)
            <a href="{{url('uploads')}}/{{$i->name}}"><img src="{{url('uploads')}}/{{$i->name}}" alt="" class="img-fluid"></a>
            @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <h3>{{$product->name}}</h3>
        <div class="tab-regular">
            <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Thông số</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Nội dung</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent7">
                <div class=" tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h5>Price:</h5>
                            </div>
                            <div class="col-6">
                                <p style="margin-top: 2px;">{{number_format($product->price)}}đ / {{$product->unit ? $product->unit->name : ''}}</p>
                            </div>
                            <div class="col-6">
                                <h5>Sale:</h5>
                            </div>
                            <div class="col-6">
                                <p style="margin-top: 2px;">{{number_format($product->sale)}}đ / {{$product->unit ? $product->unit->name : ''}}</p>
                            </div>
                            <div class="col-6">
                                <h5>Danh mục:</h5>
                            </div>
                            <div class="col-6">
                                <p style="margin-top: 2px;">{{$product->cat ? $product->cat->name : 'Không rõ'}}</p>
                            </div>
                            <div class="col-6">
                                <h5>Nhà cung cấp:</h5>
                            </div>
                            <div class="col-6">
                                <p style="margin-top: 2px;">{{$product->sup ? $product->sup->name : 'Không rõ'}}</p>
                            </div>
                            <div class="col-6">
                                <h5>Trạng thái:</h5>
                            </div>
                            <div class="col-6">
                                <select class="form-control-xs" style="margin-top: 2px;" style="background-color: #fff;border:0;" disabled>
                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Ẩn</option>
                                    <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Hết hàng</option>
                                    <option value="2" {{$product->status == 2 ? 'selected' : ''}}>Còn hàng</option>
                                    <option value="3" {{$product->status == 3 ? 'selected' : ''}}>New</option>
                                    <option value="4" {{$product->status == 4 ? 'selected' : ''}}>Sale</option>
                                    <option value="5" {{$product->status == 5 ? 'selected' : ''}}>Hot</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <h5>Tab thịnh hành:</h5>
                            </div>
                            <div class="col-12 mb-2">
                                @if($product->tags->count())
                                @foreach($product->tags as $tag_name)
                                <p class="badge badge-pill badge-secondary">{{$tag_name->name}}</p>
                                @endforeach
                                @endif
                            </div>
                            <a href="{{route('admin.products.index',$product->id)}}" class="btn btn-outline-primary mr-2">Back to list</a>
                            <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                    {!!$product->content!!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">

    </div>
    @stop()
    @section('css')
    <link rel="stylesheet" href="{{url('public')}}/app/smoothproducts/smoothproducts.css">
    @stop()
    @section('js')
    <script src="{{url('public')}}/app/smoothproducts/js/smoothproducts.min.js"></script>
    <script type="text/javascript">
        /* wait for images to load */
        $(window).one("load", function() {
            $('.sp-wrap').smoothproducts();
        });
    </script>
    @stop()