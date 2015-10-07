<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_bedno".
 *
 * @property integer $ward
 * @property integer $gnbed
 * @property integer $spbed
 */
class WorkloadBedno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_bedno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ward', 'gnbed', 'spbed'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ward' => Yii::t('app', 'Ward'),
            'gnbed' => Yii::t('app', 'Gnbed'),
            'spbed' => Yii::t('app', 'Spbed'),
        ];
    }
}
