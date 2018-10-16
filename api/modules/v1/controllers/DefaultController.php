<?php

namespace api\modules\v1\controllers;

use api\modules\v1\factories\EventFactory;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;


class DefaultController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = HttpBearerAuth::className();
        $behaviors['authenticator']['only'] = ['index'];
        return $behaviors;
    }

    public function verbs()
    {
        return array_merge(parent::verbs(), [
            'index' => ['POST']
        ]);
    }

    /**
     * Executes event by name and params
     * @param $eventName string
     * @return array
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex($eventName)
    {
        $event = EventFactory::createModel($eventName);
        if ($event->load(\Yii::$app->request->post()) && $event->validate()){
            return ['success' => $event->execute()];
        }
        return array_merge(['errors' => $event->getErrors()], ['success' => false]);
    }
}
