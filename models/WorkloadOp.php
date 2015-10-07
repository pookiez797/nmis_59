<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_op".
 *
 * @property integer $ref
 * @property string $an
 * @property string $operate
 * @property string $op_type
 * @property string $op_date
 * @property string $wound_type
 * @property string $ward
 * @property string $period
 */
class WorkloadOp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_op';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['op_type'], 'string'],
            [['op_date'], 'safe'],
            [['an'], 'string', 'max' => 10],
            [['operate', 'wound_type', 'period'], 'string', 'max' => 1],
            [['ward'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'an' => Yii::t('app', '0 =no op,1=prepare op,2=op'),
            'operate' => Yii::t('app', 'Operate'),
            'op_type' => Yii::t('app', 'Op Type'),
            'op_date' => Yii::t('app', 'Op Date'),
            'wound_type' => Yii::t('app', '1=clean wound,2=clean cont,3=cont,4= dirty'),
            'ward' => Yii::t('app', 'Ward'),
            'period' => Yii::t('app', 'Period'),
        ];
    }
}
