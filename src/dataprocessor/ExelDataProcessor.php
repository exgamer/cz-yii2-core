<?php

namespace citizenzet\yii2logic\dataprocessor;

use GuzzleHttp\Client;
use Yii;
use yii\base\Exception;
use yii\helpers\Console;

/**
 * Class ExelDataProcessor
 * @package citizenzet\yii2logic\dataprocessor
 * @author citizenzet <exgamer@live.ru>
 */
class ExelDataProcessor extends DataProcessor
{
    public $bySinglePage = true;

    public function init()
    {
        parent::init();
        if (! $this->dataHandler instanceof ExelDataHandler ) {
            throw new Exception(get_class($this->dataHandler) . " must extend " . ExelDataHandler::class);
        }
    }

    protected function executeQuery()
    {
        $client = new Client(['timeout' => 0]);
        $res = $client->request($this->dataHandler->method, $this->dataHandler->getQuery(), $this->dataHandler->queryConfig);
        if ($res->getStatusCode() === 200){
            $data = json_decode($res->getBody()->getContents(), true);

            return $data;
        }

        return [];
    }
}