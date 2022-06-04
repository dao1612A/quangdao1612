<?php

namespace Modules\Admin\Http\Controllers\Acl;

use App\Models\Education\Course;
use App\Models\Education\SeoEdutcation;
use App\Service\Seo\RenderUrlSeoCourseService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\AdminPermissionRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Spatie\Permission\Models\Permission;

class AdminPermissionController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $permissions = Permission::orderBy('group_permission','asc')->paginate(20);
        $groups =  $this->getGroupPermission();

        $viewData = [
            'permissions' => $permissions,
            'groups' => $groups
        ];

        return view('admin::pages.acl.permission.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $groups =  $this->getGroupPermission();
        return view('admin::pages.acl.permission.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminPermissionRequest $request)
    {
        $data = $request->except(['_token']);
        $data['guard_name'] = 'admins';
        Permission::create($data);
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
        $permission = Permission::findOrFail($id);
        $groups =  $this->getGroupPermission();
        return view('admin::pages.acl.permission.update', compact('permission','groups'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token']);
        $data['guard_name'] = 'admins';
        Permission::find($id)->update($data);
        $this->showMessagesSuccess();
        return  redirect()->route('get_admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            Permission::findOrFail($id)->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
    }

    protected function getGroupPermission()
    {
        return config('permission.group');
    }
}
