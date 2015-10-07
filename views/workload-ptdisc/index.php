<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\LibDisc;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadPtdiscSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'รายการผู้ป่วยจำหน่าย');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workload-ptdisc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //  Html::a(Yii::t('app', 'Create Workload Ptdisc'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'ref',
            'hn',
            'an',
            'title',
            'name',
            'surname',
//            'ward',
            'discName:text:จำหน่าย',
//            [
//                'label' => 'จำหน่าย',
//                'options' => ['class' => 'col-md-3'],
//                'attribute' => 'discName',
////                'filter' => ArrayHelper::map(LibDisc::find()->all(),'code','name'),
//                'value' => function($model) {
//            return $model->discName;
//        }
//            ],
//            'lastupdate',
            [
                'class' => 'yii\grid\ActionColumn',
//                'options' => ['class' => 'col-md-1'],
                'header' => 'ยกเลิก',
                'template' => '{delete}'
            ]
        ],
    ]);
    ?>

</div>
