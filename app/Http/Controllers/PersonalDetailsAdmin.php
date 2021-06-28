<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\PersonalDetails;
use Illuminate\Support\Facades\Validator;

class PersonalDetailsAdmin extends Controller
{
    public function insert(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'pincode'    => 'required|string',
                'district' => 'required|string',
                'state'    => 'required|string',

            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $obj = new PersonalDetailsAdmin;
        $obj->$request->pincode;
        $obj->$request->district;
        $obj->$request->state;
        $obj->save();
        return response()->json($obj);
    
       /* else{

            return response()->json(['message'=>'No users exists with this email'], 404);
        }*/
    }

    public function update(){
        
    }

    public function delete(){
        
    }
    
    public function view(){
        
    }

}
