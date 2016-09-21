<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_pressure_grade".
 *
 * @property integer $ref
 * @property string $pressure_grade
 */
class LibPressureGrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_pressure_grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pressure_grade'], 'required'],
            [['pressure_grade'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'pressure_grade' => Yii::t('app', 'Pressure Grade'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibPressureGradeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibPressureGradeQuery(get_called_class());
    }
}
