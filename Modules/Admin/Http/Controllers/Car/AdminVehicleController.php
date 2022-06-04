<?php

namespace Modules\Admin\Http\Controllers\Car;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Guest\Entities\Buses;
use Modules\Guest\Entities\Vehicle;

class AdminVehicleController extends Controller
{
    public function index()
    {
        $buses = Buses::with('vehicle', 'starting', 'destination')
            ->where('b_guest_id', get_data_user('users'))
            ->orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'buses' => $buses
        ];

        return view('admin::pages.vehicle.index', $viewData);
    }
}
