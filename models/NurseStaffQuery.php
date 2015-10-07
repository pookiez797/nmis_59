<?php

namespace app\models;
use Yii;
/**
 * This is the ActiveQuery class for [[NurseStaff]].
 *
 * @see NurseStaff
 */
class NurseStaffQuery extends \yii\db\ActiveQuery
{
    public function byWard()
    {
        // ใช้สร้างกรณีที่ต้องใส่เงื่อนไขให้กับ ข้อมูล
        // \Yii::$app->user->identity->ward  เรียกใช้จากตารางที่ Log in 
        $this->andWhere('ward=:ward',[':ward' => Yii::$app->user->identity->ward]);
        $this->orderby(['priority' => SORT_ASC]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return NurseStaff[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NurseStaff|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}