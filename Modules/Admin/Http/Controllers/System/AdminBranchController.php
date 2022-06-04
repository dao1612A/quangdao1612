<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\Location;
use App\Models\System\Branch;
use App\Service\Location\LocationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Controllers\AdminController;

class AdminBranchController extends AdminController
{
    public function index()
    {
        $branch = Branch::with('city:loc_name,id')->orderByDesc('id')
            ->paginate(10);
        $viewData  = [
            'branch' => $branch
        ];
        return view('admin::pages.branch.index', $viewData);
    }

    public function create()
    {
        $locations = Location::where('loc_parent_id',0)->get();
        return view('admin::pages.branch.create', compact('locations'));
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            Branch::insert($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminBranchController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $branch = Branch::find($id);
        $locations = Location::where('loc_parent_id',0)->get();
        return view('admin::pages.branch.update', compact('branch','locations'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            Branch::find($id)->update($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminBranchController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $branch = Branch::findOrFail($id);
            if ($branch) $branch->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
