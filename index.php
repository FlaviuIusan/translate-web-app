<?php
include('models/m_translations.php');

function generateLanguagesSource(){
    $Translations = new Translations();
    $languagesSource = $Translations->getLanguagesSource();
    foreach($languagesSource as $language){
        echo "<option>".$language."</option>";
    }
}

function generateLanguagesTarget(){
    $Translations = new Translations();
    $languagesTarget = $Translations->getLanguagesTarget();
    foreach($languagesTarget as $language){
        echo "<option>".$language."</option>";
    }
}

include('views/v_home.php');

?>
