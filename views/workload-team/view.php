<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadTeam */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => 'Workload Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ref',
            'ward',
            'team_name',
            'team_desc',
            'count_bed',
        ],
    ]) ?>

</div>
