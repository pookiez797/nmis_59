<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ipd_ipd".
 *
 * @property string $hn
 * @property string $an
 * @property string $vn
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $admit
 * @property string $admite
 * @property string $time
 * @property string $disc
 * @property string $timedisc
 * @property integer $los
 * @property integer $pday
 * @property integer $dep
 * @property integer $dr
 * @property integer $dr_disc
 * @property integer $staff
 * @property integer $ward
 * @property string $dx1
 * @property string $dx2
 * @property string $dx3
 * @property string $causedead
 * @property string $refer
 * @property string $move
 * @property string $fu
 * @property integer $fu_dep
 * @property string $stat_dsc
 * @property string $inp_id
 * @property string $edit_id
 * @property string $dateinp
 * @property string $chartward
 * @property string $chartaud
 * @property integer $typeadmit
 * @property integer $dead
 * @property string $sentdrg
 * @property string $drg
 * @property double $rw
 * @property double $adjrw
 * @property double $rw_dr
 * @property double $rw_coder
 * @property double $rw_audit
 * @property double $isaudit
 * @property string $mdc
 * @property string $dc
 * @property string $rep505
 * @property integer $clinic
 * @property string $scaned
 * @property string $room
 * @property integer $visitstat
 * @property double $admwt
 * @property string $lastupdate
 */
class IpdIpd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    
    
    public static function tableName()
    {
        return 'ipd_ipd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hn', 'an'], 'required'],
            [['admite', 'disc', 'fu', 'dateinp', 'chartward', 'chartaud', 'sentdrg', 'rep505', 'scaned', 'lastupdate'], 'safe'],
            [['los', 'pday', 'dep', 'dr', 'dr_disc', 'staff', 'ward', 'fu_dep', 'typeadmit', 'dead', 'clinic', 'visitstat'], 'integer'],
            [['rw', 'adjrw', 'rw_dr', 'rw_coder', 'rw_audit', 'isaudit', 'admwt'], 'number'],
            [['hn', 'vn', 'admit', 'time', 'timedisc'], 'string', 'max' => 8],
            [['an', 'dx1', 'dx2'], 'string', 'max' => 7],
            [['title'], 'string', 'max' => 10],
            [['name', 'refer'], 'string', 'max' => 15],
            [['surname'], 'string', 'max' => 20],
            [['dx3'], 'string', 'max' => 40],
            [['causedead'], 'string', 'max' => 6],
            [['move'], 'string', 'max' => 11],
            [['stat_dsc'], 'string', 'max' => 2],
            [['inp_id', 'edit_id', 'drg'], 'string', 'max' => 5],
            [['mdc', 'dc', 'room'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hn' => Yii::t('app', 'Hospital No'),
            'an' => Yii::t('app', 'Admission No.'),
            'vn' => Yii::t('app', 'Visit No. (Uniq)'),
            'title' => Yii::t('app', 'คำนำหน้าชื่อ'),
            'name' => Yii::t('app', 'ชื่อ'),
            'surname' => Yii::t('app', 'นามสกุล'),
            'admit' => Yii::t('app', 'วันที่ Admit(th)'),
            'admite' => Yii::t('app', 'วันที่ Admit(En)'),
            'time' => Yii::t('app', 'เวลาที่ Admit'),
            'disc' => Yii::t('app', 'เสร็จสิ้นการรักษาวันที่'),
            'timedisc' => Yii::t('app', 'เสร็จสิ้นการรักษาเวลา'),
            'los' => Yii::t('app', 'Disc-Admite (วันเดียวกันนับ 1)'),
            'pday' => Yii::t('app', 'Pday'),
            'dep' => Yii::t('app', 'ห้องตรวจที่ admit - lib_clinic'),
            'dr' => Yii::t('app', 'แพทย์ที่สั่ง admit - lib_dr'),
            'dr_disc' => Yii::t('app', 'แพทย์ที่จำหน่าย - lib_dr'),
            'staff' => Yii::t('app', 'แพทย์ staff ที่จำหน่าย - lib_dr'),
            'ward' => Yii::t('app', 'ward สุดท้ายอยู่รักษา - lib_ward'),
            'dx1' => Yii::t('app', 'โรคที่ admit - ยกเลิกไม่ใช้'),
            'dx2' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'dx3' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'causedead' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'refer' => Yii::t('app', 'รับ Refer - ยกเลิกไม่ใช้'),
            'move' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'fu' => Yii::t('app', 'วันนัดหลังจำหน่าย'),
            'fu_dep' => Yii::t('app', 'ห้องตรวจที่นัดมาหลังจำหน่าย - lib_clinic'),
            'stat_dsc' => Yii::t('app', 'สถานภาพหลังจำหน่าย'),
            'inp_id' => Yii::t('app', 'ผู้บันทึกการ admit'),
            'edit_id' => Yii::t('app', 'ผู้แก้ไขคนสุดท้าย'),
            'dateinp' => Yii::t('app', 'วันที่บันทึก'),
            'chartward' => Yii::t('app', 'วันที่ส่ง chart จาก ward'),
            'chartaud' => Yii::t('app', 'วันที่ audit'),
            'typeadmit' => Yii::t('app', '1-ทั่วไป 2-แม่ 3-ลูก'),
            'dead' => Yii::t('app', '1-Dead'),
            'sentdrg' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'drg' => Yii::t('app', 'DRG Group'),
            'rw' => Yii::t('app', 'DRG - RW'),
            'adjrw' => Yii::t('app', 'DRG - AdjRW'),
            'rw_dr' => Yii::t('app', 'AdjRW ของแพทย์'),
            'rw_coder' => Yii::t('app', 'AdjRW ของ Coder'),
            'rw_audit' => Yii::t('app', 'AdjRW ของ Auditor'),
            'isaudit' => Yii::t('app', '??'),
            'mdc' => Yii::t('app', 'DRG - MDC'),
            'dc' => Yii::t('app', 'DRG-DC'),
            'rep505' => Yii::t('app', 'ยกเลิกไม่ใช้'),
            'clinic' => Yii::t('app', 'แผนกโรค - lib_dxclinic'),
            'scaned' => Yii::t('app', 'วันที scan chart'),
            'room' => Yii::t('app', 'เตียง/ห้อง'),
            'visitstat' => Yii::t('app', '?? '),
            'admwt' => Yii::t('app', 'น้ำหนัก'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
        ];
    }
}
