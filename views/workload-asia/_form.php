<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadAsia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-asia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
    
    <div class="row">
        <div class="col-md-1">C5</div>
        <div class="col-md-1"><?= $form->field($model, 'c5_r')->textInput()->label("R") ?></div>
        <div class="col-md-1"><?= $form->field($model, 'c5_l')->textInput()->label("L") ?></div>
        <div class="col-md-4">Elbow</div>
    </div>
    <?= $form->field($model, 'c5_r')->textInput() ?>

    <?= $form->field($model, 'c5_l')->textInput() ?>

    <?= $form->field($model, 'c6_r')->textInput() ?>

    <?= $form->field($model, 'c6_l')->textInput() ?>

    <?= $form->field($model, 'c7_r')->textInput() ?>

    <?= $form->field($model, 'c7_l')->textInput() ?>

    <?= $form->field($model, 'c8_r')->textInput() ?>

    <?= $form->field($model, 'c8_l')->textInput() ?>

    <?= $form->field($model, 't1_r')->textInput() ?>

    <?= $form->field($model, 't1_l')->textInput() ?>

    <?= $form->field($model, 'upper_total_r')->textInput() ?>

    <?= $form->field($model, 'upper_total_l')->textInput() ?>

    <?= $form->field($model, 'upper_total')->textInput() ?>

    <?= $form->field($model, 'l2_r')->textInput() ?>

    <?= $form->field($model, 'l2_l')->textInput() ?>

    <?= $form->field($model, 'l3_r')->textInput() ?>

    <?= $form->field($model, 'l3_l')->textInput() ?>

    <?= $form->field($model, 'l4_r')->textInput() ?>

    <?= $form->field($model, 'l4_l')->textInput() ?>

    <?= $form->field($model, 'l5_r')->textInput() ?>

    <?= $form->field($model, 'l5_l')->textInput() ?>

    <?= $form->field($model, 's1_r')->textInput() ?>

    <?= $form->field($model, 's1_l')->textInput() ?>

    <?= $form->field($model, 'lower_total_r')->textInput() ?>

    <?= $form->field($model, 'lower_total_l')->textInput() ?>

    <?= $form->field($model, 'lower_total')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'ward')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
