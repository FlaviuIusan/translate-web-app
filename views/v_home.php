<?php include('views/v_header.php');?>

<form>
    <div class="form-group row">
        <div class="col p-0">
            <select class="form-control border-0" id="SelectLanguageSource" onchange="updateLang(this)">
                <option>Detect Language</option>
                <option>English</option>
                <option>Romanian</option>
                <option>French</option>
                <option>German</option>
            </select>
        </div>
        <div class="col p-0">
            <select class="form-control border-0" id="SelectLanguageTarget" onchange="updateLang(this)">
                <option>Romanian</option>
                <option>English</option>
                <option>French</option>
                <option>German</option>
            </select>
        </div>
    </div>
    <hr class="p-0 m-0">
    <div class="form-group row">
        <div class="col p-0">
            <textarea style="resize: none;" class="form-control border-left-0 border-top-0 border-bottom-0" id="TextToTranslate" rows="4" oninput="translateText()"></textarea>
        </div>
        <div class="col p-0">
            <textarea style="resize: none;" class="form-control border-right-0 border-top-0 border-bottom-0" id="TextTranslated" rows="4">Translation</textarea>
        </div>
    </div>
    <hr class="p-0 m-0">
</form>

<?php include('views/v_footer.php'); ?>