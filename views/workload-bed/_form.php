<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use app\models\LibBedtype;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadBed */
/* @var $form yii\widgets\ActiveForm */
$lib_bedtype = ArrayHelper::map(LibBedtype::find()->all(), 'code', 'name');

?>

<div class="workload-bed-form">

  <?=
  GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'bed_type',
          'bed_no',
          [
              'class' => 'yii\grid\ActionColumn',
              'options' => ['class' => 'col-sm-1'],
              'header' => 'ลบ',
              'template' => '{delete}'
          ],
          // ['class' => 'yii\grid\ActionColumn'],
      ],
  ]);
  ?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6 col-xs-6"><?= $form->field($model, 'bed_type')->dropDownList($lib_bedtype) ?></div>
      <div class="col-md-6 col-xs-6"><?= $form->field($model, 'bed_no')->textInput() ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'เพิ่ม') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
