<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-op-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'operate') ?>

    <?= $form->field($model, 'op_type') ?>

    <?= $form->field($model, 'op_date') ?>

    <?php // echo $form->field($model, 'wound_type') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'period') ?>

    <?php // echo $form->field($model, 'prepare_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
