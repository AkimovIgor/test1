<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityStoreRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities', compact('cities'));
    }

    public function store(CityStoreRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->input();
            $result = City::create($data);
            if ($request) {
                return response()->json([
                    'success' => 'Успешно добавлено!',
                    'data' => $request->toArray()
                ]);
            }
        }
        return redirect()->back();
    }
}
