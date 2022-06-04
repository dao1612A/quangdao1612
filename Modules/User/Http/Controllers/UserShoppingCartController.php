<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use App\Models\Ecommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserShoppingCartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product     = Product::findOrFail($id);
        $transaction = Transaction::create([
            't_user_id'     => get_data_user('users'),
            't_total_money' => $product->pro_price,
            't_phone'       => get_data_user('users', 'phone'),
            't_name'        => get_data_user('users', 'name'),
            't_document_id' => $id,
        ]);
        if ($transaction) {
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Mua tài liệu thành công'
            ]);
        }

        return redirect()->back();
    }
}
