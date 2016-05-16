<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkloadTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทีมพยาบาล';

?>

<div class="workload-team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มทีมพยาบาล', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'team_name',
            'team_desc',
            [

                'value' => function ($model) {
                            return Html::a('เพิ่มเตียง', ['workload-bed/create','team_ref' => $model->ref ,'team_name'=>$model->team_name], ['class' => 'btn btn-default btn-block','target' => '_blank', 'onclick' => 'window.open("'.Url::toRoute(['workload-bed/create', 'team_ref' => $model->ref,'team_name'=>$model->team_name ]).'", "_blank", "scrollbars=yes, resizable=yes, top=50, left=500, width=400, height=600")']);
                 },
                         'format' => 'raw'
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
