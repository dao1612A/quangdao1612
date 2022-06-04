<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\Location;
use App\Service\Location\LocationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Controllers\AdminController;

class AdminLocationController extends AdminController
{
    public function index()
    {
        $locations = Location::with('parent:id,loc_name')->orderByDesc('id')
            ->paginate(10);
        $viewData  = [
            'locations' => $locations
        ];
        return view('admin::pages.location.index', $viewData);
    }

    public function create()
    {
        LocationService::getInstance()->recursive(0,1, $locations);
        return view('admin::pages.location.create', compact('locations'));
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            Location::insert($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminLocationController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $location = Location::find($id);
        LocationService::getInstance()->recursive(0,1, $locations);
        return view('admin::pages.location.update', compact('location','locations'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            Location::find($id)->update($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminLocationController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $location = Location::findOrFail($id);
            if ($location) $location->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
