<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NursePatient */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nurse Patient',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->pt_ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nurse-patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
