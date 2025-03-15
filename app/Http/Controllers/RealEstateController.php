<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\RealEstate;

class RealEstateController extends Controller
{
    public function index()
    {
        $realEstates = RealEstate::select('id', 'name', 'real_state_type', 'city', 'country')->get();
        return response()->json(['status'=>true, 'message' => 'Records retrved successfully.', 'data'=>$realEstates],200);
    }

    public function show($id)
    {
        $realEstate = RealEstate::find($id);
        if(!empty($realEstate)){
            return response()->json(['status'=>true, 'message' => 'Record retrved successfully.', 'data'=>$realEstate],200);
        }
        return response()->json(['status'=>false, 'message' => 'Record not found.'],404); 
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'real_state_type' => 'required|in:house,department,land,commercial_ground',
            'street' => 'required|string|max:128',
            'external_number' => 'required|string|max:12',
            'internal_number' => $request->real_state_type == "department" || $request->real_state_type == "commercial_ground" ? 'required|string|max:12' : 'nullable|string|max:12',
            'neighborhood' => 'required|string|max:128',
            'city' => 'required|string|max:64',
            'country' => 'required|size:2|alpha',
            'rooms' => 'required|integer',
            'bathrooms' => $request->real_state_type == "land" || $request->real_state_type == "commercial_ground" ? 'required|numeric|min:0':'required|numeric|min:1',
            'comments' => 'nullable|string|max:128'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation failed','errors' => $validator->errors()], 422); 
        }

        $realEstate = RealEstate::create($request->all());
        return response()->json(['status'=>true, 'message' => 'Record created successfully.', 'data'=>$realEstate],201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:128',
            'real_state_type' => 'required|in:house,department,land,commercial_ground',
            'street' => 'required|string|max:128',
            'external_number' => 'required|string|max:12',
            'internal_number' => $request->real_state_type == "department" || $request->real_state_type == "commercial_ground" ? 'required|string|max:12' : 'nullable|string|max:12',
            'neighborhood' => 'required|string|max:128',
            'city' => 'required|string|max:64',
            'country' => 'required|size:2|alpha',
            'rooms' => 'required|integer',
            'bathrooms' => $request->real_state_type == "land" || $request->real_state_type == "commercial_ground" ? 'required|numeric|min:0':'required|numeric|min:1',
            'comments' => 'nullable|string|max:128'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation failed','errors' => $validator->errors()], 422); 
        }

        $realEstate = RealEstate::find($id);
        if(!empty($realEstate)){
            $realEstate->name = $request->name;
            $realEstate->real_state_type = $request->real_state_type;
            $realEstate->street = $request->street;
            $realEstate->external_number = $request->external_number;
            $realEstate->internal_number = $request->internal_number;
            $realEstate->neighborhood = $request->neighborhood;
            $realEstate->city = $request->city;
            $realEstate->country = $request->country;
            $realEstate->rooms = $request->rooms;
            $realEstate->bathrooms = $request->bathrooms;
            $realEstate->comments = $request->comments;
            $realEstate->update();
            return response()->json(['status'=>true, 'message' => 'Record updated successfully.', 'data'=>$realEstate],200);
        }
        return response()->json(['status'=>false, 'message' => 'Record not found.'],404);
    }

    public function destroy($id)
    {
        $realEstate = RealEstate::find($id);
        if(!empty($realEstate)){
            $realEstate->delete();
            return response()->json(['status'=>true, 'message'=>'Record deleted successfully.', 'data'=>$realEstate]);
        }
        return response()->json(['status'=>false, 'message' => 'Record not found.'],404);
    }

}
