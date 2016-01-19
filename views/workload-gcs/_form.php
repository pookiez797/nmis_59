<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadGcs */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="workload-gcs-form">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'รายการ',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'gcsName',
            ],
            [
                'label' => 'E',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'e_type',
            ],
            [
                'label' => 'V',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'v_type',
            ],
            [
                'label' => 'M',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'm_type',
            ],
            [
                'label' => 'Score',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'score',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'col-sm-1'],
                'header' => 'ลบ',
                'template' => '{delete}'
            ],
        ],
    ]);
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">เพิ่มข้อมูล GCS</h3>
        </div>
        <div class="panel-body">

<?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-4 col-sm-4">
<?= $form->field($model, 'gcs_type')->dropDownList($model->getGCS()) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
<?= $form->field($model, 'e_type')->dropDownList([0, 1, 2, 3, 4]) ?>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
<?= $form->field($model, 'v_type')->dropDownList([0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 'T' => 'T']) ?>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
<?= $form->field($model, 'm_type')->dropDownList([0, 1, 2, 3, 4, 5, 6]) ?>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
<?= $form->field($model, 'score')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
                </div>
            </div>




<?php
$myscript = "$(function() {
                
                var total = 0;
                $('#workloadgcs-score').val(total);
                $('#workloadgcs-e_type').change(function() {
                    var e = $('#workloadgcs-e_type').val();
                    var v = $('#workloadgcs-v_type').val();
                    var m = $('#workloadgcs-m_type').val();
                    if(v!='T'){
                        total = Number(e)+Number(v)+Number(m);
                    }else{
                        total = Number(e)+Number(m)+'T';
                    }
                    $('#workloadgcs-score').val(total);
                });
                
                $('#workloadgcs-v_type').change(function() {
                    var e = $('#workloadgcs-e_type').val();
                    var v = $('#workloadgcs-v_type').val();
                    var m = $('#workloadgcs-m_type').val();
                    if(v!='T'){
                        total = Number(e)+Number(v)+Number(m);
                    }else{
                        total = Number(e)+Number(m)+'T';
                    }
                    $('#workloadgcs-score').val(total);
                });
                
                $('#workloadgcs-m_type').change(function() {
                    var e = $('#workloadgcs-e_type').val();
                    var v = $('#workloadgcs-v_type').val();
                    var m = $('#workloadgcs-m_type').val();
                    if(v!='T'){
                        total = Number(e)+Number(v)+Number(m);
                    }else{
                        total = Number(e)+Number(m)+'T';
                    }
                    $('#workloadgcs-score').val(total);
                });

        });
        
        ";
$this->registerJs($myscript);
?>
            <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'เพิ่มข้อมูล') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

                <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
