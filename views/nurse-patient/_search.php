<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NursePatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pt_ref') ?>

    <?= $form->field($model, 'event_ref') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'bed_type') ?>

    <?php // echo $form->field($model, 'bed_no') ?>

    <?php // echo $form->field($model, 'pt_type') ?>

    <?php // echo $form->field($model, 'dx1') ?>

    <?php // echo $form->field($model, 'admit_type') ?>

    <?php // echo $form->field($model, 'disc_type') ?>

    <?php // echo $form->field($model, 'disability') ?>

    <?php // echo $form->field($model, 'operate') ?>

    <?php // echo $form->field($model, 'prepare') ?>

    <?php // echo $form->field($model, 'cpr') ?>

    <?php // echo $form->field($model, 'uti') ?>

    <?php // echo $form->field($model, 'vap') ?>

    <?php // echo $form->field($model, 'phleb') ?>

    <?php // echo $form->field($model, 'cutdown') ?>

    <?php // echo $form->field($model, 'docter') ?>

    <?php // echo $form->field($model, 'inp_id') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
