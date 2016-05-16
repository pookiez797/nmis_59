<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadAsiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-asia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'c5_r') ?>

    <?= $form->field($model, 'c5_l') ?>

    <?php // echo $form->field($model, 'c6_r') ?>

    <?php // echo $form->field($model, 'c6_l') ?>

    <?php // echo $form->field($model, 'c7_r') ?>

    <?php // echo $form->field($model, 'c7_l') ?>

    <?php // echo $form->field($model, 'c8_r') ?>

    <?php // echo $form->field($model, 'c8_l') ?>

    <?php // echo $form->field($model, 't1_r') ?>

    <?php // echo $form->field($model, 't1_l') ?>

    <?php // echo $form->field($model, 'upper_total_r') ?>

    <?php // echo $form->field($model, 'upper_total_l') ?>

    <?php // echo $form->field($model, 'upper_total') ?>

    <?php // echo $form->field($model, 'l2_r') ?>

    <?php // echo $form->field($model, 'l2_l') ?>

    <?php // echo $form->field($model, 'l3_r') ?>

    <?php // echo $form->field($model, 'l3_l') ?>

    <?php // echo $form->field($model, 'l4_r') ?>

    <?php // echo $form->field($model, 'l4_l') ?>

    <?php // echo $form->field($model, 'l5_r') ?>

    <?php // echo $form->field($model, 'l5_l') ?>

    <?php // echo $form->field($model, 's1_r') ?>

    <?php // echo $form->field($model, 's1_l') ?>

    <?php // echo $form->field($model, 'lower_total_r') ?>

    <?php // echo $form->field($model, 'lower_total_l') ?>

    <?php // echo $form->field($model, 'lower_total') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'ward') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
