<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\Url;

class InitComponent extends Component {

    public function init() {
        if (\Yii::$app->getUser()->isGuest &&
            \Yii::$app->getRequest()->url !== Url::to(Url::toRoute('/site/login'))
        ) {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        parent::init();
    }
}