<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarMiaNoaTrue;

class BarMiaNoaControllerTrue extends Controller
{
    //
    public function insert(){
        $queries = array('Rue de la Tambourine 17, 1227 Carouge', 'HEPIA-Genève, Rue de la Prairie 4', 'Chem. du Château-Bloch 2, 1219 Vernier', 'Pl. de la Gare, 1225 Chêne-Bourg');

        foreach ($queries as $query) {
        $queryString = http_build_query([
            'access_key' => '126f753997e754bae2f5b143c053b9ac',
            'query' => $query,
            'region' => 'Geneva',
            'fields' => 'results.latitude,results.longitude',
            'output' => 'json',
            'limit' => 1,
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        $apiResult = json_decode($json, true);
        //Infos :
        $BarMiaNoaTrue = BarMiaNoaTrue::create([
            'Latitude' => $apiResult['data'][0]['latitude'],
            'Longitude' => $apiResult['data'][0]['longitude']
        ]);
        /*
        print($query . " : ");
        print($apiResult['data'][0]['latitude'] . " ");
        print($apiResult['data'][0]['longitude']);
        print("<br>");


        print($apiResult["latitude"]);
        //$result = json_encode($apiResult, JSON_PRETTY_PRINT);
        //['rows'][0]['elements']
        */
        }
    }
}
