<?php

use Yii as yiix;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use app\models\LibPosition;
use yii\helpers\ArrayHelper;
use app\models\LibOther;
use app\models\LibWard;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadOther */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="workload-other-form">

  <?=
  GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          [
              'label' => 'รายการ',
              'options' => ['class' => 'col-md-1'],
              'attribute' => 'OtherName',
          ],
          [
              'label' => 'หอผู้ป่วย',
              'options' => ['class' => 'col-md-1'],
              'attribute' => 'wardName',
          ],
          [
              'label' => 'รายงาน',
              'options' => ['class' => 'col-md-1'],
              'attribute' => 'ReporterName',
          ],
          [
              'label' => 'วันที่เริ่ม',
              'options' => ['class' => 'col-md-1'],
              'attribute' => 'start_date',
          ],
          [
              'label' => 'วันที่สิ้นสุด',
              'options' => ['class' => 'col-md-1'],
              'attribute' => 'end_date',
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


<?php $form = ActiveForm::begin(); ?>
  <div class="row">
    <div class="col-xs-6">
      <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(LibOther::find()->all(), 'ref', 'code')) ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <?php
        $model->ward = Yii::$app->user->identity->ward;
      ?>
      <?= $form->field($model, 'ward')->dropDownList(ArrayHelper::map(LibWard::find()->all(), 'code', 'name')) ?>
    </div>
    <div class="col-xs-6">
      <?php
        $model->reporter = Yii::$app->user->identity->ward;
      ?>
      <?= $form->field($model, 'reporter')->dropDownList(ArrayHelper::map(LibWard::find()->all(), 'code', 'name')) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <?php
      echo $form->field($model, 'start_date')->widget(DatePicker::classname(), [
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
    <div class="col-xs-6">
      <?php
      echo $form->field($model, 'end_date')->widget(DatePicker::classname(), [
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
  </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
