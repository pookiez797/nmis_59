<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkloadTeam */

$this->title = 'Update Workload Team: ' . ' ' . $model->ref;
$this->params['breadcrumbs'][] = ['label' => 'Workload Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ref, 'url' => ['view', 'id' => $model->ref]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workload-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
