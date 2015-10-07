<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%workload_event2}}".
 *
 * @property integer $ref
 * @property string $event_date
 * @property string $event_period
 * @property string $hn
 * @property string $an
 * @property string $ward
 * @property string $bed_type
 * @property integer $bed_no
 * @property string $pt_type
 * @property string $admit_type
 * @property string $disc_type
 * @property string $disability
 * @property string $operate
 * @property string $prepare
 * @property integer $cpr
 * @property string $uti
 * @property string $vap
 * @property string $phleb
 * @property string $user
 * @property string $cutdown
 * @property integer $doctor_ref
 * @property string $last_update
 */
class WorkloadEvent2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    const ITEM_ON = 1;
    const ITEM_OFF = 0;
    const TUBE_X = 0;
    const TUBE_B = 1;
    const TUBE_V = 2;
    const TUBE_T = 3;
    
    public static function tableName()
    {
        return '{{%workload_event2}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_date', 'last_update'], 'safe'],
            [['bed_no', 'cpr', 'doctor_ref'], 'integer'],
            [['event_period', 'bed_type', 'admit_type', 'disc_type', 'disability', 'operate', 'prepare', 'uti', 'vap', 'phleb', 'cutdown'], 'string'],
            [['hn', 'an'], 'string', 'max' => 10],
            [['ward'], 'string', 'max' => 3],
            [['pt_type'], 'string', 'max' => 2],
            [['user'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'event_date' => Yii::t('app', 'Event Date'),
            'event_period' => Yii::t('app', 'Event Period'),
            'hn' => Yii::t('app', 'Hn'),
            'an' => Yii::t('app', 'An'),
            'ward' => Yii::t('app', 'Ward'),
            'bed_type' => Yii::t('app', 'Bed Type'),
            'bed_no' => Yii::t('app', 'Bed No'),
            'pt_type' => Yii::t('app', 'Pt Type'),
            'admit_type' => Yii::t('app', 'Admit Type'),
            'disc_type' => Yii::t('app', 'Disc Type'),
            'disability' => Yii::t('app', 'Disability'),
            'operate' => Yii::t('app', 'Operate'),
            'prepare' => Yii::t('app', 'Prepare'),
            'cpr' => Yii::t('app', 'Cpr'),
            'uti' => Yii::t('app', 'Uti'),
            'vap' => Yii::t('app', 'Vap'),
            'phleb' => Yii::t('app', 'Phleb'),
            'user' => Yii::t('app', 'User'),
            'cutdown' => Yii::t('app', 'Cutdown'),
            'doctor_ref' => Yii::t('app', 'Doctor Ref'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }
    
    public static function itemAlias($type) {
        $items = [
            'item' => [
                self::ITEM_OFF => 'X = OFF',
                self::ITEM_ON => 'O = ON'
            ],
            'tube' => [
                self::TUBE_X => 'X = OFF',
                self::TUBE_B => 'B = On Bird',
                self::TUBE_V => 'V = On Ventilator',
                self::TUBE_T => 'T = T-piece'
            ]
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
        //
    }
    
     public function getItem() {
        return self::itemAlias('item');
    }
     public function getTube() {
        return self::itemAlias('tube');
    }
}
