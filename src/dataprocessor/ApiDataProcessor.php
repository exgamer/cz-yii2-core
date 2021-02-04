<?php

namespace citizenzet\yii2logic\dataprocessor;

use GuzzleHttp\Client;
use Yii;
use yii\base\Exception;
use yii\helpers\Console;

/**
 * Class DataProcessor
 *
 *  $config = [
 *     'dataHandlerClass' => ApiSitemapDataHandler::class,
 * ];
 *
 *  $config = [
 *     'dataHandlerClass' => [
 *         'class' => ApiBookmakerRatingRecountDataHandler::class,
 *         'someVar' => 12
 *      ],
 * ];
 *
 * ApiDataProcessor::exec($config);
 *
 * @package citizenzet\yii2logic\dataprocessor
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class ApiDataProcessor extends DataProcessor
{
    public $bySinglePage = true;

    public function init()
    {
        parent::init();
        if (! $this->dataHandler instanceof ApiDataHandler ) {
            throw new Exception(get_class($this->dataHandler) . " must extend " . ApiDataHandler::class);
        }
    }

    protected function executeQuery()
    {
        $client = new Client(['timeout' => 0]);
        $res = $client->request($this->dataHandler->method, $this->dataHandler->getQuery(), $this->dataHandler->queryConfig);
        $this->dataHandler->responseStatus = $res->getStatusCode();
        if ($res->getStatusCode() === 200){
            $data = json_decode($res->getBody()->getContents(), true);
            $this->dataHandler->responseBodyContent = $data;
            return $data;
        }

        return [];
    }
}