<?php

namespace  sij\humhub\modules\shortcuts;

use Yii;
use yii\helpers\Url;

class Events
{

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        return; # we do not have an admin menu
    }

    /**
     * Defines what to do after the Space Menu has been generated
     *
     * @param $event
     */
    public static function afterSpaceMenuRun($event)
    {
        $container = $event->sender->space;
        $json = $container->getSettings()->get('shortcuts');
        $src = <<<END
<script>
function shortcutsJsonToMenu(shortcuts) {
    var trigger = navigator.userAgent.toLowerCase().indexOf('firefox') > -1 ? "Alt+Shift+" : "Alt+" ;
    var menu = document.getElementById("space-main-menu");
    var items = menu.getElementsByTagName("A");
    var i;
    for ( i = 0 ; i < items.length ; i++ ) {
        var title = items[i].innerText.trim();
        var key = shortcuts[title];
        if ( key ) {
            items[i].accessKey = key;
            items[i].title = trigger + key;
        }
    }
}
END;
        $src .= "shortcutsJsonToMenu(" . $json . ");\n</script>\n";
        $event->result .= $src;
    }

}
