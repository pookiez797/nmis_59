<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_bed".
 *
 * @property integer $ref
 * @property integer $team_ref
 * @property string $bed_type
 * @property integer $bed_no
 */
class WorkloadBed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_bed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_ref', 'bed_no'], 'integer'],
            [['bed_type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'team_ref' => Yii::t('app', 'Team Ref'),
            'bed_type' => Yii::t('app', 'Bed Type'),
            'bed_no' => Yii::t('app', 'Bed No'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadBedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadBedQuery(get_called_class());
    }
}
