

function showTranslation(text){
    
    document.getElementById('TextTranslated').value = text;
}

function getTextToTranslate(){
    return document.getElementById('TextToTranslate').value;
}

function translateText(){
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
    xhttp.send("textToTranslate=" + text);
}