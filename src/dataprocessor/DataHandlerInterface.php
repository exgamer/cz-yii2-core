<?php

namespace citizenzet\yii2logic\dataprocessor;

use citizenzet\yii2logic\services\Service;

/**
 * Interface DataHandlerInterface
 * @package citizenzet\yii2logic\services\interfaces
 */
interface DataHandlerInterface
{
    /**
     * @return Service
     */
    public function getService();


}