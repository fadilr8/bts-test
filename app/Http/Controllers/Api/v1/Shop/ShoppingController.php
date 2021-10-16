<?php

namespace App\Http\Controllers\Api\v1\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopping;

class ShoppingController extends Controller
{
    public function index()
    {
        $data = Shopping::all();

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Shopping::find($id);

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $data = Shopping::create([
            'name' => $request->name
        ]);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $shopping = Shopping::find($id);

        $shopping->update([
            'name' => $request->name
        ]);
        
        return response()->json($shopping, 200);
    }

    public function destroy($id)
    {
        Shopping::destroy($id);

        $message = 'Shopping data deleted!';

        return response()->json($message, 200);
    }
}
