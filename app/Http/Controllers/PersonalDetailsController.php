<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PersonalDetails;

class PersonalDetailsController extends Controller
     {
        public function pin_lookup(Request $request)
            {
                $validator = Validator::make
                ($request->all(),
                    [
                        'pincode'     => 'required|string',
                    ]
                );
        
                $data = PersonalDetails::where('pincode',$request->pincode)->get(['city','district','state']);
                if($data){
        
                    return response()->json(['message'=>'success','data'=>$data]);
                }
                else{
                    return response()->json(['message'=>'Invalid Pin Code']);
                }
            }
        
     

    public function dist_lookup(Request $request)
    {
        $validator = Validator::make
        ($request->all(),
            [
                'district'     => 'string',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [$validator->errors()],
                422
            );
        }

        if(empty($request->district)){
           $city=PersonalDetails::get(['city']);
            return response()->json($city);
        }

        $data = PersonalDetails::where('district',$request->district)->get(['city']);
        // dd($data);
        if(count($data)){

            return response()->json(['message'=>'success','data'=>$data]);
        }
        else{
            return response()->json(['message'=>'Invalid State']);
        }
    }

    public function state_lookup(Request $request)
    {
        $validator = Validator::make
        ($request->all(),
            [
                'state'     => 'string',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [$validator->errors()],
                422
            );
        }

        if(empty($request->state)){
           $dist=PersonalDetails::get(['district']);
            return response()->json($dist);
        }

        $data = PersonalDetails::where('state',$request->state)->get(['district']);
        // dd($data);
        if(count($data)){

            return response()->json(['message'=>'success','data'=>$data]);
        }
        else{
            return response()->json(['message'=>'Invalid State']);
        }
    }

}
