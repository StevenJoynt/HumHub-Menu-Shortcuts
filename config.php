<?php

use sij\humhub\modules\shortcuts\Events;
use humhub\modules\space\widgets\Menu;

return [
	'id' => 'shortcuts',
	'class' => 'sij\humhub\modules\shortcuts\Module',
	'namespace' => 'sij\humhub\modules\shortcuts',
	'events' => [
        [
            'class' => Menu::className(),
            'event' => Menu::EVENT_AFTER_RUN,
            'callback' => [Events::class, 'afterSpaceMenuRun'],
        ],
	],
];
