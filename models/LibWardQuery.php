<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibWard]].
 *
 * @see LibWard
 */
class LibWardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return LibWard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibWard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}