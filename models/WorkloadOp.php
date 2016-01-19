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
 * @property string $prepare_type
 */
class WorkloadOp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'workload_op';
    }

    const PROC_PREPARE = 1;
    const PROC_OP = 2;
    const W1 = 1;
    const W2 = 2;
    const W3 = 3;
    const W4 = 4;
    const PRE_ELEC = 'ELECTIVE';
    const PRE_EMER = 'EMERGENCY';

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['op_type'], 'string'],
            [['op_date'], 'safe'],
            [['an'], 'string', 'max' => 10],
            [['operate', 'wound_type', 'period'], 'string', 'max' => 1],
            [['ward'], 'string', 'max' => 3],
            [['prepare_type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'an' => Yii::t('app', 'An'),
            'operate' => Yii::t('app', 'รายการ'),
            'op_type' => Yii::t('app', 'ชนิดการผ่าตัด'),
            'op_date' => Yii::t('app', 'วันที่ผ่าตัด'),
            'wound_type' => Yii::t('app', 'ประเภทแผลผ่าตัด'),
            'ward' => Yii::t('app', 'Ward'),
            'period' => Yii::t('app', 'Period'),
            'prepare_type' => Yii::t('app', 'ประเภทการเตรียมผ่าตัด'),
        ];
    }

    public static function itemAlias($type) {
        $items = [
            'procedure' => [
                self::PROC_PREPARE => 'เตรียมผ่าตัด',
                self::PROC_OP => 'ผ่าตัด'
            ],
            'wound' => [
                self::W1 => 'Clean Wound',
                self::W2 => 'Clean Contaminate Wound',
                self::W3 => 'Contaminate Wound',
                self::W4 => 'Dirty Wound'
            ],
            'prepare' => [
                self::PRE_ELEC => 'ELECTIVE',
                self::PRE_EMER => 'EMERGENCY',
            ]
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
        //
    }

    public function getProcedure() {
        return self::itemAlias('procedure');
    }

    public function getWound() {
        return self::itemAlias('wound');
    }

    public function getPrepare() {
        return self::itemAlias('prepare');
    }

    public function getProcedureName() {
        $items = self::itemAlias('procedure');
        return array_key_exists($this->operate, $items) ? $items[$this->operate] : null;
    }

    public function getWoundName() {
        $items = self::itemAlias('wound');
        return array_key_exists($this->wound_type, $items) ? $items[$this->wound_type] : null;
    }

    public function getPrepareName() {
         $items = self::itemAlias('prepare');
        return array_key_exists($this->prepare_type, $items) ? $items[$this->prepare_type] : null;
    }

    /**
     * @inheritdoc
     * @return WorkloadOpQuery the active query used by this AR class.
     */
    public static function find() {
        return new WorkloadOpQuery(get_called_class());
    }

}
