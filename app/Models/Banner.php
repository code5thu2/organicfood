<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'image', 'link', 'position', 'description', 'sub_description', 'status', 'prioty'];
    public function createBan($request)
    {
        $img = str_replace(url('uploads') . '/', '', $request->image);
        $request->merge(['image' => $img]);
        $ban = Banner::create($request->all());
        return  $ban;
    }
    public function updateBan($banner)
    {
        if (request()->image) {
            $img = str_replace(url('uploads') . '/', '', request()->image);
            request()->merge(['image' => $img]);
        }
        return $banner->update(request()->all());
    }
}
