<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NurseStaffeventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nurse Staffevents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-staffevent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Nurse Staffevent'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'staffevent_ref',
            'event_ref',
            'staff_ref',
            'wardclerk',
            'aid',
            // 'worker',
            // 'teamlead',
            // 'incharge',
            // 'team',
            // 'inp_id',
            // 'lastupdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
