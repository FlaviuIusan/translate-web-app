

function showTranslation(text){
    
    document.getElementById('TextTranslated').value = text;
}

function getTextToTranslate(){
    return document.getElementById('TextToTranslate').value;
}

function getLanguageSource(){
    return document.getElementById('SelectLanguageSource').value;
}

function getLanguageTarget(){
    return document.getElementById('SelectLanguageTarget').value;
}

function updateLang(sel){
    sel.value = sel.options[sel.selectedIndex].text;
}

function translateText(){
    var languageSource = getLanguageSource();
    var languageTarget = getLanguageTarget();
    var text = getTextToTranslate();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if(this.readyState == 4 && this.status == 200){
            showTranslation(this.responseText);
            return;
        }
    };
    xhttp.open("POST", "translate.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("textToTranslate=" + text + "&languageSource=" + languageSource + "&languageTarget=" + languageTarget);
}