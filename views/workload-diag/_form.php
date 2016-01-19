<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDiag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workload-diag-form">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'an',
            [
                'label' => 'Diag',
                'options' => ['class' => 'col-md-5'],
                'attribute' => 'diag',
            ],
            [
                'label' => 'วันที่เพิ่มข้อมูล',
                'options' => ['class' => 'col-md-3'],
                'attribute' => 'last_update',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'col-md-1'],
                'header' => 'ลบ',
                'template' => '{delete}'
            ],
        ],
    ]);
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">เพิ่มข้อมูลการวินิจฉัยโรค</h3>
        </div>
        <div class="panel-body">
            <div row>
                <?= $form->field($model, 'diag')->textarea(['rows' => 2])->label(FALSE) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'บันทึก') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
