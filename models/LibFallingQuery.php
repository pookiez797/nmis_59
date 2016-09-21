<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibFalling]].
 *
 * @see LibFalling
 */
class LibFallingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return LibFalling[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibFalling|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}