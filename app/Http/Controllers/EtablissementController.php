<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;


class EtablissementController extends Controller
{
   
    /**
     * Cette fonction permet de rechercher les entreprises selon des critères précis soumis par l'utilisateur sur le frontend. Le format de la recherche repose sur la construction d'une
     * requête SQL selon les différents champs disponibles. Lorsque la requête est complété, celle-ci est utilisé pour faire une recherche sur toutes les Entreprises demandés directement dans la base de donnée MySQL
     * 
     * @param Request $request : ce paramètre comprend les arguments pris en compte par l'utilisateur lors du lancement de la recherche des entreprises
     */
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
                $requestString .= " tai.idTaille = $t OR";
            }
            $requestString = substr($requestString, 0, strlen($requestString)-2);
            $requestString .= ")";
        } 

       
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
      
        if ($request->query('distinct')) {
            $requestString .= " AND raisonSocialParent IS NULL";
        }
        if ($request->query('emailNotNull')) {
            $requestString .= " AND email IS NOT NULL";
        }

        $radius = $radius / 1000;
        $requestString = $requestString . " HAVING distance < $radius ORDER BY distance ASC";
        
        if ($request->query('limit')) {
            //Filter limit
            $limit = filter_var($request->query('limit'), FILTER_SANITIZE_NUMBER_INT);
            //check if limit is a number
            if(!is_numeric($limit)){
                return response()->json(['error' => 'Please provide a number for limit'], 400);
            }
            $requestString = $requestString . " LIMIT 0, $limit";
        } else{
            $requestString = $requestString . " LIMIT 0, 500";
        }
        $etablissement = \DB::select(\DB::raw("$requestString"));
        $etablissementTrue = Etablissement::selectRaw("$requestString");
        //echo($etablissementTrue);
        /**foreach($etablissementTrue as $e){
            echo($e->adress->adresse);
        }
        */
        return $etablissement;
        
    }

}
