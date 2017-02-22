<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_ps".
 *
 * @property integer $ref
 * @property string $an
 * @property string $ps_grade
 * @property string $ps_size
 * @property string $position
 * @property string $ward
 * @property string $reporter
 * @property string $period
 * @property string $start_date
 * @property string $end_date
 */
class WorkloadPs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_ps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['an'], 'string', 'max' => 10],
            [['ps_grade', 'period'], 'string', 'max' => 1],
            [['ps_size', 'position'], 'string', 'max' => 255],
            [['ward', 'reporter'], 'string', 'max' => 3]
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
            'ps_grade' => Yii::t('app', 'Pressure Grade'),
            'ps_size' => Yii::t('app', 'ขนาดแผล'),
            'position' => Yii::t('app', 'ตำแหน่งที่เกิด'),
            'ward' => Yii::t('app', 'หน่วยงานที่เกิดแผล'),
            'reporter' => Yii::t('app', 'หน่วยงานที่รายงาน'),
            'period' => Yii::t('app', 'เวร'),
            'start_date' => Yii::t('app', 'วันที่เกิดแผล'),
            'end_date' => Yii::t('app', 'วันที่แผลหาย'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadPsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadPsQuery(get_called_class());
    }

    public function getPressureData() {
        return @$this->hasOne(LibPressureGrade::className(), ['ref' => 'ps_grade']);
    }

    public function getPressureName() {
        return @$this->pressureData->pressure_grade;
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
      if(@$this->wardData->name != ''){
        return @$this->wardData->name;
      }else{
        return 'ภายนอก รพ.';
      }
        // return @$this->wardData->name;
    }
}
