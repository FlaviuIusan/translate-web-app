<?php

include ('models/m_translations.php');
$Translations = new Translations();

if(isset($_POST['textToTranslate']) && isset($_POST['languageSource']) && isset($_POST['languageTarget'])){

    $Translations->getTranslation($_POST['textToTranslate'], $_POST['languageSource'], $_POST['languageTarget']);
}
else{

    echo $_POST['textToTranslate'] . "\n" . $_POST['languageSource'] . "\n" . $_POST['languageTarget'];
}

?>