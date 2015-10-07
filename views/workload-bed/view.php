<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadBed */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Beds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-bed-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ref], [
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
            'ref',
            'team_ref',
            'bed_type',
            'bed_no',
        ],
    ]) ?>

</div>
