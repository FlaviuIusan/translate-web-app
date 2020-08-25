<?php

use function PHPSTORM_META\type;

include('resources/api_credentials.php');

class Translations{

    function __construct()
    {
        
    }

    public function translate($textToTranslate){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, apiURL.'/v3/translate?version=2018-05-01');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":[\"".$textToTranslate."\"],\"model_id\":\"en-es\"}");
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey' . ':' . apiKey);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result_json= curl_exec($ch);
        $error='No Error';
        if (curl_errno($ch)) {
            $error = curl_error($ch);
        }
        curl_close($ch);
        $translation=json_decode($result_json, true);

        return $textToTranslate." Translated, Result: ".$result_json." Errors: ".$error;
    }
}

?>