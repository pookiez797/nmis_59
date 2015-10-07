<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_position".
 *
 * @property integer $ref
 * @property string $position
 */
class LibPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'position' => Yii::t('app', 'Position'),
        ];
    }
}
