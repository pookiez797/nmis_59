<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibOther]].
 *
 * @see LibOther
 */
class LibOtherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return LibOther[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibOther|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}