<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_disease".
 *
 * @property integer $ref
 * @property string $disease
 */
class LibDisease extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_disease';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disease'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'disease' => Yii::t('app', 'Disease'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibDiseaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibDiseaseQuery(get_called_class());
    }
}
