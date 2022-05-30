<?php


namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;

class adresseController extends Controller
{
    
    /**
     * Cette méthode consiste à mettre à jour toutes les adresses afin de rajouter leur position latitude et longitude
     */
    public function updateAll()
    {
        foreach(Adress::cursor() as $adresse){
            ini_set('max_execution_time', 180); //3 minutes
            //API GEOCODING
            $queryString = http_build_query([
                'access_key' => '126f753997e754bae2f5b143c053b9ac',
                'query' => $adresse->adresse,
                'region' => 'Geneva',
                'fields' => 'results.longitude, results.latitude',
                'output' => 'json',
                'limit' => 1,
            ]);

            $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);

            curl_close($ch);

            $apiResult = json_decode($json, true);
            //Infos :
            $adresse -> longitude = $apiResult['data'][0]['longitude'] ?? "";
            $adresse -> latitude = $apiResult['data'][0]['latitude'] ?? "";

            $adresse->save();
        }
        
    }

    /**
     * Permet de retourner une adresse spécifique
     * 
     * @param Adress $adresses : l'id d'une adresse spécifique
     * @return Adress 
     * 
     */
    public function show(Adress $adresses)
    {
        return $adresses;
    }
    
}
