<?php
/**
 * Created by PhpStorm.
 * User: theillko
 * Date: 16.10.18
 * Time: 19:44
 */

namespace api\modules\v1\events;


use api\modules\v1\traits\BlankFormName;
use yii\base\Model;

class TransactionEvent extends Model implements EventInterface
{
    use BlankFormName;

    public $amount;
    public $card;

    public function rules()
    {
        return [
            [['amount', 'card'], 'required'],
            [['amount'], 'integer'],
            [['card'], 'string', 'max' => 16]
        ];
    }

    public function execute()
    {
        \Yii::info("Transaction. Card: {$this->card}. Amount: {$this->amount}");
        return true;
    }
}