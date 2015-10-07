<?php

use Yii as yiix;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\NurseEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-event-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-md-6">
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
    <div class="col-md-6"><?= $form->field($model, 'period')->dropDownList([1 => 'ดึก', 2 => 'เช้า', 3 => 'บ่าย']) ?></div>

   <?= $form->field($model, 'ward')->hiddenInput(['value' => Yii::$app->user->identity->ward])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
