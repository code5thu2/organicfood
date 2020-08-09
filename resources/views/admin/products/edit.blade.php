@extends('layouts.admin')
@section('title','Product edit')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Product edit</h4>
    </div>
    <div class="col-md-6">
        <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group">
                <label for="">Product name</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Sale price</label>
                <input type="text" name="sale" value="{{$product->sale}}" class="form-control @error('sale') is-invalid @enderror">
                @error('sale')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" value="{{$product->description}}" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group row" style="height: 150px;overflow-y:auto;">
                <div class="col-12">
                    <label class="col-form-label text-left">Tag thịnh hành</label>
                </div>
                @foreach($tag as $t)
                <?php $checked = in_array($t->name, $tag_assignment) ? 'checked' : ''; ?>
                <div class="col-md-6 pb-2">
                    <input type="checkbox" {{$checked}} name="tag[]" value="{{$t->id}}" data-toggle="toggle" data-size="xs" data-onstyle="primary"> {{$t->name}}
                </div>
                @endforeach
            </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{old('category_id')}}">
                <option value="">Chọn một danh mục</option>
                <?php showCategory($category, $product) ?>
            </select>
            @error('category_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">nhà cung cấp</label>
            <select class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id" value="{{old('supplier_id')}}">
                <option value="">Chọn nhà cung cấp</option>
                @foreach($supplier as $sup)
                <option value="{{$sup->id}}" {{$product->supplier_id == $sup->id ? 'selected' : ''}}>{{$sup->name}}</option>
                @endforeach
            </select>
            @error('supplier_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Đơn vị tính</label>
            <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" value="{{old('unit_id')}}">
                <option value="">Chọn đơn vị tính</option>
                @foreach($unit as $u)
                <option value="{{$u->id}}" {{$product->unit_id == $u->id ? 'selected' : ''}}>{{$u->name}}</option>
                @endforeach
            </select>
            @error('unit_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Trạng thái</label> <br>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" value="{{old('status')}}">
                        <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Ẩn</option>
                        <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Hết hàng</option>
                        <option value="2" {{$product->status == 2 ? 'selected' : ''}}>Còn hàng</option>
                        <option value="3" {{$product->status == 3 ? 'selected' : ''}}>New</option>
                        <option value="4" {{$product->status == 4 ? 'selected' : ''}}>Sale</option>
                        <option value="5" {{$product->status == 5 ? 'selected' : ''}}>Hot</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Product image</label>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control @error('image') is-invalid @enderror" id="image" value="{{url('uploads')}}/{{$product->image}}" name="image">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" href="#modal-upload" data-toggle="modal"><i class="fas fa-plus"></i></button>
                        </div>
                        <img src="{{url('uploads')}}/{{$product->image}}" id="img_show" class="img-fluid mt-2" alt="">
                    </div>
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30" value="{{old('content')}}">{{$product->content}}</textarea>
            @error('content')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Other image</label>
            <div class="input-group mb-3">
                <input type="hidden" name="other_image" class="form-control" id="other_image">
                <div class="input-group-append">
                    <button type="button" data-toggle="modal" data-target="#productId" class="btn btn-outline-primary"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            @error('other_upload')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-deck" id="img_show_list">
            @if($product->images)
            @foreach($product->images as $sub_img)
            <div class="card w-25">
                <img class="card-img-top img-fluid" src="{{url('uploads')}}/{{$sub_img->name}}" alt="">
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="col-6">
        <a href="{{route('admin.products.show',$product->id)}}" class="btn btn-outline-primary btn-block">Back</a>
    </div>
    <div class="col-6">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </div>
    </form>
</div>
@stop()

@section('js')
<script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>
<!-- Modal -->
<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="productTitleId" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('file')}}/dialog.php?akey=iwGeh4J5XFdIc4MVpG5M20BFejSGEw3bJeqpi3Vgm8w&field_id=image" width="100%" height="400px" style="border: 0;overflow-y:auto;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="productId" tabindex="-1" role="dialog" aria-labelledby="productTitleId" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('file')}}/dialog.php?akey=iwGeh4J5XFdIc4MVpG5M20BFejSGEw3bJeqpi3Vgm8w&field_id=other_image" width="100%" height="400px" style="border: 0;overflow-y:auto;" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    $('#productId').on('hide.bs.modal', function() {
        var _img = $('input#other_image').val();
        var img_list = $.parseJSON(_img);
        var _html = '';
        for (var i = 0; i < img_list.length; i++) {
            _html += ' <div class="card w-25">';
            _html += '<img class="card-img-top img-fluid" src="' + img_list[i] + '" alt="">';
            _html += '</div>';
        }
        $('#img_show_list').html(_html);
    });
    $('#modal-upload').on('hide.bs.modal', function() {
        var _img = $('input#image').val();
        $('img#img_show').attr('src', _img);
    });
</script>
@stop()

<?php
function showCategory($category, $p, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {
        $selected = $item->id == $p->category_id ? 'selected' : '';
        $disabled = $item->parent_id == 0 ? 'disabled' : '';
        if ($item->parent_id == $parent_id) {
            echo '<option ' . $disabled . '' . $selected . ' value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($category[$key]);
            showCategory($category, $p, $item->id, $char . ' -- ');
        }
    }
}
?>