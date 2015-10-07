<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $code
 * @property string $no
 * @property string $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $nicname
 * @property string $type
 * @property string $person_id
 * @property string $position_n
 * @property string $pos_type
 * @property string $bank_id
 * @property string $bank_id2
 * @property string $license_no
 * @property string $position
 * @property string $level
 * @property string $officecode
 * @property string $office
 * @property string $dep
 * @property string $department
 * @property string $unit
 * @property string $tax_no
 * @property string $tel
 * @property string $tel_home
 * @property string $tel_mobile
 * @property string $expire
 * @property integer $gpf
 * @property double $gpf_rate
 * @property integer $pfund
 * @property integer $soc
 * @property integer $assur_dd
 * @property integer $assur_no
 * @property string $id2
 * @property string $passwd
 * @property string $password
 * @property string $conf
 * @property double $ot_rate
 * @property double $extra_rate
 * @property string $email
 * @property string $hn
 * @property integer $trustweb
 * @property string $remark
 * @property string $lastupdate
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'gpf', 'pfund', 'soc', 'assur_dd', 'assur_no', 'trustweb'], 'integer'],
            [['type', 'email', 'remark'], 'string'],
            [['license_no'], 'required'],
            [['expire', 'conf', 'lastupdate'], 'safe'],
            [['gpf_rate', 'ot_rate', 'extra_rate'], 'number'],
            [['no', 'pos_type'], 'string', 'max' => 5],
            [['id', 'bank_id', 'bank_id2', 'tel'], 'string', 'max' => 15],
            [['title'], 'string', 'max' => 4],
            [['name', 'surname'], 'string', 'max' => 35],
            [['nicname', 'dep', 'tax_no', 'tel_home', 'tel_mobile'], 'string', 'max' => 20],
            [['person_id'], 'string', 'max' => 13],
            [['position_n', 'department', 'id2', 'hn'], 'string', 'max' => 10],
            [['license_no'], 'string', 'max' => 30],
            [['position'], 'string', 'max' => 50],
            [['level'], 'string', 'max' => 25],
            [['officecode', 'unit'], 'string', 'max' => 8],
            [['office'], 'string', 'max' => 3],
            [['passwd'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'no' => Yii::t('app', 'No'),
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'nicname' => Yii::t('app', 'Nicname'),
            'type' => Yii::t('app', 'Type'),
            'person_id' => Yii::t('app', 'Person ID'),
            'position_n' => Yii::t('app', 'Position N'),
            'pos_type' => Yii::t('app', 'Pos Type'),
            'bank_id' => Yii::t('app', 'Bank ID'),
            'bank_id2' => Yii::t('app', 'Bank Id2'),
            'license_no' => Yii::t('app', 'License No'),
            'position' => Yii::t('app', 'Position'),
            'level' => Yii::t('app', 'Level'),
            'officecode' => Yii::t('app', 'Officecode'),
            'office' => Yii::t('app', 'Office'),
            'dep' => Yii::t('app', 'Dep'),
            'department' => Yii::t('app', 'Department'),
            'unit' => Yii::t('app', 'Unit'),
            'tax_no' => Yii::t('app', 'Tax No'),
            'tel' => Yii::t('app', 'Tel'),
            'tel_home' => Yii::t('app', 'Tel Home'),
            'tel_mobile' => Yii::t('app', 'Tel Mobile'),
            'expire' => Yii::t('app', 'Expire'),
            'gpf' => Yii::t('app', 'Gpf'),
            'gpf_rate' => Yii::t('app', 'Gpf Rate'),
            'pfund' => Yii::t('app', 'Pfund'),
            'soc' => Yii::t('app', 'Soc'),
            'assur_dd' => Yii::t('app', 'Assur Dd'),
            'assur_no' => Yii::t('app', 'Assur No'),
            'id2' => Yii::t('app', 'Id2'),
            'passwd' => Yii::t('app', 'Passwd'),
            'password' => Yii::t('app', 'Password'),
            'conf' => Yii::t('app', 'Conf'),
            'ot_rate' => Yii::t('app', 'Ot Rate'),
            'extra_rate' => Yii::t('app', 'Extra Rate'),
            'email' => Yii::t('app', 'Email'),
            'hn' => Yii::t('app', 'Hn'),
            'trustweb' => Yii::t('app', 'Trustweb'),
            'remark' => Yii::t('app', 'Remark'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }
}
