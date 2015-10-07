<?php

namespace app\models;

use Yii;
use app\models\NurseStaff;
/**
 * This is the model class for table "nurse_staffevent".
 *
 * @property integer $staffevent_ref
 * @property integer $event_ref
 * @property integer $staff_ref
 * @property integer $wardclerk
 * @property integer $aid
 * @property integer $worker
 * @property integer $teamlead
 * @property integer $incharge
 * @property string $team
 * @property integer $inp_id
 * @property string $lastupdate
 */
class NurseStaffevent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'nurse_staffevent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_ref', 'staff_ref', 'wardclerk', 'aid', 'worker', 'teamlead', 'incharge', 'inp_id'], 'integer'],
            [['lastupdate'], 'safe'],
            [['team'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staffevent_ref' => Yii::t('app', 'Staffevent Ref'),
            'event_ref' => Yii::t('app', 'Event Ref'),
            'staff_ref' => Yii::t('app', ''),
            'wardclerk' => Yii::t('app', 'Wardclerk'),
            'aid' => Yii::t('app', 'Aid'),
            'worker' => Yii::t('app', 'Worker'),
            'teamlead' => Yii::t('app', 'Teamlead'),
            'incharge' => Yii::t('app', 'Incharge'),
            'team' => Yii::t('app', 'Team'),
            'inp_id' => Yii::t('app', 'Inp ID'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }

    /**
     * @inheritdoc
     * @return NurseStaffeventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NurseStaffeventQuery(get_called_class());
    }
    
    public  function getStaff(){
        return @$this->hasOne(NurseStaff::className(), ['staff_ref' => 'staff_ref']);
    }
    // virtual attribute hospitalName
    public function getStaffFullname(){
        return @$this->staff->title.@$this->staff->name." ".@$this->staff->surname;
    }
    
    public function getStaffPosition(){
        return @$this->staff->positionName;
    }
}
