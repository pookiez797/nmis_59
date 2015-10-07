<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDiag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-diag-form">

    <?php $form = ActiveForm::begin(); ?>

    <div row>
        <?= $form->field($model, 'diag')->textarea(['rows' => 6]) ?>
    </div>
    <?php //  $form->field($model, 'an')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'diag')->textarea(['rows' => 6]) ?>

    <?php //  $form->field($model, 'last_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
