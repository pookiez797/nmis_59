<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NurseEvent;
//use kartik\date\DatePicker;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NurseEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'รายการกิจกรรม');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'เพิ่มรายการกิจกรรม'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function ($model) {
                            if ($model->patient_flag == 1) {
                                return ['class' => 'info'];
                            } else {
                                return [];
                            }
                         },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'date',
            [
                'attribute' => 'date',
                'value' => 'date',
                'options' => ['class' => 'col-md-3'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date',
                    'language' => 'th',
                    'options' => ['placeholder' => 'เลือกวันที่'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose' => true
                    ]
                ]),
                'format' => 'html',
            ],
//            'period',
            [ // แสดงข้อมูล string
                'attribute' => 'period',
                'filter' => NurseEvent::itemAlias('shift'),
                'value' => function($model) {
                    return $model->shiftName;
                }
            ],
            [

                'value' => function ($model) {
                    return Html::a('เพิ่มข้อมูลผู้ป่วย', ['nurse-patient/create', 'event_ref' => $model->ref], ['class' => 'btn btn-default btn-block']);
                },
                        'format' => 'html'
             ],
            [

                'value' => function ($model) {
                            return Html::a('เพิ่มข้อมูล Staff Mix', ['nurse-staffevent/create', 'event_ref' => $model->ref], ['class' => 'btn btn-default btn-block']);
                 },
                         'format' => 'html'
             ],
              [

                'value' => function ($model) {
                            return Html::a('พิมพ์ใบมอบหมายงาน', ['nurse-patient/assign-report', 'event_ref' => $model->ref], ['class' => 'btn btn-primary btn-block','target'=>'_blank']);
                 },
                         'format' => 'html'
             ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

</div>
