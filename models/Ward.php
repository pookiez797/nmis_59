<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ward".
 *
 * @property integer $code
 * @property string $ward
 * @property string $tel
 * @property string $abbr
 * @property integer $to_ward
 * @property integer $bed_nm
 * @property integer $bed_sp
 * @property integer $bed_ot
 * @property integer $room_nm
 * @property integer $room_sp
 * @property integer $dep
 * @property integer $iscount
 * @property string $head
 * @property string $expireuse
 * @property string $startuse
 * @property string $code2
 */
class Ward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'expireuse', 'startuse'], 'required'],
            [['code', 'to_ward', 'bed_nm', 'bed_sp', 'bed_ot', 'room_nm', 'room_sp', 'dep', 'iscount'], 'integer'],
            [['expireuse', 'startuse'], 'safe'],
            [['ward'], 'string', 'max' => 50],
            [['tel'], 'string', 'max' => 10],
            [['abbr'], 'string', 'max' => 12],
            [['head'], 'string', 'max' => 45],
            [['code2'], 'string', 'max' => 4]
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
            'tel' => Yii::t('app', 'Tel'),
            'abbr' => Yii::t('app', 'Abbr'),
            'to_ward' => Yii::t('app', 'To Ward'),
            'bed_nm' => Yii::t('app', 'Bed Nm'),
            'bed_sp' => Yii::t('app', 'Bed Sp'),
            'bed_ot' => Yii::t('app', 'Bed Ot'),
            'room_nm' => Yii::t('app', 'Room Nm'),
            'room_sp' => Yii::t('app', 'Room Sp'),
            'dep' => Yii::t('app', 'Dep'),
            'iscount' => Yii::t('app', 'Iscount'),
            'head' => Yii::t('app', 'Head'),
            'expireuse' => Yii::t('app', 'Expireuse'),
            'startuse' => Yii::t('app', 'Startuse'),
            'code2' => Yii::t('app', 'Code2'),
        ];
    }

    /**
     * @inheritdoc
     * @return WardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WardQuery(get_called_class());
    }
}
