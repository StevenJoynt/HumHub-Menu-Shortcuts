<?php
use humhub\compat\CActiveForm;
use yii\helpers\Html;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Space Menu Shortcut Keys Configuration
    </div>
    <div class="panel-body">
        <form>
            <table id="shortcuts-table">
            </table>
        </form>
<?php
$form = CActiveForm::begin();
echo $form->hiddenField($model, 'json', ['id'=>'shortcuts-json']);
echo Html::submitButton('Save', ['class'=>'btn btn-primary', 'id'=>'shortcuts-save']);
CActiveForm::end();
?>
    </div>
</div>
<script>
function shortcutsFormToJson() {
    var table = document.getElementById("shortcuts-table");
    var menu = document.getElementById("space-main-menu");
    var items = menu.getElementsByTagName("A");
    var i;
    var shortcuts = {};
    for ( i = 0 ; i < items.length ; i++ ) {
        var title = items[i].innerText.trim();
        var key = document.getElementById("shortcuts-key-" + i).value.trim().toUpperCase();
        shortcuts[title] = key;
    }
    document.getElementById("shortcuts-json").value = JSON.stringify(shortcuts);
    return true;
}
document.getElementById("shortcuts-save").onclick = shortcutsFormToJson;
function shortcutsJsonToForm() {
    var shortcuts = document.getElementById("shortcuts-json").value.trim();
    shortcuts = shortcuts ? shortcuts : '{}' ;
    shortcuts = JSON.parse(shortcuts);
    var table = document.getElementById("shortcuts-table");
    var menu = document.getElementById("space-main-menu");
    var items = menu.getElementsByTagName("A");
    var i;
    for ( i = 0 ; i < items.length ; i++ ) {
        var title = items[i].innerText.trim();
        var tr = table.insertRow();
        var td = tr.insertCell();
        var key = shortcuts[title];
        key = key ? key : "" ;
        td.innerHTML = "<input id=\"shortcuts-key-" + i + "\" value=\"" + key + "\" type=\"text\" maxlength=\"1\" size=\"1\">";
        td = tr.insertCell();
        td.innerText = title;
    }
}
shortcutsJsonToForm();
</script>
