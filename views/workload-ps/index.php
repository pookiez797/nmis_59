<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadPsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workload Ps');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-ps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Workload Ps'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'an',
            'ps_grade',
            'ps_size',
            'position',
            // 'ward',
            // 'reporter',
            // 'period',
            // 'start_date',
            // 'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
