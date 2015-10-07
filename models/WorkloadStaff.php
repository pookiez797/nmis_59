<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_staff".
 *
 * @property integer $ref
 * @property integer $ward
 * @property string $title
 * @property string $name
 * @property string $lname
 * @property string $position
 * @property integer $hn
 * @property integer $part_time
 * @property integer $assist
 * @property integer $sup
 * @property integer $wardclerk
 */
class WorkloadStaff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ward', 'hn', 'part_time', 'assist', 'sup', 'wardclerk'], 'integer'],
            [['title'], 'string', 'max' => 10],
            [['name', 'lname', 'position'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => Yii::t('app', 'Ref'),
            'ward' => Yii::t('app', 'Ward'),
            'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'lname' => Yii::t('app', 'Lname'),
            'position' => Yii::t('app', 'Position'),
            'hn' => Yii::t('app', 'Hn'),
            'part_time' => Yii::t('app', 'Part Time'),
            'assist' => Yii::t('app', 'Assist'),
            'sup' => Yii::t('app', 'Sup'),
            'wardclerk' => Yii::t('app', 'Wardclerk'),
        ];
    }
}
