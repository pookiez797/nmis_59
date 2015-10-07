<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaffeventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-staffevent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'staffevent_ref') ?>

    <?= $form->field($model, 'event_ref') ?>

    <?= $form->field($model, 'staff_ref') ?>

    <?= $form->field($model, 'wardclerk') ?>

    <?= $form->field($model, 'aid') ?>

    <?php // echo $form->field($model, 'worker') ?>

    <?php // echo $form->field($model, 'teamlead') ?>

    <?php // echo $form->field($model, 'incharge') ?>

    <?php // echo $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'inp_id') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
