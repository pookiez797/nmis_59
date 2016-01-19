<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_gcs".
 *
 * @property integer $ref
 * @property string $an
 * @property string $hn
 * @property integer $gcs_type
 * @property string $e_type
 * @property string $v_type
 * @property string $m_type
 * @property string $score
 * @property string $date
 * @property integer $ward
 */
class WorkloadGcs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_gcs';
    }
    
    const GCS_1 = 0;
    const GCS_2 = 1;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gcs_type', 'ward'], 'integer'],
            [['date'], 'safe'],
            [['an'], 'string', 'max' => 8],
            [['hn'], 'string', 'max' => 10],
            [['e_type', 'v_type', 'm_type'], 'string', 'max' => 2],
            [['score'], 'string', 'max' => 5]
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
            'gcs_type' => Yii::t('app', 'แรกรับ/จำหน่าย'),
            'e_type' => Yii::t('app', 'E'),
            'v_type' => Yii::t('app', 'V'),
            'm_type' => Yii::t('app', 'M'),
            'score' => Yii::t('app', 'Score'),
            'date' => Yii::t('app', 'Date'),
            'ward' => Yii::t('app', 'Ward'),
        ];
    }

    public static function itemAlias($type) {
        $items = [
            'gcs' => [
                self::GCS_1 => 'แรกรับ',
                self::GCS_2 => 'จำหน่าย'
            ],
            
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
        //
    }
    
    public function getGCS() {
        return self::itemAlias('gcs');
    }
    
    public function getGcsName() {
        $items = self::itemAlias('gcs');
        return array_key_exists($this->gcs_type, $items) ? $items[$this->gcs_type] : null;
    }
    /**
     * @inheritdoc
     * @return WorkloadGcsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadGcsQuery(get_called_class());
    }
}
