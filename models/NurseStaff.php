<?php

namespace app\models;

use Yii;
use app\models\LibPosition;
/**
 * This is the model class for table "nurse_staff".
 *
 * @property integer $staff_ref
 * @property integer $code
 * @property string $no
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property integer $ward
 * @property integer $position
 * @property integer $priority
 * @property string $lastupdate
 */
class NurseStaff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nurse_staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'ward', 'position', 'priority'], 'integer'],
            [['lastupdate'], 'safe'],
            [['no'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 20],
            [['name', 'surname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_ref' => Yii::t('app', 'Staff Ref'),
            'code' => Yii::t('app', 'Code'),
            'no' => Yii::t('app', 'เลขที่เงินเดือน'),
            'title' => Yii::t('app', 'คำนำหน้า'),
            'name' => Yii::t('app', 'ชื่อ'),
            'surname' => Yii::t('app', 'สกุล'),
            'ward' => Yii::t('app', 'หน่วยงาน'),
            'position' => Yii::t('app', 'ตำแหน่ง'),
            'priority' => Yii::t('app', 'ลำดับ'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }

    /**
     * @inheritdoc
     * @return NurseStaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NurseStaffQuery(get_called_class());
    }
    
    public function getPositionType(){
        return @$this->hasOne(LibPosition::className(),['ref'=>'position']);
    }

    public function getPositionName(){
        return @$this->positionType->position;
    }
}
