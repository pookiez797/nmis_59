<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Ward;

class Report extends Model {

    public $month;
    public $year;
    public $ward;
    public $date;
    public $period;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // username and password are both required
            [['month', 'year' ,'date' , 'period','ward'], 'required'],
        ];
    }

    public function getYears() {
        $starting_year = date('Y', strtotime('-5 year'));
        $ending_year = date('Y', strtotime('+5 year'));
        $current_year = date('Y');
        $years = [];
        for ($starting_year; $starting_year <= $ending_year; $starting_year++) {
            $years[$starting_year] = $starting_year + 543;
        }
        return $years;
    }
    
    public function getMonths(){
        $months   = [
            '01' => 'มกราคม',
            '02' => 'กุมภาพันธ์',
            '03' => 'มีนาคม',
            '04' => 'เมษายน',
            '05' => 'พฤษภาคม',
            '06' => 'มิถุนายน',
            '07' => 'กรกฎาคม',
            '08' => 'สิงหาคม',
            '09' => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        ];
        
        return $months;
    }
    
    public function attributeLabels()
    {
        return [
            'month' => Yii::t('app', 'เดือน'),
            'year' => Yii::t('app', 'ปี'),
            'ward' => Yii::t('app', 'หอผู้ป่วย'),
            'date' => Yii::t('app','วันที่'),
            'period' => Yii::t('app','เวร'),
            ];
    }
    
    public function getMonthName($month){
        $items = $this->getMonths();
        return array_key_exists($month, $items) ? $items[$month] :null;
    }

    public function getWard($ward){
        $item = Ward::find()->where('code = :ward',[':ward'=>$ward])->one();
        return $item->ward;
    }
    
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

