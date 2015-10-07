<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NursePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_ref')->textInput() ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bed_type')->textInput() ?>

    <?= $form->field($model, 'bed_no')->textInput() ?>

    <?= $form->field($model, 'pt_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dx1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admit_type')->textInput() ?>

    <?= $form->field($model, 'disc_type')->textInput() ?>

    <?= $form->field($model, 'disability')->textInput() ?>

    <?= $form->field($model, 'operate')->textInput() ?>

    <?= $form->field($model, 'prepare')->textInput() ?>

    <?= $form->field($model, 'cpr')->textInput() ?>

    <?= $form->field($model, 'uti')->textInput() ?>

    <?= $form->field($model, 'vap')->textInput() ?>

    <?= $form->field($model, 'phleb')->textInput() ?>

    <?= $form->field($model, 'cutdown')->textInput() ?>

    <?= $form->field($model, 'docter')->textInput() ?>

    <?= $form->field($model, 'inp_id')->textInput() ?>

    <?= $form->field($model, 'lastupdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
