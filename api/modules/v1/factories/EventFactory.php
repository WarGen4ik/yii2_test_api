<?php
/**
 * Created by PhpStorm.
 * User: theillko
 * Date: 16.10.18
 * Time: 19:42
 */

namespace api\modules\v1\factories;

use api\modules\v1\events\OrderEvent;
use api\modules\v1\events\TransactionEvent;
use api\modules\v1\events\EventInterface;
use yii\web\NotFoundHttpException;

class EventFactory implements ApiFactory
{

    /**
     * @param $event string
     * @return EventInterface
     * @throws NotFoundHttpException
     */
    public static function createModel($event)
    {
        switch ($event){
            case 'new_order':
                return new OrderEvent();
            case 'new_transaction':
                return new TransactionEvent();
            default:
                throw new NotFoundHttpException();
        }
    }
}