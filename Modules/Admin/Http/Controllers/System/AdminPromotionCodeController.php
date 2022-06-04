<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\System\PromotionCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Controllers\AdminController;

class AdminPromotionCodeController extends AdminController
{
    public function index()
    {
        $promotions = PromotionCode::orderByDesc('id')
            ->paginate(10);

        $viewData   = [
            'promotions' => $promotions
        ];
        return view('admin::pages.promotion.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.promotion.create');
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            $data['pc_code'] = render_code();
            PromotionCode::insert($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminPromotionCodeController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $promotion = PromotionCode::find($id);
        return view('admin::pages.promotion.update', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data               = $request->except('_token');
            $data['updated_at'] = Carbon::now();
            PromotionCode::find($id)->update($data);
            $this->showMessagesSuccess();
        } catch (\Exception $exception) {
            Log::error('[AdminPromotionCodeController]: ' . $exception->getMessage());
            $this->showMessagesError();
        }

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $promotion = PromotionCode::findOrFail($id);
            if ($promotion) $promotion->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
