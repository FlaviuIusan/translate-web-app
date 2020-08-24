<?php

include ('models/m_translations.php');
$Translations = new Translations();

if(isset($_POST['textToTranslate'])){

    echo $Translations->translate($_POST['textToTranslate']);
}
else{

    echo "No text to translate";
}

?>