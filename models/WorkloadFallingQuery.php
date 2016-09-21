<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadFalling]].
 *
 * @see WorkloadFalling
 */
class WorkloadFallingQuery extends \yii\db\ActiveQuery
{
    public function byAn($an)
    {
        $this->andWhere('an = :an',[':an' => $an]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadFalling[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadFalling|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
