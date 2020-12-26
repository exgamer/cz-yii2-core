<?php

namespace citizenzet\yii2logic\controllers\console;

use citizenzet\yii2logic\console\traits\OutputTrait;
use yii\console\Controller;

/**
 * Class ConsoleController
 * @package citizenzet\yii2logic\controllers\console
 * @author citizenzet <exgamer@live.ru>
 */
abstract class ConsoleController extends Controller
{
    use OutputTrait;
}

