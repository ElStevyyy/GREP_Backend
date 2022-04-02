<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BarMiaNoaTrue', function (Blueprint $table) {
            $table->increments('idBarMiaNoa');
            $table->float('Latitude');
            $table->float('Longitude');
        });

        DB::table('BarMiaNoaTrue')->insert(
            $queries = array('Rue de la Tambourine 17, 1227 Carouge', 'HEPIA-Genève, Rue de la Prairie 4', 'Services Industrielles de Genève - SIG, Chemin du Château-Bloch');

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
        array(
            'Latitude' => $apiResult['data'][0]['latitude'],
            'Longitude' => $apiResult['data'][0]['longitude']
        )
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
            
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BarMiaNoaTrue');
    }
};
