<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NursePatient */

$this->title = Yii::t('app', 'เพิ่มข้อมูลผู้ป่วย');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายการกิจกรรม'), 'url' => ['nurse-event/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-create">
    <?php //  Html::encode($this->title) 
    echo  $check_prev;
    echo $event_prevp;
    echo $event_prevd;
    ?>
    
    <?=
    $this->render('_form', [
        'model' => $model,
        'patient' => $patient,
        'prev_data' => $prev_data,
        'event' => $event,
        'patient_no' => $patient_no,
        'check_prev' => $check_prev,
        'event_prevp' =>$event_prevp,
        'event_prevd' => $event_prevd,
        'diag' => $diag,
        'diag_an' => $diag_an,
    ])
    ?>

</div>
