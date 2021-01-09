@extends('layouts.admin')
@section('title','Product add new')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Product add new</h4>
    </div>
    <div class="col-md-6">
        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Sale price</label>
                <input type="text" name="sale" value="{{old('sale')}}" class="form-control @error('sale') is-invalid @enderror">
                @error('sale')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group row" style="height: 150px;overflow-y:auto;">
                <div class="col-12">
                    <label class="col-form-label text-left">Tag thịnh hành</label>
                </div>
                @foreach($tag as $t)
                <div class="col-md-6 pb-2">
                    <input type="checkbox" name="tag[]" value="{{$t->id}}" data-toggle="toggle" data-size="xs" data-onstyle="primary"> {{$t->name}}
                </div>
                @endforeach
            </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{old('category_id')}}">
                <option value="">Chọn một danh mục</option>
                <?php showCategory($category) ?>
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
                <option value="{{$sup->id}}">{{$sup->name}}</option>
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
                <option value="{{$u->id}}">{{$u->name}}</option>
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
                        <option value="0">Ẩn</option>
                        <option value="1">Hết hàng</option>
                        <option value="2">Còn hàng</option>
                        <option value="3">New</option>
                        <option value="4">Sale</option>
                        <option value="5">Hot</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Product image</label>
                    @include('image_box')
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30" value="{{old('content')}}">{{old('content')}}</textarea>
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
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelId"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            @error('other_upload')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-deck" id="img_show_list">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add</button>
    </form>
</div>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ảnh khác</h5>
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
@stop()

@section('js')
<script>
    $('#modelId').on('hide.bs.modal', function() {
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
</script>
@stop()

<?php
function showCategory($category, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {
        $disabled = $item->parent_id == 0 ? 'disabled' : '';
        if ($item->parent_id == $parent_id) {
            echo '<option ' . $disabled . ' value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($category[$key]);
            showCategory($category, $item->id, $char . ' -- ');
        }
    }
}
?>