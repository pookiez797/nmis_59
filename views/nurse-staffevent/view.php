<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaffevent */

$this->title = $model->staffevent_ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Staffevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-staffevent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->staffevent_ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->staffevent_ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'staffevent_ref',
            'event_ref',
            'staff_ref',
            'wardclerk',
            'aid',
            'worker',
            'teamlead',
            'incharge',
            'team',
            'inp_id',
            'lastupdate',
        ],
    ]) ?>

</div>
