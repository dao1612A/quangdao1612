<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\System\ConfigEmail;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class AdminConfigEmailController extends AdminController
{
    public function index()
    {
        $email = ConfigEmail::first();
        $viewData = [
            'email' => $email
        ];
        return view('admin::pages.email.index', $viewData);
    }

    public function store(Request $request)
    {
        $configEmail = ConfigEmail::firstOrNew(['mail_driver' => $request->mail_driver]);
        $configEmail->fill($request->except(['_token']))->save();
        $this->showMessagesSuccess();
        return redirect()->back();
    }
}
