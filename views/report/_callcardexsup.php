<?php

use Yii as yiix;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Report;
use app\models\LibWard;
use kartik\date\DatePicker;
?>

<script>
    function checkAll(ele) {
     var checkboxes = document.getElementsByName('Report[ward][]');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>

<?php
$libward = ArrayHelper::map(LibWard::find()->all(), 'code', 'name');
$this->title = Yii::t('app', 'รายงานข้อมูล Cardex');
$current_year = date('Y');
$current_month = date('m');
//echo '<pre>';
//var_dump($years);
//echo '</pre>';
?>
<div class="cardex-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">ข้อมูล Cardex ประจำวัน </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                    <?php
                    echo $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'เลือกวันที่'],
                        'language' => 'th',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>

                <div class="col-lg-3">
                   <?= $form->field($model, 'period')->dropDownList([1 => 'ดึก', 2 => 'เช้า', 3 => 'บ่าย']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    
                    <?= $form->field($model, 'ward')->checkboxList($libward) ?>
                    <input type="checkbox" onchange="checkAll(this)" name="chk[]"> <b>เลือกทั้งหมด</b></input>
                </div>
            </div>

            <br/>
            <br/>
            <div class="form-group">
                <?= Html::submitButton('ดูรายงาน', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>