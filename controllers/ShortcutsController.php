<?php

namespace sij\humhub\modules\shortcuts\controllers;

use Yii;
use yii\web\HttpException;
use humhub\modules\space\models\Space;
use humhub\modules\content\components\ContentContainerController;
use sij\humhub\modules\shortcuts\models\ConfigureForm;

class ShortcutsController extends ContentContainerController
{

    /**
     * Configuration Action for Space Admins
     */
    public function actionConfig()
    {
        $container = $this->contentContainer;
        $form = new ConfigureForm();
        $form->json = $container->getSettings()->get('shortcuts');
        if ( $form->load(Yii::$app->request->post()) && $form->validate() ) {
            $container->getSettings()->set('shortcuts', $form->json);
            return $this->redirect($container->createUrl('/shortcuts/shortcuts/config'));
        }
        return $this->render('config', array('model' => $form));
    }

}
