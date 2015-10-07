<?php

namespace app\models;
use Yii;
/**
 * This is the ActiveQuery class for [[WorkloadPtdisc]].
 *
 * @see WorkloadPtdisc
 */
class WorkloadPtdiscQuery extends \yii\db\ActiveQuery
{
    public function byward()
    {
        // ใช้สร้างกรณีที่ต้องใส่เงื่อนไขให้กับ ข้อมูล
        // \Yii::$app->user->identity->ward  เรียกใช้จากตารางที่ Log in 
        $this->andWhere('ward=:ward',[':ward' => Yii::$app->user->identity->ward]);
        $this->orderby(['lastupdate' => SORT_DESC]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return WorkloadPtdisc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WorkloadPtdisc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}