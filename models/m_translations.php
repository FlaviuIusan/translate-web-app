<?php

include('resources/api_credentials.php');
include('resources/defines.php');

class Translations{

    function __construct()
    {
        
    }

    public function getLanguageModel($languageName){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, apiURL.'/v3/languages?version='.apiVersion);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_USERPWD, 'apikey' . ':' . apiKey);

        $resultJson = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $languagesArray = json_decode($resultJson, true);
        echo "Available Languages:\n";
        foreach($languagesArray as $language => $details){
                foreach($details as $detail){
                    if($detail["language_name"]==$languageName)
                        return $detail["language"];
                }
                
        }
    }

    public function getTranslation($textToTranslate, $languageSource, $languageTarget){

        $modelId = $this->getLanguageModel($languageSource)."-".$this->getLanguageModel($languageTarget);
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, apiURL.'/v3/translate?version='.apiVersion);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":[\"".$textToTranslate."\"],\"model_id\":\"".$modelId."\"}");
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

        //get translation from json result
        $resultArray=json_decode($result_json, true);
        $translations = $resultArray["translations"];
        $translations = $translations[0];
        $translation = $translations["translation"];
        echo "Translation: ".$translation."\n";
    }
}

?>