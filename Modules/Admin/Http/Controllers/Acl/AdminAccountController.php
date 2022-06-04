<?php

namespace Modules\Admin\Http\Controllers\Acl;

use App\Models\System\Admin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminAccountRequest;
use Spatie\Permission\Models\Role;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admin::pages.acl.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin::pages.acl.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminAccountRequest $request)
    {
        $data = $request->except(['_token','roles']);
        $data['password'] = bcrypt($request->password);
        $admin = Admin::create($data);
        if($roles = $request->roles)
        {
            foreach ($roles as $role)
                $admin->syncRoles($role);
        }

        return  redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $roles = Role::all();
        $admin = Admin::find($id);
        $rolesActive = $admin->roles()->pluck('id')->toArray();

        $viewData = [
            'roles' => $roles,
            'admin' => $admin,
            'rolesActive' => $rolesActive
        ];
        return view('admin::pages.acl.admin.update', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token','roles','password']);
        if($request->password) $data['password'] = bcrypt($request->password);

        $admin = Admin::find($id);
        $roles = $request->roles;
        if($roles)
        {
            $admin->roles()->sync($roles);
        }else{
            $admin->roles()->detach();
        }

        return  redirect()->back();
    }
}
