<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_falling".
 *
 * @property integer $ref
 * @property string $falling
 * @property string $level
 */
class LibFalling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_falling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['falling', 'level'], 'required'],
            [['falling'], 'string', 'max' => 200],
            [['level'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'falling' => Yii::t('app', 'Falling'),
            'level' => Yii::t('app', 'Level'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibFallingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibFallingQuery(get_called_class());
    }
}
