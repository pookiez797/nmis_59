<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_diag".
 *
 * @property integer $ref
 * @property string $an
 * @property string $diag
 * @property string $last_update
 */
class WorkloadDiag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_diag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diag'], 'string'],
            [['last_update'], 'safe'],
            [['an'], 'string', 'max' => 10]
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
            'diag' => Yii::t('app', 'Diag'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadDiagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadDiagQuery(get_called_class());
    }
}
