<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LibDisease]].
 *
 * @see LibDisease
 */
class LibDiseaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return LibDisease[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibDisease|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}