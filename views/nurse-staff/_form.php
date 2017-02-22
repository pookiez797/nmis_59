<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url; //include for Url
use app\models\LibPosition;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-staff-form">
    <?php
    $this->registerJs("$('#nursestaff-no').on('change',function(){
                var no = $('#nursestaff-no').val();
            $.ajax({
                url: '" . Url::toRoute("nurse-staff/stafflist") . "',
                dataType: 'json',
                method: 'GET',
                data: {'no': no},
                success: function (data) {
                console.log(data.title);
                console.log(data.name);
                    $('#nursestaff-title').val(data.title);
                    $('#nursestaff-name').val(data.name);
                    $('#nursestaff-surname').val(data.surname);
                    $('#nursestaff-code').val(data.code);
                }
            });
            return false;
        });");
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <?= $form->field($model, 'code')->hiddenInput()->label(false) ?>

        <div class="col-md-2">
            <?= $form->field($model, 'no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'priority')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'position')->dropDownList(ArrayHelper::map(LibPosition::find()->all(), 'ref', 'name')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"><?= $form->field($model, 'hn')->checkbox() ?></div>
        <div class="col-md-1"><?= $form->field($model, 'part_time')->checkbox() ?></div>
        <div class="col-md-1"><?= $form->field($model, 'assist')->checkbox() ?></div>
        <div class="col-md-1"><?= $form->field($model, 'sup')->checkbox() ?></div>
        <div class="col-md-1"> <?= $form->field($model, 'wardclerk')->checkbox() ?></div>
    </div>


</div>





<?= $form->field($model, 'ward')->hiddenInput(['value' => Yii::$app->user->identity->ward])->label(false) ?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
