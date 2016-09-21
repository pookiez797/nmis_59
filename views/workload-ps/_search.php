<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadPsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-ps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'ps_grade') ?>

    <?= $form->field($model, 'ps_size') ?>

    <?= $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'reporter') ?>

    <?php // echo $form->field($model, 'period') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
