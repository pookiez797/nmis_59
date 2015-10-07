<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NursePatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nurse Patients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Nurse Patient'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pt_ref',
            'event_ref',
            'hn',
            'an',
            'title',
            // 'name',
            // 'surname',
            // 'bed_type',
            // 'bed_no',
            // 'pt_type',
            // 'dx1',
            // 'admit_type',
            // 'disc_type',
            // 'disability',
            // 'operate',
            // 'prepare',
            // 'cpr',
            // 'uti',
            // 'vap',
            // 'phleb',
            // 'cutdown',
            // 'docter',
            // 'inp_id',
            // 'lastupdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
