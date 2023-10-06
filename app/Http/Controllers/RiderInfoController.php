<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiderInfo;
use App\Models\Resturant;
use Illuminate\Support\Facades\Validator;
use DB;

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
                return response()->json(['errors' => $validator->errors()->first(), 'data' => null, 'statusCode' => 422], 422);
            }
            $riderInfo = RiderInfo::create($request->all());
            return response()->json(['message' => 'Rider info inserted successfully', 'data' => $riderInfo], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'data' => null, 'statusCode' => 500], 500);
        }
    }

    public function getRider($resturantId)
    {
        try{
            $resturant = Resturant::find($resturantId);

            if(!$resturant) {
                return response()->json(['error' => 'Resturant Not Found', 'data' => null, 'statusCode' => 500], 500);
            }
            
            $nearestRider = DB::table("riders_info")
                ->select("riders_info.rider_id"
                    ,DB::raw("55555 * acos(cos(radians(" . $resturant->lat . ")) 
                    * cos(radians(riders_info.lat)) 
                    * cos(radians(riders_info.long) - radians(" . $resturant->long . ")) 
                    + sin(radians(" .$resturant->lat. ")) 
                    * sin(radians(riders_info.lat))) AS distance"))
                    ->orderBy("distance")
                    ->first();
            return response()->json(['message' => 'Nearest rider is', 'data' => $nearestRider, 'statusCode' => 201], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'data' => null], 500);
        }
    }
}
