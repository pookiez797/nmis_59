<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NurseStaffevent]].
 *
 * @see NurseStaffevent
 */
class NurseStaffeventQuery extends \yii\db\ActiveQuery
{
//    public function byEvent()
//    {
//        $this->andWhere('[[status]]=1');
//        return $this;
//    }

    /**
     * @inheritdoc
     * @return NurseStaffevent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NurseStaffevent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}