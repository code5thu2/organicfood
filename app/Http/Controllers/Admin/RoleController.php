<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Route;

use function GuzzleHttp\json_decode;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::paginate(10);
        return view('admin.roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];
        $all = Route::getRoutes();
        foreach ($all as $r) {
            $name = $r->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $r->getName());
            }
        }
        return view('admin.roles.create', compact('routes'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routes = json_encode($request->route);
        Role::create(
            [
                'name' => $request->name,
                'permissions' => $routes,
            ]
        );
        return redirect()->route('admin.roles.index')->with('yes', 'Thêm vị trí thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = json_decode($role->permissions);
        // dd($permissions);
        $routes = [];
        $all = Route::getRoutes();
        foreach ($all as $r) {
            $name = $r->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $r->getName());
            }
        }
        return view('admin.roles.edit', compact('routes', 'role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $routes = json_encode($request->route);
        $role->update(['name' => $request->name, 'permissions' => $routes]);
        return redirect()->route('admin.roles.index')->with('yes', 'Cập nhật vị trí thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
