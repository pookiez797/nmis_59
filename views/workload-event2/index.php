<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadEvent2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workload Event2s');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-event2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Workload Event2'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'event_date',
            'event_period',
            'hn',
            'an',
            // 'ward',
            // 'bed_type',
            // 'bed_no',
            // 'pt_type',
            // 'admit_type',
            // 'disc_type',
            // 'disability',
            // 'operate',
            // 'prepare',
            // 'cpr',
            // 'uti',
            // 'vap',
            // 'phleb',
            // 'user',
            // 'cutdown',
            // 'doctor_ref',
            // 'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
