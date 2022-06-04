<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class AdminConfigurationController extends AdminController
{
    public function index(Request $request)
    {
        $configuration = Configuration::first();
        if (!$configuration) $configuration = new Configuration();

        $viewData = [
            'configuration' => $configuration
        ];

        return view('admin::pages.configuration.index', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $configuration = Configuration::firstOrNew(['email' => $request->email]);
            $configuration->fill($request->except(['_token', 'email']))->save();
            $this->showMessagesSuccess('Cập nhật thành công');
        } catch (\Exception $exception) {
            $this->showMessagesError('Cập nhật thất bại');
            Log::error($exception->getMessage());
        }
        return redirect()->back();
    }
}
