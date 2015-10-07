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
            'an' => Yii::t('app', '0 =no op,1=prepare op,2=op'),
            'ps_grade' => Yii::t('app', 'Ps Grade'),
            'ps_size' => Yii::t('app', 'Ps Size'),
            'position' => Yii::t('app', 'Position'),
            'ward' => Yii::t('app', 'Ward'),
            'reporter' => Yii::t('app', '1=clean wound,2=clean cont,3=cont,4= dirty'),
            'period' => Yii::t('app', 'Period'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }
}
