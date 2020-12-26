<?php

namespace citizenzet\yii2logic\enum;

use Yii;

/**
 * Класс перечисления который содержит константы для статусов
 *
 * Class StatusEnum
 * @package citizenzet\yii2logic\enum
 * @author Olzhas Kulzhambekov <exgamer@live.ru>
 */
class StatusEnum extends Enum
{
    const INACTIVE = 0;
    const ACTIVE = 1;

    public static function labels()
    {
        return [
            self::ACTIVE => Yii::t('common', "Active"),
            self::INACTIVE => Yii::t('common', "Inactive"),
        ];
    }
}
