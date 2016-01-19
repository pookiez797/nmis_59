<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_icposition".
 *
 * @property integer $ref
 * @property string $name
 */
class LibIcposition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_icposition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibIcpositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibIcpositionQuery(get_called_class());
    }
}
