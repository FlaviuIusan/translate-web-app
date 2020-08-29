<div class="p-0 b-0" style="background-image:url(resources/images/BackgroundGood5.png); height: 90vh; margin-top: 5vh; background-size: cover; background-position: center center;">
<hr class="p-0 m-0">
<br><br><br>
<form style="max-width: 80%; margin-left: 10%;">
<div style="box-shadow: 0px 1px 5px #00000052; background-color:white; opacity: 1">
    <hr class="p-0 m-0">
    <div class="form-group row mw-100 m-0 p-0">
    <div class="col p-0" style="background-color: black; opacity: 0.25; max-width: 1px"></div>
        <div class="col p-0" style="margin: 2px;">
            <select class="form-control border-0" id="SelectLanguageSource" onchange="updateLang(this)">
                <option>Detect Language</option>
                <?php generateLanguagesSource()?>
            </select>
        </div>
        <div class="col p-0" style="margin: 2px;">
            <select class="form-control border-0" id="SelectLanguageTarget" onchange="updateLang(this)">
                <?php generateLanguagesTarget()?>
            </select>
        </div>
    <div class="col p-0" style="background-color: black; opacity: 0.25; max-width: 1px"></div>
    </div>
    <hr class="p-0 m-0">
    <div class="form-group row m-0 p-0">
    <div class="col p-0" style="background-color: black; opacity: 0.25; max-width: 1px"></div>
        <div class="col p-0" style="margin: 2px;">
            <textarea style="resize: none;" class="form-control border-0"  id="TextToTranslate" rows="4" oninput="translateText()"></textarea>
        </div>
        <div class="col p-0" style="background-color: black; opacity: 0.25; max-width: 1px"></div>
        <div class="col p-0" style="margin: 2px;">
            <textarea readonly style="resize: none; background: white" class="form-control border-0"  id="TextTranslated" rows="4">Translation</textarea>
        </div>
    <div class="col p-0" style="background-color: black; opacity: 0.25; max-width: 1px"></div>
    </div>
    <hr class="p-0 m-0">
</div>
</form>
</div>
