<?php
use humhub\compat\CActiveForm;
use yii\helpers\Html;
?>
<style>
#shortcuts-table td {
    padding: 4px;
}
.shortcuts-key input {
    text-align: center;
    text-transform: uppercase;
}
.shortcuts-error input {
    text-align: center;
    text-transform: uppercase;
    background-color: #f88;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Space</strong> menu : Shortcut Keys Configuration
    </div>
    <div class="panel-body">
        <table id="shortcuts-table">
        </table>
        <br>
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
    var usedKeys = "";
    var badKeys = "";
    for ( i = 0 ; i < items.length ; i++ ) {
        var title = items[i].innerText.trim();
        var key = document.getElementById("shortcuts-key-" + i).value.trim().toUpperCase();
        shortcuts[title] = key;
        if ( key ) {
            if ( usedKeys.includes(key) ) {
                badKeys += key;
            } else {
                usedKeys += key;
            }
        }
    }
    if ( badKeys == "" ) {
        document.getElementById("shortcuts-json").value = JSON.stringify(shortcuts);
        return true;
    } else {
        for ( i = 0 ; i < items.length ; i++ ) {
            var field = document.getElementById("shortcuts-key-" + i);
            var key = field.value.trim().toUpperCase();
            if ( key && badKeys.includes(key) ) {
                field.parentElement.className = "shortcuts-error";
            } else {
                field.parentElement.className = "shortcuts-key";
            }
        }
        return false;
    }
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
        var key = shortcuts[title];
        var tr = table.insertRow();
        {
            var td = tr.insertCell();
            td.className = "shortcuts-key";
            var input = document.createElement("input");
            td.appendChild(input);
            input.type = "text";
            input.id = "shortcuts-key-" + i;
            input.maxlength = input.size = 1;
            input.onfocus = function() { this.select(); };
            if ( key ) {
                input.value = key;
            }
        }
        {
            var td = tr.insertCell();
            td.innerText = title;
        }
    }
}
shortcutsJsonToForm();

</script>
