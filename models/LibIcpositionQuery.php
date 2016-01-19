<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibIcposition]].
 *
 * @see LibIcposition
 */
class LibIcpositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return LibIcposition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibIcposition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}