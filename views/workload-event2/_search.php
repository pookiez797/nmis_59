<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-event2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'event_date') ?>

    <?= $form->field($model, 'event_period') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'an') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'bed_type') ?>

    <?php // echo $form->field($model, 'bed_no') ?>

    <?php // echo $form->field($model, 'pt_type') ?>

    <?php // echo $form->field($model, 'admit_type') ?>

    <?php // echo $form->field($model, 'disc_type') ?>

    <?php // echo $form->field($model, 'disability') ?>

    <?php // echo $form->field($model, 'operate') ?>

    <?php // echo $form->field($model, 'prepare') ?>

    <?php // echo $form->field($model, 'cpr') ?>

    <?php // echo $form->field($model, 'uti') ?>

    <?php // echo $form->field($model, 'vap') ?>

    <?php // echo $form->field($model, 'phleb') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'cutdown') ?>

    <?php // echo $form->field($model, 'doctor_ref') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
