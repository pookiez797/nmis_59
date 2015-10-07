<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nurse_event".
 *
 * @property integer $ref
 * @property string $date
 * @property integer $period
 * @property integer $patient_flag
 * @property integer $ward
 * @property integer $inp_id
 * @property string $lastupdate
 */
class NurseEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const SHIFT_NIGHT = 1;
    const SHIFT_EARLY = 2;
    const SHIFT_NOON = 3;
    
    public static function tableName()
    {
        return 'nurse_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'lastupdate'], 'safe'],
            [['period', 'patient_flag', 'ward', 'inp_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'date' => Yii::t('app', 'วันที่'),
            'period' => Yii::t('app', 'เวร'),
            'patient_flag' => Yii::t('app', 'patient_flag'),
            'ward' => Yii::t('app', 'Ward'),
            'inp_id' => Yii::t('app', 'Inp ID'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }

    public static function itemAlias($type) {
        $items = [
           
            'shift' => [
                self::SHIFT_NIGHT => 'ดึก',
                self::SHIFT_EARLY => 'เช้า',
                self::SHIFT_NOON => 'บ่าย',
            ]
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
        //
    }
    
    public function getShift() {
        return self::itemAlias('shift');
    }
    public function getShiftName() {
        $items = self::itemAlias('shift');
        return @array_key_exists($this->period, $items) ? $items[$this->period] :null;
    }
    /**
     * @inheritdoc
     * @return NurseEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NurseEventQuery(get_called_class());
    }
}
