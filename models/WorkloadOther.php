<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_other".
 *
 * @property integer $ref
 * @property string $an
 * @property string $type
 * @property string $ward
 * @property string $reporter
 * @property string $period
 * @property string $start_date
 * @property string $end_date
 */
class WorkloadOther extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_other';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['an', 'type'], 'string', 'max' => 10],
            [['ward', 'reporter'], 'string', 'max' => 3],
            [['period'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'an' => Yii::t('app', 'An'),
            'type' => Yii::t('app', 'รายการ'),
            'ward' => Yii::t('app', 'หอผู้ป่วย'),
            'reporter' => Yii::t('app', 'ผู้รายงาน'),
            'period' => Yii::t('app', 'เวร'),
            'start_date' => Yii::t('app', 'วันที่เริ่ม'),
            'end_date' => Yii::t('app', 'วันที่สิ้นสุด'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadOtherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadOtherQuery(get_called_class());
    }

    public function getOtherData() {
        return @$this->hasOne(LibOther::className(), ['ref' => 'type']);
    }

    public function getOtherName() {
        return @$this->otherData->code;
    }
    public function getReporterData() {
        return @$this->hasOne(LibWard::className(), ['code' => 'reporter']);
    }

    public function getReporterName() {
        return @$this->reporterData->name;
    }

    public function getWardData() {
        return @$this->hasOne(LibWard::className(), ['code' => 'ward']);
    }

    public function getWardName() {
        return @$this->wardData->name;
    }
}
