@extends('layouts.admin')
@section('title','Category list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white text-center">
        <div class="row pb-2">
            <div class="col-4">
                <a href="{{route('admin.categories.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
                <a href="{{route('admin.categories.trash')}}" class="btn btn-warning float-left ml-2"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
            <div class="col-8">
            <?php
                $filter = [
                    0 => [
                        'value' => 'id_f',
                        'name' => 'Mã danh mục'
                    ],
                    1 => [
                        'value' => 'name_f',
                        'name' => 'Tên danh mục'
                    ],
                ];
                $status_query = [];
                ?>
                @include('filter_box',['filter' => $filter,'status_query' => $status_query])
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>Mã</th>
                    <th>Name</th>
                    <th>số sản phẩm</th>
                    <th>Vị trí</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                tableCategory($category) ?>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$category->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@stop()
<?php

function tableCategory($category, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {

        $statusColor = $item->status == 1 ? 'text-success' : 'text-danger';
        $status = $item->status == 1 ? 'Enable' : 'Disable';
        $prioty = $item->prioty == 1 ? 'Menu' : 'Slide';
        $check_pr = $item->prioty == '' ? '-- -- --' : $prioty;
        echo '<tr>';
        echo ' <td scope="row">#' . $item->id . '</td>';
        echo ' <td class="text-left">' . $char . $item->name . '</td>';
        echo ' <td >' . $item->products->count() . '</td>';
        echo ' <td >' . $check_pr  . '</td>';
        echo ' <td>' . date_format($item->created_at, 'd-m-Y') . '</td>';
        echo '  <td class="' . $statusColor . '">' . $status . '</td>';
        echo ' <td>';
        echo '
                    <div class="dropdown">
                        <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="' . route('admin.categories.edit', $item->id) . '" class="dropdown-item">Edit category</a>
                            <form action="' . route('admin.categories.destroy', $item->id) . '" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                            ' . csrf_field() . '
                                <button type="submit" class="dropdown-item" onclick="return confirm(\'Bạn có chắc chắn muốn xóa danh mục này\')">Delete</button>
                            </form>
                        </div>
                    </div>';
        echo '</td>';
        echo '</tr>';
        if ($item->childCat->count()) {
            tableCategory($item->childCat, $item->id, $char . ' -- ');
        }
        //tableCategory($category, $item->id, $char . ' -- ');

    }
}
?>