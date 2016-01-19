<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadGcsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Workload Gcs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-gcs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Workload Gcs'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ref',
            'an',
            'hn',
            'gcs_type',
            'e_type',
            // 'v_type',
            // 'm_type',
            // 'score',
            // 'date',
            // 'ward',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
