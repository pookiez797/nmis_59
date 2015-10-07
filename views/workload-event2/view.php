<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadEvent2 */

$this->title = $model->ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Event2s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-event2-view">

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
            'event_date',
            'event_period',
            'hn',
            'an',
            'ward',
            'bed_type',
            'bed_no',
            'pt_type',
            'admit_type',
            'disc_type',
            'disability',
            'operate',
            'prepare',
            'cpr',
            'uti',
            'vap',
            'phleb',
            'user',
            'cutdown',
            'doctor_ref',
            'last_update',
        ],
    ]) ?>

</div>
