<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadOpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workload Ops');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-op-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Workload Op'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'an',
            'operate',
            'op_type:ntext',
            'op_date',
            // 'wound_type',
            // 'ward',
            // 'period',
            // 'prepare_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
