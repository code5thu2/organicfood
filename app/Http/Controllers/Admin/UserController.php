<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Requests\userAddRequest;
use App\Http\Requests\userEditRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.users.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userAddRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        if (User::create($request->all())) {
            return redirect()->route('admin.users.index')->with('yes', 'Tạo tài khoản admin thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Lấy ra role của user
        $role_assignment = $user->getRoles->pluck('name', 'id')->toArray();
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.users.edit', compact('roles', 'user', 'role_assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(userEditRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ];
        $user->update($data);
        if (is_array($request->role)) {
            UserRole::where('user_id', $user->id)->delete();
            foreach ($request->role as $role_id) {
                UserRole::create(
                    [
                        'user_id' => $user->id,
                        'role_id' => $role_id,
                    ]
                );
            }
        }
        return redirect()->route('admin.users.index')->with('yes', 'Update tài khoản thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
