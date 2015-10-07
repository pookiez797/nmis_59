<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaffevent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-staffevent-form">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['class' => 'col-md-1'],
            ],
            [
                'label' => 'ชื่อ-สกุล',
                'options' => ['class' => 'col-md-3'],
                'attribute' => 'staffFullname',
                'value' => function($model) {
            return $model->staffFullname;
        }
            ],
            [
                'label' => 'ตำแหน่ง',
                'options' => ['class' => 'col-md-3'],
                'attribute' => 'staffPosition',
                'value' => function($model) {
            return $model->staffPosition;
        }
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'teamlead',
                'format' => 'html',
                'options' => ['class' => 'col-md-1'],
                'value' => function($model, $key, $index, $column) {
            return $model->teamlead == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "";
        }
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'incharge',
                'format' => 'html',
                'options' => ['class' => 'col-md-1'],
                'value' => function($model, $key, $index, $column) {
            return $model->incharge == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "";
        }
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'wardclerk',
                'format' => 'html',
                'options' => ['class' => 'col-md-1'],
                'value' => function($model, $key, $index, $column) {
            return $model->wardclerk == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "";
        }
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'aid',
                'format' => 'html',
                'options' => ['class' => 'col-md-1'],
                'value' => function($model, $key, $index, $column) {
            return $model->aid == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "";
        }
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'worker',
                'format' => 'html',
                'options' => ['class' => 'col-md-1'],
                'value' => function($model, $key, $index, $column) {
            return $model->worker == 1 ? "<i class=\"glyphicon glyphicon-ok\"></i>" : "";
        }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'col-md-1'],
                'header' => 'ลบ',
                'template' => '{delete}'
            ]
        ],
    ]);
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <table class="table-condensed table-bordered " width="100%">
        <thead>
        <th>#</th><th>ลำดับที่</th><th>ชื่อ-สกุล</th><th>ตำแหน่ง</th><th></th><th></th><th></th><th></th><th></th>
        </thead>
        <?php
        $i = 0;
        foreach ($staff as $s) {
            $i++;
            ?>
            <tr>
                <td><?= $form->field($model, "[$s->staff_ref]staff_ref")->checkbox(['value' => $s->staff_ref]) ?></td>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $s->title . $s->name . " " . $s->surname ?>
                </td>
                <td>
                    <?= $s->positionName ?>
                </td>
                <td><?= $form->field($model, "[$s->staff_ref]teamlead")->checkbox() ?></td>
                <td><?= $form->field($model, "[$s->staff_ref]incharge")->checkbox() ?></td>
                <td><?= $form->field($model, "[$s->staff_ref]wardclerk")->checkbox() ?></td>
                <td><?= $form->field($model, "[$s->staff_ref]aid")->checkbox() ?></td>
                <td><?= $form->field($model, "[$s->staff_ref]worker")->checkbox() ?></td>
                <?= $form->field($model, "[$s->staff_ref]event_ref")->hiddenInput(['value' => $event->ref])->label(false) ?>
            </tr>

            <?php
        }
        //echo $form->field($model, "[$v->hn]hn")->hiddenInput(['value' => $v->hn])->label(false);
        ?>
    </table>
    <br/>
    <br/>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
