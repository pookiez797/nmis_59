<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadIc]].
 *
 * @see WorkloadIc
 */
class WorkloadIcQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadIc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadIc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}