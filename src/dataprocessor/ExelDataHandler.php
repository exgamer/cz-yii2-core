<?php

namespace citizenzet\yii2logic\dataprocessor;

use yii\base\Exception;

/**
 * Class ExelDataHandler
 * @package citizenzet\yii2logic\dataprocessor
 * @author citizenzet <exgamer@live.ru>
 */
abstract class ExelDataHandler extends DataHandler
{
    /**
     * @return string
     * @throws Exception
     */
    public function getQuery()
    {
        throw new Exception("set exel file path");
    }

    /**
     * @return \citizenzet\yii2logic\services\Service|void
     */
    public function getService()
    {
        throw new Exception("not using");
    }
}