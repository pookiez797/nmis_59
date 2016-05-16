<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_asia".
 *
 * @property integer $ref
 * @property string $an
 * @property string $hn
 * @property integer $c5_r
 * @property integer $c5_l
 * @property integer $c6_r
 * @property integer $c6_l
 * @property integer $c7_r
 * @property integer $c7_l
 * @property integer $c8_r
 * @property integer $c8_l
 * @property integer $t1_r
 * @property integer $t1_l
 * @property integer $upper_total_r
 * @property integer $upper_total_l
 * @property integer $upper_total
 * @property integer $l2_r
 * @property integer $l2_l
 * @property integer $l3_r
 * @property integer $l3_l
 * @property integer $l4_r
 * @property integer $l4_l
 * @property integer $l5_r
 * @property integer $l5_l
 * @property integer $s1_r
 * @property integer $s1_l
 * @property integer $lower_total_r
 * @property integer $lower_total_l
 * @property integer $lower_total
 * @property string $date
 * @property integer $ward
 */
class WorkloadAsia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_asia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c5_r', 'c5_l', 'c6_r', 'c6_l', 'c7_r', 'c7_l', 'c8_r', 'c8_l', 't1_r', 't1_l', 'upper_total_r', 'upper_total_l', 'upper_total', 'l2_r', 'l2_l', 'l3_r', 'l3_l', 'l4_r', 'l4_l', 'l5_r', 'l5_l', 's1_r', 's1_l', 'lower_total_r', 'lower_total_l', 'lower_total', 'ward'], 'integer'],
            [['date'], 'safe'],
            [['an'], 'string', 'max' => 8],
            [['hn'], 'string', 'max' => 10]
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
            'hn' => Yii::t('app', 'Hn'),
            'c5_r' => Yii::t('app', 'C5 R'),
            'c5_l' => Yii::t('app', 'C5 L'),
            'c6_r' => Yii::t('app', 'C6 R'),
            'c6_l' => Yii::t('app', 'C6 L'),
            'c7_r' => Yii::t('app', 'C7 R'),
            'c7_l' => Yii::t('app', 'C7 L'),
            'c8_r' => Yii::t('app', 'C8 R'),
            'c8_l' => Yii::t('app', 'C8 L'),
            't1_r' => Yii::t('app', 'T1 R'),
            't1_l' => Yii::t('app', 'T1 L'),
            'upper_total_r' => Yii::t('app', 'Upper Total R'),
            'upper_total_l' => Yii::t('app', 'Upper Total L'),
            'upper_total' => Yii::t('app', 'Upper Total'),
            'l2_r' => Yii::t('app', 'L2 R'),
            'l2_l' => Yii::t('app', 'L2 L'),
            'l3_r' => Yii::t('app', 'L3 R'),
            'l3_l' => Yii::t('app', 'L3 L'),
            'l4_r' => Yii::t('app', 'L4 R'),
            'l4_l' => Yii::t('app', 'L4 L'),
            'l5_r' => Yii::t('app', 'L5 R'),
            'l5_l' => Yii::t('app', 'L5 L'),
            's1_r' => Yii::t('app', 'S1 R'),
            's1_l' => Yii::t('app', 'S1 L'),
            'lower_total_r' => Yii::t('app', 'Lower Total R'),
            'lower_total_l' => Yii::t('app', 'Lower Total L'),
            'lower_total' => Yii::t('app', 'Lower Total'),
            'date' => Yii::t('app', 'Date'),
            'ward' => Yii::t('app', 'Ward'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadAsiaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadAsiaQuery(get_called_class());
    }
}
