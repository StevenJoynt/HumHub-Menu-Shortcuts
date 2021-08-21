<?php

namespace sij\humhub\modules\shortcuts;

use Yii;
use yii\helpers\Url;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\space\models\Space;

class Module extends \humhub\modules\content\components\ContentContainerModule
{
    /**
    * @inheritdoc
    */
    public function getContentContainerTypes()
    {
        return [
            Space::class,
        ];
    }

    /**
    * @inheritdoc
    */
    public function DELETEDgetConfigUrl()
    {
        return Url::to(['/shortcuts/admin']);
    }

    /**
    * @inheritdoc
    */
    public function disable()
    {
        // Cleanup all module data, don't remove the parent::disable()!!!
        parent::disable();
    }

    /**
    * @inheritdoc
    */
    public function disableContentContainer(ContentContainerActiveRecord $container)
    {
        // Clean up space related data, don't remove the parent::disable()!!!
        parent::disableContentContainer($container);
    }

    /**
    * @inheritdoc
    */
    public function getContentContainerName(ContentContainerActiveRecord $container)
    {
        return Yii::t('ShortcutsModule.base', 'Shortcut Keys');
    }

    /**
    * @inheritdoc
    */
    public function getContentContainerDescription(ContentContainerActiveRecord $container)
    {
        return Yii::t('ShortcutsModule.base', 'Space Menu Shortcut Keys');
    }
}
