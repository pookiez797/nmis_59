<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_falling".
 *
 * @property integer $ref
 * @property string $an
 * @property string $falling_level
 * @property string $ward
 * @property string $reporter
 * @property string $period
 * @property string $start_date
 * @property string $end_date
 */
class WorkloadFalling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_falling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['an'], 'string', 'max' => 10],
            [['falling_level', 'period'], 'string', 'max' => 1],
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
            'falling_level' => Yii::t('app', 'Falling Level'),
            'ward' => Yii::t('app', 'หน่วยงานที่เกิดแผล'),
            'reporter' => Yii::t('app', 'หน่วยงานที่รายงาน'),
            'period' => Yii::t('app', 'เวร'),
            'start_date' => Yii::t('app', 'วันที่เกิดแผล'),
            'end_date' => Yii::t('app', 'วันที่แผลหาย'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadFallingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadFallingQuery(get_called_class());
    }

    public function getFallingData() {
        return @$this->hasOne(LibFalling::className(), ['ref' => 'falling_level']);
    }

    public function getFallingName() {
        return @$this->fallingData->falling;
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
