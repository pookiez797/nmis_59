<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "nurse_patient".
 *
 * @property integer $pt_ref
 * @property integer $event_ref
 * @property string $hn
 * @property string $an
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $bed_type
 * @property integer $bed_no
 * @property string $pt_type
 * @property string $dx1
 * @property string $admit_type
 * @property string $disc_type
 * @property string $disability
 * @property string $operate
 * @property string $prepare
 * @property integer $cpr
 * @property string $uti
 * @property string $vap
 * @property string $phleb
 * @property string $cutdown
 * @property integer $doctor
 * @property integer $inp_id
 * @property string $lastupdate
 */
class NursePatient extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'nurse_patient';
    }

    /**
     * @inheritdoc
     */
    const ITEM_ON = 1;
    const ITEM_OFF = 0;
    const TUBE_X = 0;
    const TUBE_B = 1;
    const TUBE_V = 2;
    const TUBE_T = 3;

    public function rules() {
        return [
            [['event_ref', 'bed_no', 'cpr', 'doctor', 'inp_id','admit_type', 'disc_type', 'disability', 'operate', 'prepare', 'uti', 'vap', 'phleb', 'cutdown','lastupdate','hn','an','title','name','surname','bed_type','pt_type','dx1'],'safe'],
//            [['lastupdate'], 'safe'],
//            [['hn'], 'string', 'max' => 8],
//            [['an'], 'string', 'max' => 7],
//            [['title', 'bed_type'], 'string', 'max' => 10],
//            [['name', 'surname'], 'string', 'max' => 100],
//            [['pt_type'], 'string', 'max' => 2],
//            [['dx1'], 'string', 'max' => 50],
//            [['admit_type', 'disc_type', 'disability', 'operate', 'prepare', 'uti', 'vap', 'phleb', 'cutdown'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'pt_ref' => Yii::t('app', 'Pt Ref'),
            'event_ref' => Yii::t('app', 'Event Ref'),
            'hn' => Yii::t('app', 'Hn'),
            'an' => Yii::t('app', 'An'),
            'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'bed_type' => Yii::t('app', 'Bed Type'),
            'bed_no' => Yii::t('app', 'Bed No'),
            'pt_type' => Yii::t('app', 'Pt Type'),
            'dx1' => Yii::t('app', 'Dx1'),
            'admit_type' => Yii::t('app', 'Admit Type'),
            'disc_type' => Yii::t('app', 'Disc Type'),
            'disability' => Yii::t('app', ''),
            'operate' => Yii::t('app', ''),
            'prepare' => Yii::t('app', ''),
            'cpr' => Yii::t('app', ''),
            'uti' => Yii::t('app', ''),
            'vap' => Yii::t('app', ''),
            'phleb' => Yii::t('app', ''),
            'cutdown' => Yii::t('app', ''),
            'doctor' => Yii::t('app', 'Doctor'),
            'inp_id' => Yii::t('app', 'Inp ID'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }
    
    public static function itemAlias($type) {
        $items = [
            'item' => [
                self::ITEM_OFF => 'X =OFF',
                self::ITEM_ON => 'O =ON'
            ],
            'tube' => [
                self::TUBE_X => 'X =OFF',
                self::TUBE_B => 'B =On Bird',
                self::TUBE_V => 'V =On Ventilator',
                self::TUBE_T => 'T =T-piece'
            ]
        ];
        return array_key_exists($type, $items) ? $items[$type] : [];
        //
    }
    
     public function getItem() {
        return self::itemAlias('item');
    }
     public function getTube() {
        return self::itemAlias('tube');
    }
    
     public static function find()
    {
        return new NursePatientQuery(get_called_class());
    }

}
