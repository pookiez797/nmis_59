<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadGcsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-gcs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'gcs_type') ?>

    <?= $form->field($model, 'e_type') ?>

    <?php // echo $form->field($model, 'v_type') ?>

    <?php // echo $form->field($model, 'm_type') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
