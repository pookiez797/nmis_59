<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\LibPosition;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NurseStaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'รายชื่อเจ้าหน้าที่');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'เพิ่มเจ้าหน้าที่'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no',
            'title',
            'name',
             'surname',
            // 'ward',
//             'position',
            [
              'label'=>'ตำแหน่ง',
              'options' => ['class'=> 'col-md-3'],
              'attribute'=>'positionName',
              'filter'=> ArrayHelper::map(LibPosition::find()->all(), 'ref', 'position'),
              'value'=>function($model){
                return $model->positionName;
              }
            ],
             'priority',
            // 'lastupdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
