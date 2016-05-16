<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadAsiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workload Asias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-asia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Workload Asia'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'an',
            'hn',
            'c5_r',
            'c5_l',
            // 'c6_r',
            // 'c6_l',
            // 'c7_r',
            // 'c7_l',
            // 'c8_r',
            // 'c8_l',
            // 't1_r',
            // 't1_l',
            // 'upper_total_r',
            // 'upper_total_l',
            // 'upper_total',
            // 'l2_r',
            // 'l2_l',
            // 'l3_r',
            // 'l3_l',
            // 'l4_r',
            // 'l4_l',
            // 'l5_r',
            // 'l5_l',
            // 's1_r',
            // 's1_l',
            // 'lower_total_r',
            // 'lower_total_l',
            // 'lower_total',
            // 'date',
            // 'ward',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
