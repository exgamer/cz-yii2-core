<?php

namespace citizenzet\yii2logic\db;

use Yii;
use yii\db\ActiveQuery as Base;

class ActiveQuery extends Base
{
    /**
     * Сброс условий запроса
     */
    public function resetCondition()
    {
        $this->where = [];
        $this->params = [];

        return $this;
    }

    public function resetJoin()
    {
        $this->join = [];

        return $this;
    }

    public function resetSelect()
    {
        $this->select = null;

        return $this;
    }

    /**
     * Возвращает собранный sql запрос
     *
     * @return string
     */
    public function getSql()
    {
        $modelClass = $this->modelClass;

        return $this->prepare($modelClass::getDb()->queryBuilder)->createCommand()->rawSql;
    }

    /**
     * @param null $fetchMode
     * @return array
     */
    public function queryAllAsArray($fetchMode = null)
    {
        $modelClass = $this->modelClass;
        $command = $modelClass::getDb()->createCommand($this->getSql());

        return $command->queryAll($fetchMode);
    }

    /**
     * @param null $fetchMode
     * @return array
     */
    public function queryOneAsArray($fetchMode = null)
    {
        $modelClass = $this->modelClass;
        $command = $modelClass::getDb()->createCommand($this->getSql());

        return $command->queryOne($fetchMode);
    }
}