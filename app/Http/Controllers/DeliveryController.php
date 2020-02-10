<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Province_model;
use App\City_model;

class DeliveryController extends Controller
{
    public function getprovince(){
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/province',
            array(
                'headers' => array (
                    'key' => '70624564ece670986d0f8ffd0e4ef282',
            )
             )
            );
            } catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        print_r($array_result);
        //echo $array_result["rajaongkir"]["results"][]["province"];
        //for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
        //{
            //$province = new \App\Province_model;
            //$province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
            //$province->name = $array_result["rajaongkir"]["results"][$i]["province"];
            //$province->save();
        //}
    }
    public function getcity(){
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/city',

            array(
                'headers' => array (
                    'key' => '70624564ece670986d0f8ffd0e4ef282',
                )
            )

                );
            } catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        //print_r($array_result);
        //echo $array_result["rajaongkir"]["results"][0]["city_name"];
        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++)
        {
            $city = new \App\City_model;
            $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $city->save();
        }
    }
    public function checkshipping(){

        $title = "Check Shipping";
        $city = City_model::get();

        return view('delivery.check-shipping', compact('title', 'city'));

    }

    public function processShipping(Request $request){

        $title = "Check Shipping Result";
        $client = new Client();

        try{
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            [
                'body' => 'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier=jne',
                'headers' => [
                    'key' => '70624564ece670986d0f8ffd0e4ef282',
                    'content-type' => 'application/x-www-form-urlencoded',
                ]
            ]
                );
            } catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        $origin = $array_result["rajaongkir"]["origin_details"]{"city_name"};
        $destination = $array_result["rajaongkir"]["origin_details"]{"city_name"};

        //print_r($array_result);
        //echo $array_result["rajaongkir"]["results"][0]["costs"][1]["cost"][0]["value"];

        return view('delivery.check-shipping-result', compact('title', 'origin', 'destination','array_result'));
    }
}
