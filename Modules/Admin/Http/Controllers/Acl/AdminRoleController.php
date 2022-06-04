<?php

namespace Modules\Admin\Http\Controllers\Acl;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\AdminRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin::pages.acl.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permissions = Permission::orderBy('group_permission','asc')->get();
        $permissions = $this->mapPermission($permissions);
        $groups =  $this->getGroupPermission();
        $permissionActive = [];
        $viewData = [
            'permissions' => $permissions,
            'groups' => $groups,
            'permissionActive' => $permissionActive
        ];
        ;
        return view('admin::pages.acl.role.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminRoleRequest $request)
    {
        $data = $request->except(['_token','permission']);
        $data['guard_name'] = 'admins';
        $role = Role::create($data);
        if($permissions = $request->permission)
        {
            foreach ($permissions as $permission)
                $role->givePermissionTo($permission);
        }
        $this->showMessagesSuccess();

        return  redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('group_permission','asc')->get();
        $permissions = $this->mapPermission($permissions);
        $groups =  $this->getGroupPermission();
        $permissionActive = $role->permissions()->pluck('id')->toArray();

        $viewData = [
            'role' => $role,
            'permissions' => $permissions,
            'groups' => $groups,
            'permissionActive' => $permissionActive
        ];
        return view('admin::pages.acl.role.update', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AdminRoleRequest $request, $id)
    {
        $data = $request->except(['_token','permission']);
        $data['guard_name'] = 'admins';
        $role = Role::find($id);
        $role->fill($data)->update();

        $allPermissions = Permission::all();
        foreach ($allPermissions as $permission)
            $role->revokePermissionTo($permission);


        if($permissions = $request->permission)
        {
            foreach ($permissions as $permission)
                $role->givePermissionTo($permission);
        }

        $this->showMessagesSuccess();
        return  redirect()->route('get_admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            Role::findOrFail($id)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
    }

    protected function mapPermission($permissions = [])
    {
        $data = [];
        foreach ($permissions as $permission)
        {
            $data[$permission->group_permission][] = $permission;
        }

        return $data;
    }

    protected function getGroupPermission()
    {
        return config('permission.group');
    }
}
