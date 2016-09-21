<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadOther]].
 *
 * @see WorkloadOther
 */
class WorkloadOtherQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadOther[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadOther|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
