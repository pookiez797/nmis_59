<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NurseEventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ref') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'period') ?>

    <?= $form->field($model, 'ward_group') ?>

    <?= $form->field($model, 'ward') ?>

    <?php // echo $form->field($model, 'inp_id') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
