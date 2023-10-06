<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiderInfo;
use Illuminate\Support\Facades\Validator;

class RiderInfoController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->json()->all(), [
                'rider_id' => 'required|integer|max:10',
                'lat' => 'required|string|max:100',
                'long' => 'required|string|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->first()], 422);
            }

            $riderInfo = RiderInfo::create($request->all());
            return response()->json(['message' => 'Rider info inserted successfully', 'data' => $riderInfo], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
