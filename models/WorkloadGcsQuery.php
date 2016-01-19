<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadGcs]].
 *
 * @see WorkloadGcs
 */
class WorkloadGcsQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadGcs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadGcs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}