<?php
/**
 * Created by PhpStorm.
 * User: theillko
 * Date: 16.10.18
 * Time: 19:43
 */

namespace api\modules\v1\events;

use api\modules\v1\traits\BlankFormName;
use yii\base\Model;

class OrderEvent extends Model implements EventInterface
{
    use BlankFormName;

    public $order;

    public function rules()
    {
        return [
            [['order'], 'required'],
            [['order'], 'integer']
        ];
    }

    public function execute()
    {
        $event = \Yii::$app->request->get('eventName');
        return \Yii::$app->mailer->compose('order', ['order' => $this->order, 'url' => $this->getUrl()])
            ->setFrom(\Yii::$app->params['emailFrom'])
            ->setTo(\Yii::$app->params['emailTo'])
            ->setSubject("Событие {$event}")
            ->send();
    }

    private function getUrl(){
        return \Yii::$app->params['domain'] . "/orders/view/$this->order";
    }
}