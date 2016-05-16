<?php

namespace app\models;
use Yii;

/**
 * This is the ActiveQuery class for [[WorkloadTeam]].
 *
 * @see WorkloadTeam
 */
class WorkloadTeamQuery extends \yii\db\ActiveQuery
{
    public function byWard()
     {
         $this->andWhere('ward=:ward',[':ward' => Yii::$app->user->identity->ward]);
         return $this;
     }

    /**
     * @inheritdoc
     * @return WorkloadTeam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadTeam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
