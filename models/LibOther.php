<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_other".
 *
 * @property integer $ref
 * @property string $code
 * @property string $name
 */
class LibOther extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_other';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 10],
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
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibOtherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibOtherQuery(get_called_class());
    }
}
