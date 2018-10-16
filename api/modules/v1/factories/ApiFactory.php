<?php
/**
 * Created by PhpStorm.
 * User: theillko
 * Date: 16.10.18
 * Time: 19:28
 */

namespace api\modules\v1\factories;

interface ApiFactory
{
    public static function createModel($event);
}