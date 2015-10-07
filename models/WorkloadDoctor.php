<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workload_doctor".
 *
 * @property integer $ref
 * @property string $ward
 * @property string $title
 * @property string $name
 * @property string $lname
 * @property string $doc_no
 */
class WorkloadDoctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workload_doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ward'], 'string', 'max' => 3],
            [['title'], 'string', 'max' => 10],
            [['name', 'lname', 'doc_no'], 'string', 'max' => 100]
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
            'title' => Yii::t('app', 'คำนำหน้า'),
            'name' => Yii::t('app', 'ชื่อ'),
            'lname' => Yii::t('app', 'สกุล'),
            'doc_no' => Yii::t('app', 'เลข ว. แพทย์'),
        ];
    }

    /**
     * @inheritdoc
     * @return WorkloadDoctorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkloadDoctorQuery(get_called_class());
    }
    
    public function getFullname(){
        @$fullname = $this->name.' = '.@$this->title.@$this->name.' '.@$this->lname;
        return @$fullname;
    }
}
