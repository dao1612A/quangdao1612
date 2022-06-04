<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Doctor;
use App\Models\System\Admin;
use App\Models\System\Page;
use App\Service\Category\CategoryService;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminAccountRequest;

class AdminDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $admins = Admin::with('category')->where('type', 2)->paginate(20);

        return view('admin::pages.doctor.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        CategoryService::getInstance()->recursive(0, 1, $categories);
        return view('admin::pages.doctor.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminAccountRequest $request)
    {
        $data             = $request->except(['_token', 'roles']);
        $data['password'] = bcrypt(123456789);
        $data['type']     = 2;
        $admin            = Admin::create($data);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $admin       = Admin::find($id);
        $rolesActive = $admin->roles()->pluck('id')->toArray();
        CategoryService::getInstance()->recursive(0, 1, $categories);
        $viewData = [
            'admin'       => $admin,
            'categories'  => $categories,
            'rolesActive' => $rolesActive
        ];
        return view('admin::pages.doctor.update', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', 'roles', 'password']);
        if ($request->password) $data['password'] = bcrypt($request->password);

        $admin = Admin::find($id)->fill($data)->save();
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $admin = Admin::find($id);
            if ($admin) $admin->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
