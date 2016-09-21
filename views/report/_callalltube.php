<?php

use Yii as yiix;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\Report;
?>

<?php
$this->title = Yii::t('app', 'ตารางเวร');
$current_year = date('Y');
$current_month = date('m');
//echo '<pre>';
//var_dump($years);
//echo '</pre>';
?>
<div class="cardex-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3>รายงานวันนอนรวมการให้สารน้ำทางหลอดเลือด</h3>
    <div class="row">
        <div class="col-lg-2">
            <?php $model->month = $current_month ?>
            <?= $form->field($model, 'month')->dropDownList($model->getMonths()) ?>
        </div>

        <div class="col-lg-2">
            <?php $model->year = $current_year ?>
            <?= $form->field($model, 'year')->dropDownList($model->getYears()) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('ดูรายงาน', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
