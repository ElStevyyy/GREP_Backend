<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {

            $wayPoint1;
            $wayPoint2;
            $key = "AhzGXB47G1TVV9BAE4wh_Rur3AklTJ6fM_ZlhmSnyCZsqXCrEoY_gv8DQWborER1";
    
            //check if depart and arriver is set
            if(isset($request->depart) && isset($request->arriver)){
                $wayPoint1 = $request->depart;
                $wayPoint2 = $request->arriver;
            }
            else{
                //if not set, return error
                return response()->json(['error' => 'depart et arriver sont obligatoire'], 400);
            }
            //make api call to dev.virtualearth.net
            $url = "http://dev.virtualearth.net/REST/v1/Routes?wayPoint.1=$wayPoint1&wayPoint.2=$wayPoint2&key=$key";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);
            //check if the api call was successful
            if($output->statusCode == 200){
              
                return response()->json(['travelDuration' => $output], 200);
            }
            else{
                //if not successful, return error
                return response()->json(['error' => 'Something went wrong'], 400);
            }
        }
}
