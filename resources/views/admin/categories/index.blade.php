@extends('layouts.admin')
@section('title','Category list')
@section('main')
<div class="row">
    <div class="col-12 table-responsive p-3 bg-white">
        <div class="row pb-2">
            <div class="col-8">
                <a href="{{route('categories.create')}}" class="btn btn-outline-primary float-left"><i class="fas fa-plus"></i> ADD NEW</a>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Go!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class=" thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php tableCategory($category) ?>
                <!-- @foreach($category as $model)
                <tr>
                    <td scope="row">{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->parent_id == 0 ? 'Parent' : $model->parentCat->name}}</td>
                    <td class="{{$model->status == 1 ? 'text-success' : 'text-danger'}}">{{$model->status == 1 ? 'Enable' : 'Disable'}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('categories.edit',$model->id)}}" class="dropdown-item">Edit category</a>
                                <form action="{{route('categories.destroy',$model->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach -->
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="mt-3 col-12">
                {{$category->links()}}
            </div>
        </div>
    </div>
</div>
@stop()
<?php
function tableCategory($category, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {

        if ($item->parent_id == $parent_id) {
            $statusColor = $item->status == 1 ? 'text-success' : 'text-danger';
            $status = $item->status == 1 ? 'Enable' : 'Disable';
            if ($item->parent_id != 0) {
                $parentName = $item->parentCat->name;
            }
            $parent = $item->$parent_id == 0 ? 'parent' : $parentName;
            echo '<tr>';
            echo ' <td scope="row">' . $item->id . '</td>';
            echo ' <td>' . $char . $item->name . '</td>';
            echo ' <td>' . $parent . '</td>';
            echo '  <td class="' . $statusColor . '">' . $status . '</td>';
            echo ' <td>';
            echo '
                    <div class="dropdown">
                        <a href="#" class=" card-drop" data-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="' . route('categories.edit', $item->id) . '" class="dropdown-item">Edit category</a>
                            <form action="' . route('categories.destroy', $item->id) . '" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                               ' . csrf_field() . '
                                <button type="submit" class="dropdown-item" onclick="return confirm(\'Bạn có chắc chắn muốn xóa danh mục này\')">Delete</button>
                            </form>
                        </div>
                    </div>';
            echo '</td>';
            echo '</tr>';
            unset($category[$key]);
            tableCategory($category, $item->id, $char . ' -- ');
        }
    }
}
?>