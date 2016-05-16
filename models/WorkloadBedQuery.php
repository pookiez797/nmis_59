<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkloadBed]].
 *
 * @see WorkloadBed
 */
class WorkloadBedQuery extends \yii\db\ActiveQuery
{
  public function byTeam($team_ref)
   {
       $this->andWhere('team_ref=:team_ref',[':team_ref' => $team_ref]);
       return $this;
   }

    /**
     * @inheritdoc
     * @return WorkloadBed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadBed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
