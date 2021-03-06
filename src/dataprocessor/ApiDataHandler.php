<?php

namespace citizenzet\yii2logic\dataprocessor;

use yii\base\Exception;

/**
 * Вспомогательный класс для обработки данных полученных через апи
 *
 * @author CitizenZet
 */
abstract class ApiDataHandler extends DataHandler
{
    public $method = 'GET';
    public $queryConfig = [];

    public $responseStatus;
    public $responseBodyContent;

    /**
     * @return string
     * @throws Exception
     */
    public function getQuery()
    {
        throw new Exception("set url");
    }

    /**
     * @return \citizenzet\yii2logic\services\Service|void
     */
    public function getService()
    {
        throw new Exception("not using");
    }
}