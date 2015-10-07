<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NurseStaff */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nurse Staff',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nurse Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->staff_ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nurse-staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
