<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadAsia */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Asias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-asia-view">

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
            'an',
            'hn',
            'c5_r',
            'c5_l',
            'c6_r',
            'c6_l',
            'c7_r',
            'c7_l',
            'c8_r',
            'c8_l',
            't1_r',
            't1_l',
            'upper_total_r',
            'upper_total_l',
            'upper_total',
            'l2_r',
            'l2_l',
            'l3_r',
            'l3_l',
            'l4_r',
            'l4_l',
            'l5_r',
            'l5_l',
            's1_r',
            's1_l',
            'lower_total_r',
            'lower_total_l',
            'lower_total',
            'date',
            'ward',
        ],
    ]) ?>

</div>
