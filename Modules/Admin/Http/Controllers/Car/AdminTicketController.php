<?php

namespace Modules\Admin\Http\Controllers\Car;

use App\Models\Cart\Order;
use App\Models\Cart\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminTicketController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('buses', 'vehicle', 'starting', 'destination', 'user:id,name,email,phone', 'buses_location_start', 'buses_location_stop')
            ->orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('admin::pages.ticket.index', $viewData);
    }
}
