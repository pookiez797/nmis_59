<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_ic".
 *
 * @property integer $ref
 * @property string $hn
 * @property string $an
 * @property integer $factor
 * @property integer $position
 * @property integer $disease
 * @property string $type
 * @property integer $infect_ward
 * @property string $infect_date
 * @property string $last_update
 */
class WorkloadIc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_ic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factor', 'position', 'disease', 'infect_ward'], 'integer'],
            [['infect_date', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 8],
            [['an'], 'string', 'max' => 7],
            [['type'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'hn' => Yii::t('app', 'Hn'),
            'an' => Yii::t('app', 'An'),
            'factor' => Yii::t('app', 'ปัจจัยเสี่ยง'),
            'position' => Yii::t('app', 'ตำแหน่ง'),
            'disease' => Yii::t('app', 'เชื้อสาเหตุ'),
            'type' => Yii::t('app', 'รายละเอียด'),
            'infect_ward' => Yii::t('app', 'หน่วยงาน'),
            'infect_date' => Yii::t('app', 'วันที่ติดเชื้อ'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadIcQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadIcQuery(get_called_class());
    }
    
    public function getPositionData() {
        return @$this->hasOne(LibIcposition::className(), ['ref' => 'position']);
    }
    public function getPositionName() {
        return @$this->positionData->name;
    }
    
    public function getDiseaseData() {
        return @$this->hasOne(LibDisease::className(), ['ref' => 'disease']);
    }
    
    public function getDiseaseName() {
        return @$this->diseaseData->disease;
    }
    public function getOfficeData() {
        return @$this->hasOne(Ward::className(), ['code' => 'infect_ward']);
    }
    
    public function getOfficeName() {
        return @$this->officeData->ward;
    }
}
