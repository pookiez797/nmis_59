<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_observ".
 *
 * @property integer $ref
 * @property string $an
 * @property integer $event_ref
 * @property string $ob_type
 * @property string $ob_item
 * @property string $ob_owner
 * @property string $infect_date
 * @property string $infect_name
 * @property string $infect_desc
 * @property string $infect_ward
 * @property string $infect_reporter
 */
class WorkloadObserv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_observ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'required'],
            [['ref', 'event_ref'], 'integer'],
            [['an'], 'string', 'max' => 10],
            [['ob_type', 'ob_item', 'ob_owner', 'infect_date', 'infect_name', 'infect_desc', 'infect_ward', 'infect_reporter'], 'string', 'max' => 100]
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
            'event_ref' => Yii::t('app', 'Event Ref'),
            'ob_type' => Yii::t('app', 'Ob Type'),
            'ob_item' => Yii::t('app', 'Ob Item'),
            'ob_owner' => Yii::t('app', 'Ob Owner'),
            'infect_date' => Yii::t('app', 'Infect Date'),
            'infect_name' => Yii::t('app', 'Infect Name'),
            'infect_desc' => Yii::t('app', 'Infect Desc'),
            'infect_ward' => Yii::t('app', 'Infect Ward'),
            'infect_reporter' => Yii::t('app', 'Infect Reporter'),
        ];
    }
}
