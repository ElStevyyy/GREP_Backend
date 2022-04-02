<?php


namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Http\Request;

class adresseController extends Controller
{
    //
    public function updateAll()
    {
        //example usage.
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
            $adresse -> latitude = $apiResult['data'][0]['longitude'] ?? "";
            $adresse -> longitude = $apiResult['data'][0]['latitude'] ?? "";

            $adresse->save();
        }
        
    }

    public function show(Adress $adresses)
    {
        return $adresses;
    }

    public function updateOne(){
        $adresse = Adress::find(1);
        echo($adresse->ADRESSE);
        
        //API GEOCODING
        $queryString = http_build_query([
            'access_key' => '126f753997e754bae2f5b143c053b9ac',
            'query' => $adresse->ADRESSE,
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
        $adresse -> latitude = $apiResult['data'][0]['longitude'] ?? "";
        $adresse -> longitude = $apiResult['data'][0]['latitude'] ?? "";

        $adresse->save();
    }
}
