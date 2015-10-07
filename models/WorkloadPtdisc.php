<?php

namespace app\models;

use Yii;
use app\models\LibDisc;

/**
 * This is the model class for table "workload_ptdisc".
 *
 * @property integer $ref
 * @property string $hn
 * @property string $an
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property integer $ward
 * @property string $movestatus
 * @property string $lastupdate
 */
class WorkloadPtdisc extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'workload_ptdisc';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ward'], 'integer'],
            [['lastupdate'], 'safe'],
            [['hn', 'an'], 'string', 'max' => 8],
            [['title'], 'string', 'max' => 6],
            [['name', 'surname'], 'string', 'max' => 50],
            [['movestatus'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'hn' => Yii::t('app', 'HN'),
            'an' => Yii::t('app', 'AN'),
            'title' => Yii::t('app', 'คำนำหน้า'),
            'name' => Yii::t('app', 'ชื่อ'),
            'surname' => Yii::t('app', 'สกุล'),
            'ward' => Yii::t('app', 'Ward'),
            'movestatus' => Yii::t('app', 'Movestatus'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }

    public static function find() {
        return new WorkloadPtdiscQuery(get_called_class());
    }

    public function getDisctype() {
        return @$this->hasOne(LibDisc::className(), ['code' => 'movestatus']);
    }

    public function getDiscName() {
        return @$this->disctype->name;
    }

}
