<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NursePatient]].
 *
 * @see NursePatient
 */
class NursePatientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NursePatient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NursePatient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}