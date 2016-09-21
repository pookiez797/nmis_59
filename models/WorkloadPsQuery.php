<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadPs]].
 *
 * @see WorkloadPs
 */
class WorkloadPsQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadPs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadPs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
