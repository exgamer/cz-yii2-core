<?php

namespace citizenzet\yii2logic\dataprocessor;

use citizenzet\yii2logic\dataprocessor\parser\SimpleXLSX;
use GuzzleHttp\Client;
use Yii;
use yii\base\Exception;
use yii\helpers\Console;

/**
 * Class CsvDataProcessor
 * @package citizenzet\yii2logic\dataprocessor
 * @author citizenzet <exgamer@live.ru>
 */
class CsvDataProcessor extends DataProcessor
{
    public $bySinglePage = true;

    public function init()
    {
        parent::init();
        if (! $this->dataHandler instanceof CsvDataHandler ) {
            throw new Exception(get_class($this->dataHandler) . " must extend " . CsvDataHandler::class);
        }
    }

    public function execute()
    {
        $this->beforeExecute();
        if (! $this->isExecute())
        {
            return true;
        }

        if (($handle = fopen($this->dataHandler->getQuery(), "r")) !== FALSE) {
            $count = 10000000;
            $row = 1;
            while (($model = fgetcsv($handle, 1000, $this->dataHandler->getDelimeter())) !== FALSE) {
                $this->outputSuccess( "START PROCESS ROW : " . $row . " of " . $count );
                Console::startProgress(0, $count);
                $this->prepareModel($model);
                $this->processModel($model);
                $this->finishProcessModel($model);
                Console::updateProgress($k + 1 , $count);
                $memory = memory_get_usage()/1024;
                $this->outputSuccess( "END PROCESS ROW : "  . $row . " of " . $count . "; MEMORY USED: {$memory}");
                $row++;
            }
            fclose($handle);
        }

        $this->afterExecute();

        return true;
    }
}