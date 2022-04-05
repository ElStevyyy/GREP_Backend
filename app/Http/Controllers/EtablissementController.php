<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;


class EtablissementController extends Controller
{
   
    public function index(Request $request)
    {
        $longitude;
        $latitude;
        $radius;

        //check if longitude , latitude and radius are not set
        if(!$request->query('longitude') || !$request->query('latitude') || !$request->query('radius')){
            return response()->json(['error' => 'Please provide longitude, latitude and radius'], 400);
        }

        //sanitize the input
        $longitude = filter_var($request->query('longitude'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $latitude = filter_var($request->query('latitude'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $radius = filter_var($request->query('radius'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $requestString = "SELECT *, (6371  * acos(cos(radians($latitude)) *cos(radians(latitude)) * cos(radians(longitude) -radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude)))) AS distance FROM etablissements AS eta, adresses AS adr, juridiques AS jur, tailles as tai WHERE eta.idAdresse = adr.idAdresse AND jur.idJuridique = eta.idJuridique AND eta.idTaille = tai.idTaille";

        if($request->query('taille')){
            $taille = $request->query("taille");
            $arrayTaille = explode(",", $taille);
            if(!is_array($arrayTaille)){
                return response()->json(['error' => 'Please provide an array of taille'], 400);
            }
            $arrayTaille = array_map('intval', $arrayTaille);
            $requestString .= " AND (";
            foreach($arrayTaille as $t){
                $requestString .= " idTaille = $t OR";
            }
            $requestString = substr($requestString, 0, strlen($requestString)-2);
            $requestString .= ")";
        } 

        /*if($request->has('zoneExclusion')){
            $zoneExclusion -> $request->query("zoneExclusion");
            $requestString .= " AND idAdresse NOT IN (SELECT idAdresse FROM exclusions WHERE idZone = $zoneExclusion)";
        }*/

        if($request->query('noga')){
            $noga = $request->query("noga");
            $arrayNoga = explode(",", $noga);
            if(!is_array($arrayNoga)){
                return response()->json(['error' => 'Please provide an array of noga'], 400);
            }
            $requestString .= " AND (";
            foreach($arrayNoga as $no){
                #get the first two characters of the noga
                $firstTwo = substr($no, 0, 2);
                #get the last two characters of the noga
                $lastTwo = substr($no, strlen($no) - 2 , 2);
                #transform the last two and first two characters into a integere
                $firstTwo = intval($firstTwo);
                $lastTwo = intval($lastTwo);
                #loop through the first two characters until the last two characters
                for($i = $firstTwo; $i <= $lastTwo; $i++){
                    $requestString .= " codeNoga LIKE '$i%' OR";
                }
            }
            $requestString = substr($requestString, 0, strlen($requestString)-2);
            $requestString .= ")";
        }

        if($request->query('natureJuridique')){
            $natureJuridique = $request->query("natureJuridique");
            $arryNatureJuridique = explode(",", $natureJuridique);
            if(!is_array($arryNatureJuridique)){
                return response()->json(['error' => 'Please provide an array of nature juridique'], 400);
            }
            $arryNatureJuridique = array_map('intval', $arryNatureJuridique);
            $requestString .= " AND (";
            foreach($arryNatureJuridique as $nj){
                $requestString .= " jur.idJuridique = $nj OR";
            }
            $requestString = substr($requestString, 0, strlen($requestString)-2);
            $requestString .= ")";
        }
      
        
        $radius = $radius / 1000;
        $requestString = $requestString . " HAVING distance < $radius ORDER BY distance ASC LIMIT 0, 500";
        $etablissement = \DB::select(\DB::raw("$requestString"));
        return $etablissement;
        
    }

}
