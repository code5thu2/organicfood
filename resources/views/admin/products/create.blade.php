@extends('layouts.admin')
@section('title','Product add new')
@section('main')
<div class="row justify-content-center bg-white p-4">
    <div class="col-12">
        <h4>Product add new</h4>
    </div>
    <div class="col-md-6">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="">Other image</label>
                <div class="input-group mb-3">
                    <input type="text" name="other_image" class="form-control" id="other_image">
                    <div class="input-group-append">
                        <button type="button" data-toggle="modal" data-target="#modelId" class="btn btn-primary">Go!</button>
                    </div>
                </div>
                @error('other_upload')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Category</label>
            <select class="form-control" name="category_id" value="{{old('category_id')}}" class="form-control">
                <option value="">Chọn một danh mục</option>
                <?php showCategory($category) ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">nhà cung cấp</label>
            <select class="form-control" name="supplier_id" value="{{old('supplier_id')}}" class="form-control">
                <option value="0">Chọn nhà cung cấp</option>
                @foreach($supplier as $sup)
                <option value="{{$sup->id}}">{{$sup->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Đơn vị tính</label>
            <select class="form-control" name="unit_id" value="{{old('unit_id')}}" class="form-control">
                <option value="0">Chọn đơn vị tính</option>
                @foreach($unit as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Product image</label>
                    <input type="file" class="form-control-file  @error('upload') is-invalid @enderror" name="upload" placeholder="">
                    @error('upload')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label> <br>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Enable</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" class="custom-control-input" value="0"><span class="custom-control-label">Disable</span>
                    </label>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-deck" id="img_show_list">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="30" value="{{old('content')}}"></textarea>
            @error('content')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add</button>
    </form>
</div>
@stop()
@section('js')
<script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
<script type="text/javascript">
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
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($category[$key]);
            showCategory($category, $item->id, $char . ' -- ');
        }
    }
}
?>