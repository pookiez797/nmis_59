<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadOp]].
 *
 * @see WorkloadOp
 */
class WorkloadOpQuery extends \yii\db\ActiveQuery
{
    
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadOp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadOp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}