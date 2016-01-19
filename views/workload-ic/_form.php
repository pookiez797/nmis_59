<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LibDisease;
use yii\helpers\ArrayHelper;
use app\models\Ward;
use kartik\date\DatePicker;
use app\models\LibIcposition;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadIc */
/* @var $form yii\widgets\ActiveForm */

$lib_disease = ArrayHelper::map(LibDisease::find()->all(), 'ref', 'disease');
$lib_ward = ArrayHelper::map(Ward::find()->all(), 'code', 'ward');
$lib_icposition = ArrayHelper::map(LibIcposition::find()->all(), 'ref', 'name');
?>
<!--<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">IC</a></li>
  <li role="presentation"><a href="#">GCS</a></li>
  <li role="presentation"><a href="#">Key Muscle</a></li>
</ul>-->
<div class="workload-ic-form">
     <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'ตำแหน่ง',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'positionName',
            ],
            [
                'label' => 'เชื้อสาเหตุ',
                'options' => ['class' => 'col-sm-4'],
                'attribute' => 'diseaseName',
            ],
            [
                'label' => 'รายละเอียด',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'type',
            ],
            [
                'label' => 'หน่วยงาน',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'officeName',
            ],
            [
                'label' => 'วันที่เกิด',
                'options' => ['class' => 'col-sm-2'],
                'attribute' => 'infect_date',
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
            <h3 class="panel-title">เพิ่มข้อมูลการเฝ้าระวัง</h3>
        </div>
        <div class="panel-body">


<?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6 col-xs-6"><?= $form->field($model, 'position')->dropDownList($lib_icposition) ?></div>
                <div class="col-md-6 col-xs-6"><?php //  $form->field($model, 'factor')->textInput() ?></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6"><?= $form->field($model, 'disease')->dropDownList($lib_disease) ?></div>
                <div class="col-md-6 col-xs-6"><?= $form->field($model, 'type')->dropDownList(['NI' => 'NI', 'CI' => 'CI']) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <?php
                    echo $form->field($model, 'infect_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'เลือกวันที่'],
                        'language' => 'th',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>
                <div class="col-md-6 col-xs-6"><?= $form->field($model, 'infect_ward')->dropDownList($lib_ward) ?></div>
                
            </div>
            <?= $form->field($model, 'hn')->hiddenInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'an')->hiddenInput(['maxlength' => true])->label(false) ?>
            

            <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'เพิ่มข้อมูล') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

<?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
