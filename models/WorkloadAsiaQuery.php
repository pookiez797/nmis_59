<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadAsia]].
 *
 * @see WorkloadAsia
 */
class WorkloadAsiaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return WorkloadAsia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadAsia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}