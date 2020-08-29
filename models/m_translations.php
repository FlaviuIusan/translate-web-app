<?php

include('resources/api_credentials.php');
include('resources/defines.php');

class Translations{

    private $languagesArray;

    function __construct()
    {
        $this->languagesArray=$this->getApiLanguages();
    }

    public function getApiLanguages(){
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
        return $languagesArray;
    }

    public function getLanguageModel($languageName){

        foreach($this->languagesArray as $language => $details){
                foreach($details as $detail){
                    if($detail["language_name"]==$languageName)
                        $languageModel=$detail["language"];
                }
                
        }
        //return model
        return $languageModel;
    }

    public function getLanguagesSource(){
        $languagesSource = array();
        foreach($this->languagesArray as $language => $details){
            foreach($details as $detail){
                if($detail["supported_as_source"])
                    $languagesSource[$detail["language_name"]]=$detail["language"];
            }
        }
        return $languagesSource;
    }

    public function getLanguagesTarget(){
        $languagesTarget = array();
        foreach($this->languagesArray as $language => $details){
            foreach($details as $detail){
                if($detail["supported_as_target"])
                    $languagesTarget[$detail["language_name"]]=$detail["language"];
            }
        }
        return $languagesTarget;
    }

    public function detectLanguage($textToTranslate){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, apiURL.'/v3/identify?version='.apiVersion);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $textToTranslate);
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey' . ':' .apiKey);

        $headers = array();
        $headers[] = 'Content-Type: text/plain';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result_json = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        
        $resultArray = json_decode($result_json, true);
        $detectedLanguages = $resultArray["languages"];
        $bestMatchLanguage = $detectedLanguages[0];
        return $bestMatchLanguage["language"];
    }

    public function getTranslation($textToTranslate, $languageSource, $languageTarget){

        if($languageSource=="Detect Language"){
            $languageSource=$this->detectLanguage($textToTranslate);
            $modelId = $languageSource . "-" . $languageTarget;
            
        }
        else{
            $modelId = $languageSource . "-" . $languageTarget;
        }
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
        if(isset($resultArray["error"])){
            echo "";
        }
        else{
            $translations = $resultArray["translations"];
            $translations = $translations[0];
            $translation = $translations["translation"];
            echo $translation;
        }
    }
}

?>