<?php
/**
 * Created by PhpStorm.
 * User: theillko
 * Date: 16.10.18
 * Time: 19:43
 */

namespace api\modules\v1\events;

interface EventInterface
{
    /**
     * @return bool
     */
    public function execute();

    /**
     * @param $params
     * @return bool
     */
    public function load($params);

    /**
     * @return bool
     */
    public function validate();

    /**
     * @return array
     */
    public function getErrors();
}