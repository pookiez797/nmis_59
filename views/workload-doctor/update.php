<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadDoctor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Workload Doctor',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workload Doctors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workload-doctor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
