<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadDiag]].
 *
 * @see WorkloadDiag
 */
class WorkloadDiagQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadDiag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadDiag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}