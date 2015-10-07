<?php

namespace app\models;
use Yii;

/**
 * This is the ActiveQuery class for [[WorkloadDoctor]].
 *
 * @see WorkloadDoctor
 */
class WorkloadDoctorQuery extends \yii\db\ActiveQuery
{
   public function byWard()
    {
        $this->andWhere('ward=:ward',[':ward' => Yii::$app->user->identity->ward]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadDoctor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadDoctor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}