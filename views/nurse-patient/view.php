<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NursePatient */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pt_ref], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pt_ref], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pt_ref',
            'event_ref',
            'hn',
            'an',
            'title',
            'name',
            'surname',
            'bed_type',
            'bed_no',
            'pt_type',
            'dx1',
            'admit_type',
            'disc_type',
            'disability',
            'operate',
            'prepare',
            'cpr',
            'uti',
            'vap',
            'phleb',
            'cutdown',
            'docter',
            'inp_id',
            'lastupdate',
        ],
    ]) ?>

</div>
