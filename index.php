<?php
include('models/m_translations.php');

$Translations = new Translations();

function generateLanguagesSource(){
    global $Translations;
    $languagesSource = $Translations->getLanguagesSource();
    foreach($languagesSource as $languageName => $languageModel){
        echo "<option value='".$languageModel."'>".$languageName."</option>";
    }
}

function generateLanguagesTarget(){
    global $Translations;
    $languagesTarget = $Translations->getLanguagesTarget();
    foreach($languagesTarget as $languageName => $languageModel){
        echo "<option value='".$languageModel."'>".$languageName."</option>";
    }
}

include('views/v_home.php');

?>
