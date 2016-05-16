<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lib_ward".
 *
 * @property integer $code
 * @property string $ward
 */
class LibWard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_ward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'integer'],
            [['ward'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'ward' => Yii::t('app', 'Ward'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibWardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibWardQuery(get_called_class());
    }
}
