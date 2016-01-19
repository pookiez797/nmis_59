<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOp */
/* @var $form yii\widgets\ActiveForm */
?>


<script type="text/javascript">

    function disablefield() {
        var e = document.getElementById("workloadop-operate");
        var op = e.options[e.selectedIndex].value;
        if (op == 1) {
            document.getElementById('workloadop-op_date').disabled = 'disabled';
            document.getElementById('workloadop-wound_type').disabled = 'disabled';
            document.getElementById('workloadop-prepare_type').disabled = '';
        } else {
            document.getElementById('workloadop-wound_type').disabled = '';
            document.getElementById('workloadop-op_date').disabled = '';
            document.getElementById('workloadop-prepare_type').disabled = 'disabled';
        }
    }
</script> 

<div class="workload-op-form">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'รายการ',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'procedureName',
            ],
            [
                'label' => 'ประเภทการเตรียม',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'prepareName',
            ],
            [
                'label' => 'ชนิดการผ่าตัด',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'op_type',
            ],
            [
                'label' => 'วันที่',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'op_date',
            ],
            [
                'label' => 'ประเภทแผล',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'woundName',
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
            <h3 class="panel-title">เพิ่มข้อมูลการผ่าตัด</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'operate')->dropDownList($model->getProcedure(), ['onChange' => 'disablefield()']) ?>
                </div>
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'prepare_type')->dropDownList($model->getPrepare()) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <?= $form->field($model, 'op_type')->textarea(['rows' => 2]) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <?php
                    echo $form->field($model, 'op_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'เลือกวันที่', 'disabled' => 'disabled'],
                        'language' => 'th',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'wound_type')->dropDownList($model->getWound(), ['disabled' => 'disabled']) ?>
                </div>
            </div>

            <?= $form->field($model, 'ward')->hiddenInput(['value' => Yii::$app->user->identity->ward])->label(FALSE) ?>

            <?= $form->field($model, 'period')->hiddenInput(['maxlength' => true])->label(FALSE) ?>



            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'เพิ่มข้อมูล') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
