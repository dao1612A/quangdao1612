<?php

namespace Modules\Admin\Http\Controllers\Car;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Guest\Entities\Buses;

class AdminBusesController extends Controller
{
    public function index()
    {
        $buses = Buses::with('vehicle', 'starting', 'destination')
            ->orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'buses' => $buses
        ];

        return view('admin::pages.buses.index', $viewData);
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $user =  Buses::find($id);
            if ($user) $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
        return redirect()->to('/');
    }
}
