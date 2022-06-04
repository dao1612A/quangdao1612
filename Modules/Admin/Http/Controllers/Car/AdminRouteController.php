<?php

namespace Modules\Admin\Http\Controllers\Car;

use App\Models\Location;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Admin\Http\Controllers\AdminController;

class AdminRouteController extends AdminController
{
    public function index()
    {
        $routes = Route::orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'routes' => $routes
        ];

        return view('admin::pages.route.index', $viewData);
    }

    public function create()
    {
        $locations = Location::all();
        $viewData  = [
            'locations' => $locations
        ];
        return view('admin::pages.route.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            Route::insert($data);
            $this->showMessagesSuccess("Thêm mới thành công");
        } catch (\Exception $exception) {
            $this->showMessagesError("Thêm mới thất bại");
            Log::error("[AdminRouteController ]" . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $route     = Route::find($id);
        $locations = Location::all();
        $viewData  = [
            'locations' => $locations,
            'route'     => $route
        ];
        return view('admin::pages.route.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        try {
            $data               = $request->except('_token');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            Route::find($id)->update($data);
            $this->showMessagesSuccess("Cập nhật thành công");
        } catch (\Exception $exception) {
            $this->showMessagesError("Cập nhật thất bại");
            Log::error("[AdminRouteController ]" . $exception->getMessage());
        }

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $route = Route::findOrFail($id);
            if ($route) $route->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
