<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('category')->where('type', 2);
        if ($request->l)
            $doctors->where('address', 'like', '%' . $request->l . '%');

        if ($request->c)
            $doctors->where('category_id', $request->c);

        $doctors = $doctors->orderByDesc('id')
            ->limit(10)
            ->get();

        $viewData = [
            'query'   => $request->query(),
            'doctors' => $doctors
        ];

        return view('pages.search.index', $viewData);
    }
}
